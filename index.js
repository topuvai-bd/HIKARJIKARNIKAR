const wakeOnLan = require('wakeonlan');
const net = require('net');
const http = require('http');

// Configuration
const macAddress = '00:e0:4c:3b:35:7f'; // Target MAC address
const publicIP = '103.174.188.143'; // Public IP or DDNS hostname
const broadcastIP = '103.174.188.255'; // Broadcast address for the subnet
const port = 9; // WOL UDP port
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

// Function to send WOL packet
function sendWOLPacket() {
    wakeOnLan(macAddress, { address: broadcastIP, port }, (error) => {
        if (error) {
            console.log("Error sending WOL packet:", error);
        } else {
            console.log(`Wake-on-LAN packet sent to ${macAddress} at ${broadcastIP}:${port}`);
        }
    });
}

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
                sendWOLPacket();
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
