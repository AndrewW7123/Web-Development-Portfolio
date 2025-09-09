<!DOCTYPE html>
<!-- Slots machine simulation using a PHP script -->
<html>

<head>
    <title>Slots</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/slots.css"> 
</head>

<body>
    <div id="container">
        <?php
        $a = rand(1, 3);
        $b = rand(1, 3);
        $c = rand(1, 3);

        if ($a == 1) {
            echo "<img src='Images/apple.png'>";
        }
        else if ($a == 2) {
            echo "<img src='Images/grapes.png'>";
        }
        else {
            echo "<img src='Images/watermelon.png'>";
        }

        if ($b == 1) {
            echo "<img src='Images/apple.png'>";
        }
        else if ($b == 2) {
            echo "<img src='Images/grapes.png'>";
        }
        else {
            echo "<img src='Images/watermelon.png'>";
        }

        if ($c == 1) {
            echo "<img src='Images/apple.png'>";
        }
        else if ($c == 2) {
            echo "<img src='Images/grapes.png'>";
        }
        else {
            echo "<img src='Images/watermelon.png'>";
        }
        ?>
        <div>
            <a href="index.php" id="roll">Roll</a>
            <?php
            if ($a == $b and $a == $c and $b == $c) {
                echo "<h1>You won 1000 dollars!</h1>";
            }
            else if ($a == $b or $a == $c or $b == $c) {
                echo "<h1>You won 50 dollars!</h1>";
            }
            else {
                echo "<h1>Try again!</h1>";
            }
            ?>
        </div>
    </div>
</body>

</html>