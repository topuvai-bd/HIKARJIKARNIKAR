const net = require('net');
const http = require('http');

// Configuration
const publicIP = '103.174.188.143'; // Public IP or DDNS hostname
const broadcastIP = '103.174.188.255'; // Broadcast address for the subnet

const checkInterval = 2 * 60 * 1000; // 2 minutes in milliseconds
const wolInterval = 5 * 60 * 1000; // 5 minutes in milliseconds
const serverPort = 3000; // Port to listen for HTTP requests

// Function to check server status
function checkServerStatus() {
    return new Promise((resolve, reject) => {
        const socket = new net.Socket();

        socket.setTimeout(5000); // 5-second timeout

        socket.connect(80, publicIP, () => {
            socket.destroy(); // Close the socket
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

const dgram = require('dgram');

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
function sendWOLPacket(macAddress, ipAddress, port = 9) {
    const magicPacket = createMagicPacket(macAddress);
    const client = dgram.createSocket('udp4');

    client.send(magicPacket, port, ipAddress, (err) => {
        if (err) {
            console.error('Error sending WOL packet:', err);
        } else {
            console.log(`Magic packet sent to MAC: ${macAddress}, IP: ${ipAddress}, Port: ${port}`);
        }
        client.close();
    });
}

// Configuration
const macAddress = '00:e0:4c:3b:35:7f'; // Your target MAC address
const ipAddress = '103.174.188.143'; // Your public IP or DDNS hostname
const port = 9; // UDP port for WOL


// Main loop
(async function monitorServer() {
    let isServerDown = false;

    while (true) {
        const isRunning = await checkServerStatus();

        if (isRunning) {
            console.log("Server is running.");
            isServerDown = false;
            await new Promise(resolve => setTimeout(resolve, checkInterval));
        } else {
            console.log("Server is not reachable.");

            if (!isServerDown) {
                console.log("Attempting to wake the server...");
                // Send the magic packet
                sendWOLPacket(macAddress, ipAddress, port);
                isServerDown = true;
            }

            await new Promise(resolve => setTimeout(resolve, wolInterval));
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
