<!DOCTYPE html>
<!--
Andrew Whitehead 400581822
Save page taking form parameters from result.php and updating the database
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
</head>

<body>
    <div id="container">
        <?php
        $name = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "useremail", FILTER_VALIDATE_EMAIL);
        $won = filter_input(INPUT_POST, "won", FILTER_VALIDATE_INT);
        $playdate = date("F j, Y");
        $wins = 0;
        $losses = 0;

        if ($name !== null and $email !== null and $email !== false and $won !== null) {
            $command = "SELECT wins, losses FROM players WHERE email=? LIMIT 1";
            $stmt = $dbh->prepare($command);
            $params = [$email];
            $success = $stmt->execute($params);

            if ($success) {
                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch();
                    $wins = $row["wins"];
                    $losses = $row["losses"];

                    if ($won == 1) {
                        $wins = $wins + 1;
                    }
                    else {
                        $losses = $losses + 1;
                    }

                    $command = "UPDATE players SET username=?, wins=?, losses=?, playdate=? WHERE email=?";
                    $stmt = $dbh->prepare($command);
                    $args = [$name, $wins, $losses, $playdate, $email];
                    $success = $stmt->execute($args);

                    if ($success) {
                        echo "<h1>Successfully updated player information!</h1>";
                    }
                    else {
                        echo "<h1>Could not update player information</h1>";
                    }
                }
                else {
                    $command = "INSERT into players (email, username, wins, losses, playdate) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $dbh->prepare($command);

                    if ($won == 1) {
                        $wins = 1;
                    }
                    else {
                        $losses = 1;
                    }

                    $args = [$email, $name, $wins, $losses, $playdate];
                    $success = $stmt->execute($args);

                    if ($success) {
                        echo "<h1>Successfully inserted player information!</h1>";
                    }
                    else {
                        echo "<h1>Could not insert player information</h1>";
                    }
                }
            }
            else {
                echo "<h1>Could not select player information</h1>";
            }
            echo "<h3>Your wins: $wins</h3>";
            echo "<h3>Your losses: $losses</h3>";
        }
        else {
            echo "<h1>Problem with the POST parameters</h1>";
        }

        $command = "SELECT username, wins, losses, playdate FROM players ORDER BY wins DESC LIMIT 10";
        $stmt = $dbh->prepare($command);
        $success = $stmt->execute();
        
        if ($success) {
            echo "<h1 style='background-color: beige; border-radius: 10%; color: black;'>Leaderboard</h1>";
            echo "<div style='background-color: bisque; border-radius: 10%;'>";
            while ($row = $stmt->fetch()) {           
                echo "<h4 style='color: black;'>$row[username]: $row[wins] wins, $row[losses] losses</h4>";
                echo "<h6 style='color: black;'>Last played: $row[playdate]</h6>";
            }
            echo "</div>";
        }
        else {
            echo "<h3>Couldn't load leaderboard</h3>";
        }
        echo "<a href='index.php'>Play Again</a>";
        ?>
    </div>
</body>

</html>