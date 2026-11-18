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

function allProjects(int $user_id, string $role)
{
    global $conn;

    $sql = "
    SELECT DISTINCT
        p.id AS projectId,
        p.*

    FROM task_assignees AS ass

    INNER JOIN projects as p
    ON p.id = ass.project_id

    WHERE ass.employee_id = $user_id
    ";


    if ($role == "manager") {
        $sql = "
    SELECT DISTINCT
        p.id AS projectId,
        p.*

    FROM task_assignees AS ass

    INNER JOIN projects as p
    ON p.id = ass.project_id

    WHERE ass.assigned_by = $user_id
    ";
    }
    $projects = $conn->query($sql);
    $projects = $projects->fetchAll();

    return $projects;
}

function allTasks(int $user_id)
{
    global $conn;

    $sql = "
    SELECT
    t.status AS task_status,
    t.description AS task_description,
    u.*,
    t.*,
    p.*
    FROM task_assignees AS ass

    INNER JOIN users AS u
    ON u.id = ass.employee_id
    
    INNER JOIN tasks AS t
    ON t.id=ass.task_id

    INNER JOIN projects AS p
    ON p.id = ass.project_id
    
    WHERE ass.employee_id = $user_id OR ass.assigned_by=$user_id";
    $tasks = $conn->query($sql);
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tasks as $task) {
        setcookie("manager_id", $task["created_by"], time() + 84600, "/");
        break;
    }
    return $tasks;
}

echo json_encode([
    "users" => allUsers(),
    "tasks" => allTasks($_POST["user_id"]),
    "projects" => allProjects($_POST["user_id"], $_POST["role"])
]);
