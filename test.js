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

// Send the magic packet
sendWOLPacket(macAddress, ipAddress, port);
