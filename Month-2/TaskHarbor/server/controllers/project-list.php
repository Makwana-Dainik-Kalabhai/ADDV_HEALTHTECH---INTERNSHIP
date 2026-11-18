<?php
include("../config.php");


$sql = "
SELECT DISTINCT
    p.id AS projectId,
    p.*
    
FROM task_assignees AS ass

INNER JOIN projects as p
ON p.id = ass.project_id

INNER JOIN users as u
ON u.id = ass.employee_id

WHERE ass.employee_id = " . $_POST["user_id"] .  " OR ass.assigned_by = " . $_POST["user_id"];


if ($_POST["role"] == "manager") {
    $sql = "SELECT p.id AS projectId, p.* FROM projects AS p WHERE manager_id=" . $_POST["user_id"];
}
$record = $conn->query($sql);
$record = $record->fetchAll();

echo json_encode($record);
