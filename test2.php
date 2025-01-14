<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Loop</title>
</head>
<body>
    <h1>Audio Loop Example</h1>
    <audio id="audioPlayer" src="audio/sound.mp3" preload="auto"></audio>

    <button onclick="toggleAudio()">Toggle Audio</button>

    <script>
        let AudioSwitch = false; // Initially off

        // Get the audio element
        const audio = document.getElementById('audioPlayer');

        // Play the sound
        function playSound() {
            audio.play();
        }

        // Pause the sound
        function pauseSound() {
            audio.pause();
        }

        // Function to toggle AudioSwitch
        function toggleAudio() {
            AudioSwitch = !AudioSwitch;
            console.log("AudioSwitch set to:", AudioSwitch);
        }

        // LoopAudio function
        function LoopAudio() {
            console.log("LoopAudio called. AudioSwitch:", AudioSwitch, "Audio paused:", audio.paused);

            // If AudioSwitch is true and audio is paused, play the audio
            // if (AudioSwitch && audio.paused) {
            //     playSound();
            // }

            // // If AudioSwitch is false, pause the audio
            // if (!AudioSwitch) {
            //     pauseSound();
            // }
        }

        // Call LoopAudio every 400 milliseconds
        setInterval(LoopAudio, 400);
    </script>
</body>
</html>
