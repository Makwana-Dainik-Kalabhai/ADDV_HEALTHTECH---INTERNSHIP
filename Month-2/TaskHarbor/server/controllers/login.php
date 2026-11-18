<?php
include("../config.php");
header("Content-Type: application/json");

class Login
{
    public $dbconn;
    public $email;
    public $password;

    function __construct($conn)
    {
        $this->dbconn = $conn;
    }

    function setValues($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function loginNow()
    {
        $sql = "SELECT * FROM `users` WHERE email='" . $this->email . "'";

        $find = $this->dbconn->query($sql);
        $find = $find->fetchAll();

        if (sizeof($find) > 0) {
            foreach ($find as $f) {
                if ($f["email"] == $this->email && $f["password"] == $this->password) {
                    echo json_encode([
                        "status" => "success",
                        "message" => "Login Successfully",
                        "role" => $f["role"]
                    ]);

                    $userCookie = [
                        "user_id" => $f["id"],
                        "name" => $f["name"],
                        "email" => $f["email"],
                        "role" => $f["role"],
                        "status" => $f["status"],
                        "emp_code" => $f["emp_code"],
                        "phone" => $f["phone"],
                        "designation" => $f["designation"],
                        "department" => $f["department"],
                        "joining_date" => $f["joining_date"]
                    ];
                    setcookie("user", json_encode($userCookie), time() + 86400, "/");
                    return;
                }
            }

            echo json_encode([
                "status" => "error",
                "message" => "Email or Password is invalid"
            ]);
            return;
        }
        //
        else {
            echo json_encode([
                "status" => "error",
                "message" => "Account does not exist"
            ]);
            return;
        }
    }
}

$login = new Login($conn);
$login->setValues($_POST["email"], $_POST["password"]);
$login->loginNow();
