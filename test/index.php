<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal with Close Button</title>

    <script>
        $('#dev-ad').load("ad.php");
// document.addEventListener('DOMContentLoaded', function () {

// const devad = document.getElementById('dev-ad');
// if (devad) {
//     fetch('http://localhost/clients/superludo/superludobd/test/ad.php')
//         .then(response => response.text())
//         .then(data => {
//             document.getElementById('dev-ad').innerHTML = data;
//         })
//         .catch(error => console.error('Error loading ad content:', error));
// }

// });
    </script>
    
</head>
<body>
    
    <div id="dev-ad">
        <?php
        // echo file_get_contents("http://localhost/clients/superludo/superludobd/test/ad.php");
         ?>
    </div>

    <div>

    
</div>
</body>
</html>
