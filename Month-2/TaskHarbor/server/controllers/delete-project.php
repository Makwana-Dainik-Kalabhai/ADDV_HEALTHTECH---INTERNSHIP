<?php
include("../config.php");

$sql = "DELETE FROM projects WHERE id=" . (int)$_POST["projectId"];

if ($conn->query($sql)) {
    echo json_encode([
        "status" => "success",
        "message" => "Task deleted successfully"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Something went wrong"
    ]);
}
