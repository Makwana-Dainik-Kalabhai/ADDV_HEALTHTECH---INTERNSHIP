<?php
include("../config.php");

$sql = "UPDATE tasks SET status='" . $_POST["taskStatus"] . "' WHERE id=" . $_POST["taskId"];

if ($_POST["taskStatus"] == "completed") $sql = "UPDATE tasks SET status='" . $_POST["taskStatus"] . "', completed_at=NOW() WHERE id=" . $_POST["taskId"];

$update = $conn->query($sql);

echo json_encode([
    "status" => "success",
    "message" => "Task status updated successfully"
]);
