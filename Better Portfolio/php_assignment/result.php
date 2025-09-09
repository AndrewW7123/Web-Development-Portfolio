<!DOCTYPE html>
<!--
Andrew Whitehead 400581822
Result page taking wumpus parameters from index.php and submits a form to save.php
March 29, 2025
-->
<?php
include "connect.php";
?>
<html>

<head>
    <title>Hunt the Wumpus</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wumpus.css">
    <script src="js/wumpus.js"></script> 
</head>

<body>
    <div id="container">
        <?php
        $row = filter_input(INPUT_GET, "row", FILTER_VALIDATE_INT);
        $column = filter_input(INPUT_GET, "column", FILTER_VALIDATE_INT);
        $won = 0;

        if ($row === null or $row === false or $column === null or $column === false) {
            echo "<h1>A problem occured, return to the previous page</h1>";
            echo "<a href='index.php'>Return</a>";
        }
        else {
            $command = "SELECT rw, col FROM wumpuses";
            $stmt = $dbh->prepare($command);
            $success = $stmt->execute();

            while ($db_row = $stmt->fetch()) {
                if ($db_row["rw"] == $row and $db_row["col"] == $column) {
                    $won = 1;
                }
            }

            if ($won == 1) {
                echo "<h1>You found a wumpus! You win!</h1>";
                echo "<img src='images/wumpus.png' style='width: 25%;'>";
            }
            else {
                echo "<h1>You did not find a wumpus! You lost!</h1>";
                echo "<img src='images/wumpus.png' style='width: 25%;'>";
            }
        }
        ?>
        <form action="save.php" method="post" id="form">
            <h2>Enter your name and email to save your progress!</h2>
            <input name="username" type="text" placeholder="Name" maxlength="50" required>
            <input id="email" name="useremail" type="email" placeholder="Email" maxlength="50" required>
            <input name="won" type="number" value="<?=$won?>" hidden><br>
            <input type="submit">
            <p id="error"></p>
        </form>
    </div>
</body>

</html>