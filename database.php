<?php

$server = "localhost";
$database = "munka";
$username = "robi";
$password = "I61zegOb3_pVyYdr";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    die($e->getMessage());
}

$selectUsers = $conn->prepare("SELECT username FROM adatok;");
$selectPassword = $conn->prepare("SELECT passw FROM adatok WHERE username = ?;");
$selectDay = $conn->prepare("SELECT favouriteDay FROM adatok WHERE username = ?;");

?>