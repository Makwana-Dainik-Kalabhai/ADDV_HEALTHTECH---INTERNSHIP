<?php
include("../../links.php");
if (!defined("USER")) {
    header("Location: ".getenv("URL")."/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp Profile - TaskHarbor</title>
</head>

<body>
    <div class="row m-0">

        <div class="col-0 md:col-4 xl:col-3">
            <?php include(BASE_PATH . "/components/sidebar.php"); ?>
        </div>

        <div class="col-12 md:col-8 xl:col-9">
            <?php
            include(BASE_PATH . "/components/header.php");
            include(BASE_PATH . "/pages/profile/main-content.php");
            ?>
        </div>
    </div>
</body>

<style>
    .sidebar a.profile {
        color: white;
        background-color: #dc3545;
    }

    .sidebar a:not(.profile):hover {
        background-color: #f2f2f2;
    }
</style>

</html>