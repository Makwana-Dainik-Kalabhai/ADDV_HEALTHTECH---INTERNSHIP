<?php
include("../config.php");

function addProject(int $manager_id, string $project_name, string $project_code, string $description, string $start_date, string $deadline, string $status)
{
    global $conn;
    $sql = "INSERT INTO projects (manager_id, project_name, project_code, description, start_date, deadline, status)
        VALUES ($manager_id, '$project_name', '$project_code', '$description', '$start_date', '$deadline', '$status')";

    if ($conn->query($sql)) {
        echo json_encode([
            "status" => "success",
            "message" => "Task added successfully"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Something went wrong"
        ]);
    }
}

addProject($_POST["manager_id"], $_POST["project_name"], $_POST["project_code"], $_POST["description"], $_POST["start_date"], $_POST["deadline"], $_POST["status"]);