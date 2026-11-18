<?php
include("../config.php");

header("Content-Type: application/json");

class Signup
{
    public Object $dbconn;

    public string $name;
    public string $email;
    public string $password;
    public string $role;

    function __construct(Object $conn)
    {
        $this->dbconn = $conn;
    }

    function setValues(string $name, string $email, string $password, string $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    function signUpNow()
    {
        $sql = "SELECT * FROM `users` WHERE email='" . $this->email . "'";

        $find = $this->dbconn->query($sql);
        $find = $find->fetchAll();

        if (sizeof($find) > 0) {
            echo json_encode([
                "status" => "error",
                "message" => "Account already exist"
            ]);
        }
        //
        else {
            $sql = "INSERT INTO users (name, email, password, role)
                    VALUES ('$this->name', '$this->email', '$this->password', '$this->role')";
            $this->dbconn->query($sql);

            $user_id = "SELECT LAST_INSERT_ID()";
            $user_id = $this->dbconn->query($user_id);
            $user_id = ($user_id->fetchAll())[0];

            echo json_encode([
                "status" => "success",
                "message" => "Register successfully"
            ]);
            setcookie("user", json_encode(["user_id" => $user_id[0], "name" => $this->name, "email" => $this->email, "role" => $this->role]), time() + 86400, "/");
        }
    }
}

$signup = new Signup($conn);
$signup->setValues($_POST["name"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["role"]);
$signup->signUpNow();
