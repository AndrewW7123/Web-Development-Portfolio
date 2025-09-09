<?php
session_start();
?>
<!DOCTYPE html>
<!--
Andrew Whitehead
Guessing game using session management
-->
<?php
if (!isset($_SESSION["min"]) and !isset($_SESSION["max"])) {
    $min = filter_input(INPUT_GET, "min", FILTER_VALIDATE_INT);
    $max = filter_input(INPUT_GET, "max", FILTER_VALIDATE_INT);

    if ($min !== null and $min !== false and $max !== null and $max !== false) {
        $random = rand($min, $max);
        $_SESSION["min"] = $min;
        $_SESSION["max"] = $max;
        $_SESSION["answer"] = $random;
    }
    else {
        echo "<h1>Issue with the parameters</h1>";
    }
}
?>
<html>

<head>
    <title>Guessing Game</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <form style="text-align: center; font-size: 25px;" action="result.php">
            <h1>Enter a guess digit lying in the range you provided</h1>
            <input style="font-size: 25px; width: 300px;" type="number" name="guess" placeholder="Guess digit" min="0" required>
            <input style="font-size: 25px;" type="submit">
        </form>
    </div>
</body>

</html>