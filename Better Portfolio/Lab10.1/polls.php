<!DOCTYPE html>
<!--
Andrew Whitehead
Simple Voting App
-->
<?php
include "connect.php";

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$option = filter_input(INPUT_POST, "option", FILTER_VALIDATE_INT);
$command = "";

if ($id !== null and $id !== false and $option !== null and $option !== false) {

    $command = "SELECT option1, option2, option3, option4 FROM poll WHERE ID=?";
    $stmt = $dbh->prepare($command);
    $params = [$id];
    $success = $stmt->execute($params);

    if ($success) {
        $row = $stmt->fetch();
        if ($option == 1) {
            if ($row["option1"] != null) {
                $command = "UPDATE poll SET vote1=vote1 + ? WHERE ID=?";
            }
            else {
                echo "Invalid option, please choose another";
            }
        }
        else if ($option == 2) {
            if ($row["option2"] != null) {
                $command = "UPDATE poll SET vote2=vote2 + ? WHERE ID=?";
            }
            else {
                echo "Invalid option, please choose another";
            }
        }
        else if ($option == 3) {
            if ($row["option3"] != null) {
                $command = "UPDATE poll SET vote3=vote3 + ? WHERE ID=?";
            }
            else {
                echo "Invalid option, please choose another";
            }
        }
        else {
            if ($row["option4"] != null) {
                $command = "UPDATE poll SET vote4=vote4 + ? WHERE ID=?";
            }
            else {
                echo "Invalid option, please choose another";
            }
        }
        $stmt = $dbh->prepare($command);
        $args = [1, $id];
        $success = $stmt->execute($args);
    }

    
}
else {
    echo "<h1 style='text-align: center;'>Invalid poll ID or option, try again</h1>";
}
?>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width">
    <title>Voting App</title>
</head>

<body>
    <div style="text-align: center; font-size: 25px;">
        <?php 
        if ($success) {
            echo"<h1>Recorded!</h1>";
        }

        ?>
    </div>
</body>

</html>