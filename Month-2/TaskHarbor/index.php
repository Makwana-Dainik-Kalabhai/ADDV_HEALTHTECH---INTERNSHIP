<?php include("./client/links.php");

if (defined("USER")) {
    header("Location: ".getenv("URL")."/client/pages/dashboard/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskHarbor - Login Now</title>
</head>

<body class="bg-secondary">
    <?php include(BASE_PATH . "/toaster.php"); ?>

    <?php include(BASE_PATH . "/pages/signup.php"); ?>
</body>

</html>