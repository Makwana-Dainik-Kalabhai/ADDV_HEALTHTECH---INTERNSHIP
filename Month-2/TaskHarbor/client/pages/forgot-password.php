<?php
session_start();
include("../links.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .forgot-password-form {
        max-width: 400px;
    }
</style>

<body>
    <div class="forgot-password-form position-absolute top-50 start-50 translate-middle shadow-lg p-10 rounded-5">
        <div class="row">
            <h4 class="fg-danger text-center mb-5 pb-5 border-bottom">Forgot Password</h4>

            <?php if (!isset($_SESSION["otp"]) && !isset($_SESSION["change-password"])) { ?>
                <form action="../../server/controllers/forgot-password.php" method="post" class="send-otp-form">
                    <label for="email" class="form-label mb-2">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">

                    <button class="btn-solid theme-danger mt-5">Send OTP</button>
                </form>
            <?php } ?>

            <?php if (isset($_SESSION["otp"])) { ?>
                <form action="../../server/controllers/forgot-password.php" method="post" class="submit-otp-form">
                    <label for="otp" class="form-label mb-2">Enter OTP</label>

                    <div class="row">
                        <div class="col-2 p-1"><input type="text" name="otp[]" class="otp-input form-control text-center fs-lg" maxlength="1" style="aspect-ratio: 1/1;" /></div>
                        <div class="col-2 p-1"><input type="text" name="otp[]" class="otp-input form-control text-center fs-lg" maxlength="1" style="aspect-ratio: 1/1;" /></div>
                        <div class="col-2 p-1"><input type="text" name="otp[]" class="otp-input form-control text-center fs-lg" maxlength="1" style="aspect-ratio: 1/1;" /></div>
                        <div class="col-2 p-1"><input type="text" name="otp[]" class="otp-input form-control text-center fs-lg" maxlength="1" style="aspect-ratio: 1/1;" /></div>
                        <div class="col-2 p-1"><input type="text" name="otp[]" class="otp-input form-control text-center fs-lg" maxlength="1" style="aspect-ratio: 1/1;" /></div>
                        <div class="col-2 p-1"><input type="text" name="otp[]" class="otp-input form-control text-center fs-lg" maxlength="1" style="aspect-ratio: 1/1;" /></div>
                    </div>
                    <button class="bg-transparent border-0 fg-primary" name="resend-otp">Resend OTP</button>
                    <br />
                    <button class="btn-solid theme-danger mt-5" name="submit-otp">Submit OTP</button>
                </form>
            <?php } ?>


            <?php if(isset($_SESSION["change-password"])) { ?>
                <form action="../../server/controllers/forgot-password.php" method="post" class="change-password-form">
                    <label for="new-password" class="form-label mb-2">New Password</label>
                    <input type="text" name="new-password" class="form-control" id="new-password">

                    <label for="confirm-password" class="form-label mt-4 mb-2">Confirm Password</label>
                    <input type="text" name="confirm-password" class="form-control" id="confirm-password">
                    <p class="fs-sm fg-danger password-error"></p>

                    <button class="btn-solid theme-danger mt-5 change-password" name="update-password">Change Password</button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php include(BASE_PATH . "/toaster.php"); ?>
<script>
    $(document).ready(function() {
        $(".submit-otp-form input").keyup(function() {
            $(this).parent().next().children().focus();
        });

        $("input[name='confirm-password']").keyup(function() {
            let newPassword = $("input[name='new-password']").val();
            let confirmPassword = $(this).val();

            if (newPassword != confirmPassword) $(".password-error").text("Password and Confirm must be matched");
            else $(".password-error").text("");
        });
    });
</script>