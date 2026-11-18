<?php
include("../config.php");

function addTask(int $employeeId, int $managerId, int $projectId, string $title, string $description, string $priority, string $status, int $created_by, string $start_date, string $due_date)
{
    global $conn, $taskId;

    $conn->beginTransaction();

    $sql = "INSERT INTO tasks (project_id, title, description, priority, status, created_by, start_date, due_date)
        VALUES($projectId, '$title', '$description', '$priority', '$status', $created_by, '$start_date', '$due_date')";

    if ($conn->query($sql)) {
        $taskId = $conn->lastInsertId();

        $sql = "INSERT INTO task_assignees (task_id, employee_id, assigned_by, project_id)
                VALUES ($taskId, $employeeId, $managerId, $projectId)";

        if ($conn->query($sql)) {
            $conn->commit();

            return true;
        }
    }
}


if (addTask($_POST["employeeId"], $_POST["managerId"], $_POST["projectId"], $_POST["title"], $_POST["description"], $_POST["priority"], $_POST["status"], $_POST["managerId"], $_POST["start_date"], $_POST["due_date"])) {
    echo json_encode([
        "status" => "success",
        "message" => "Task added successfully"
    ]);
}
