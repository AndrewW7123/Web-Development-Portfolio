<?php
try {
    $dbh = new PDO("mysql:host=localhost;dbname=whitea69_db",
    "whitea69_local",
    "a2qyxDDQ");

} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>