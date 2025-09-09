<?php
$password = filter_input(INPUT_GET, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$count = strlen($password);
$upper = preg_match('/[A-Z]/', $password);
$lower = preg_match('/[a-z]/', $password);
$symbol = preg_match('/[\W_]/', $password);
$digit = preg_match('/[0-9]/', $password);

if ($count >= 6 and $upper and $lower and $symbol and $digit) {
    echo "<h3>Password is good!</h3>";
}
else {
    echo "<h3>Password is not the right format!</h3>";
}
?>