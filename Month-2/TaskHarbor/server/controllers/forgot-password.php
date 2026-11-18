<?php
include("../config.php");

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["email"]) || isset($_POST["resend-otp"])) {
    $_SESSION["email"] = $_POST["email"];

    $mail = new PHPMailer(true);

    $email = $_SESSION["email"];
    $emailExist = false;
    $otp = random_int(100000, 999999);

    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $find = $conn->query($sql);
    $find = $find->fetchAll();

    if (sizeof($find) > 0) {
        foreach ($find as $f) {
            if ($f["email"] == $email) {
                $emailExist = true;
                break;
            }
        }
    }
    if ($emailExist) {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dainik.m@applocum.org';
        $mail->Password   = 'klet btyb glcl viws';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('dainik.m@applocum.org', 'TaskHarbor');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Verification OTP';

        $mail->Body = "
        <h2>Email Verification</h2>
        <p>Your OTP is:</p>
        <h1>$otp</h1>
        <p>This OTP expires in 5 minutes.</p>
    ";

        $mail->send();

        $_SESSION["success"] = "OTP sent successfully";
        $_SESSION["otp"] = [
            "OTP" => $otp,
            "expiry" => time() + 300
        ];
    } else {
        $_SESSION["error"] = "Email does not exist";
    }
    header("Location: ".getenv("URL")."/client/pages/forgot-password.php");
    return;
}



if (isset($_POST["submit-otp"])) {


    $otp = $_POST["otp"][0] . $_POST["otp"][1] . $_POST["otp"][2] . $_POST["otp"][3] . $_POST["otp"][4] . $_POST["otp"][5];

    if (time() <= $_SESSION["otp"]["expiry"]) {
        if ($_SESSION["otp"]["OTP"] == $otp) {
            $_SESSION["change-password"] = true;

            unset($_SESSION["otp"]);
        }
    }
    //
    else {
        $_SESSION["error"] = "Your OTP is expired now";
    }
    header("Location: ".getenv("URL")."/client/pages/forgot-password.php");
    return;
}



if (isset($_POST["update-password"])) {
    $password = $_POST["new-password"];

    $sql = "UPDATE `users` SET `password`='$password' WHERE `email`='" . $_SESSION["email"] . "'";
    $update = $conn->prepare($sql);


    if ($update->execute()) {
        $_SESSION["success"] = "Password changed successfully";
        unset($_SESSION["change-password"]);
        
        header("Location: ".getenv("URL"));
        return;
    }
    //
    else {
        $_SESSION["error"] = "Something went wrong";
        unset($_SESSION["change-password"]);

        header("Location: ".getenv("URL")."/client/pages/forgot-password.php");
        return;
    }
}
// klet btyb glcl viws