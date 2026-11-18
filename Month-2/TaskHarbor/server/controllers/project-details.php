<?php
include("../config.php");

$projectId = json_decode($_POST["id"]);

$tasks = "
SELECT
    -- Project Manager
        manager.name AS manager_name,
        manager.email AS manager_email,
        manager.phone AS manager_phone,

    -- Project Members
        member.name AS member_name,
        member.email AS member_email,
        member.phone AS member_phone,
        member.department AS member_department,
        member.designation AS member_designation,
        member.joining_date AS member_joining_date,
        member.created_at AS member_created_at,

    -- Project Details
        p.project_name AS project_name,
        p.project_code AS project_code,
        p.description AS project_description,
        p.start_date AS project_start_date,
        p.deadline AS project_deadline,
        p.status AS project_status,
        p.created_at AS project_created_at,

    -- Task Details
        t.id AS task_id,
        t.title AS task_title,
        t.description AS task_description,
        t.priority AS task_priority,
        t.status AS task_status,
        t.start_date AS task_start_date,
        t.due_date AS task_due_date,
        t.completed_at AS task_completed_at,
        t.created_at AS task_created_at,
        t.updated_at AS task_updated_at

    FROM task_assignees AS ass

    INNER JOIN users AS manager
    ON manager.id = ass.assigned_by

    INNER JOIN users AS member
    ON member.id = ass.employee_id

    INNER JOIN projects AS p
    ON p.id=ass.project_id

    INNER JOIN tasks AS t
    ON t.id = ass.task_id

    WHERE ass.project_id = $projectId
";

$record = $conn->query($tasks);
$tasks = $record->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tasks);