<?php

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "TaskHarbor";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
