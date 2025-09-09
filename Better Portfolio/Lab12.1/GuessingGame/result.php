<?php
session_start();
?>
<!DOCTYPE html>
<!--
Andrew Whitehead
Guessing game using session management
-->
<?php
if (isset($_SESSION["answer"])) {
    $answer = $_SESSION["answer"];
    $guess = filter_input(INPUT_GET, "guess", FILTER_VALIDATE_INT);
}
else {
    echo "<h1>Error processing session data</h1>";
}
?>
<html>

<head>
    <title>Guessing Game</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div style="text-align: center;">
        <?php
        if ($answer == $guess) {
            echo "<h1>Congratulations! Your guess was correct</h1>";
            echo "<a style='font-size: 20px;' href='index.html'>New number?</a>";
            session_destroy();
        }
        else {
            echo "<h1>Your guess was incorrect</h1>";
            echo "<a style='font-size: 20px;' href='guess.php'>Guess again?</a>";
        }
        ?>
    </div>
</body>

</html>