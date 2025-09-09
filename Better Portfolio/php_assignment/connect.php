<?php
/*
Andrew Whitehead 400581822
March 29, 2025
Allows all included php files to connect to the database below
*/
try {
    $dbh = new PDO("mysql:host=localhost;dbname=whitea69_db", 
    "whitea69_local", 
    "a2qyxDDQ");

} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>