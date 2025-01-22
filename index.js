const wakeOnLan = require('wakeonlan');

// Target MAC address
const macAddress = '00:e0:4c:3b:35:7f';

// Public IP and port (UDP 9)
const publicIP = '103.174.188.143'; // Your public IP or DDNS hostname

// Send the magic packet
wakeOnLan(macAddress, { address: publicIP, port: 9 }, (error) => {
    if (error) {
        console.log("Error sending WOL packet:", error);
    } else {
        console.log(`Wake-on-LAN packet sent to ${macAddress} at ${publicIP}:9`);
    }
});
