const net = require('net');
const http = require('http');
const dgram = require('dgram');

// Configuration
const publicIP = '103.174.188.143'; // Public IP or DDNS hostname
const broadcastIP = '103.174.188.255'; // Broadcast address for the subnet
const macAddress = '00:e0:4c:3b:35:7f'; // Target MAC address
const wolPort = 9; // UDP port for WOL
const checkInterval = 10 * 60 * 1000; // 10 minutes in milliseconds
const wolRetryInterval = 5 * 60 * 1000; // Retry WOL every minute
const serverPort = 3000; // HTTP server port

// Function to check server status
function checkServerStatus() {
    return new Promise((resolve) => {
        const socket = new net.Socket();
        socket.setTimeout(5000); // 5-second timeout

        socket.connect(80, publicIP, () => {
            socket.destroy();
            resolve(true); // Server is reachable
        });

        socket.on('error', () => {
            socket.destroy();
            resolve(false); // Server is not reachable
        });

        socket.on('timeout', () => {
            socket.destroy();
            resolve(false); // Server timed out
        });
    });
}

// Function to create the magic packet
function createMagicPacket(macAddress) {
    const macBytes = macAddress.split(':').map(byte => parseInt(byte, 16));
    const magicPacket = Buffer.alloc(102);

    // Fill the magic packet
    for (let i = 0; i < 6; i++) {
        magicPacket[i] = 0xFF; // 6 bytes of FF
    }

    for (let i = 6; i < magicPacket.length; i += macBytes.length) {
        magicPacket.set(macBytes, i); // 16 repetitions of the MAC address
    }

    return magicPacket;
}

// Function to send the magic packet
function sendWOLPacket(macAddress, ipAddress, port = wolPort) {
    const magicPacket = createMagicPacket(macAddress);
    const client = dgram.createSocket('udp4');

    return new Promise((resolve, reject) => {
        client.send(magicPacket, port, ipAddress, (err) => {
            client.close();
            if (err) {
                console.error('Error sending WOL packet:', err);
                reject(err);
            } else {
                console.log(`Magic packet sent to MAC: ${macAddress}, IP: ${ipAddress}, Port: ${port}`);
                resolve();
            }
        });
    });
}

// Main loop
(async function monitorServer() {
    let isServerDown = false;

    while (true) {
        const isRunning = await checkServerStatus();

        if (isRunning) {
            console.log("Server is running.");
            isServerDown = false; // Reset the flag
            await new Promise(resolve => setTimeout(resolve, checkInterval));
        } else {
            console.log("Server is not reachable.");

            if (!isServerDown) {
                console.log("Attempting to wake the server...");

                while (!isRunning) {
                    try {
                        // Send the magic packet
                        await sendWOLPacket(macAddress, broadcastIP, wolPort);
                        console.log("Retrying to wake the server...");
                    } catch (error) {
                        console.error("Failed to send WOL packet:", error);
                    }

                    // Wait before retrying
                    await new Promise(resolve => setTimeout(resolve, wolRetryInterval));

                    // Recheck server status
                    if (await checkServerStatus()) {
                        console.log("Server is now running.");
                        break;
                    }
                }

                isServerDown = true;
            }
        }
    }
})();

// HTTP server to listen on a specific port
const server = http.createServer((req, res) => {
    res.writeHead(200, { 'Content-Type': 'text/plain' });
    res.end('Server monitor is running.');
});

server.listen(serverPort, () => {
    console.log(`HTTP server listening on port ${serverPort}`);
});
