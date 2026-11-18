<?php
include("../config.php");

function allUsers()
{
    global $conn;

    $sql = "SELECT * FROM `users`";
    $users = $conn->query($sql);
    $users = $users->fetchAll();

    return $users;
}

echo json_encode(allUsers());
