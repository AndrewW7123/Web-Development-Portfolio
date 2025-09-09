<?php
session_start();
?>
<!DOCTYPE html>
<!-- Slots machine simulation using a PHP script -->
<html>

<head>
    <title>Updated Slots</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/updatedslots.css">
    <script src="js/roll.js"></script>
</head>

<body>
    <div id="container">
        <div id="images">
            <img id="img0">
            <img id="img1">
            <img id="img2">
        </div>
        <div>
            <input type="button" id="roll" value="Roll">
            <h2 id="earnings">Current credits: 10</h2>
            <input style="font-size: 25px; width: 200px;" id="bet" type="number" placeholder="Place bet">
            <h2 id="limit"></h2>
            <a id="again" href="index.php" style="visibility: hidden; font-size: 25px; ">Play again</a>
        </div>
    </div>
</body>

</html>