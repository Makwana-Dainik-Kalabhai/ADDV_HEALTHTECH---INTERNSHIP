<?php
include("../config.php");

class Profile
{
    public Object $dbconn;
    public string $name;
    public string $email;
    public string $role;
    public string $emp_code;
    public float $phone;
    public string $designation;
    public string $department;
    public string $joining_date;

    public function __construct(Object $conn)
    {
        $this->dbconn = $conn;
    }

    public function setValues(...$params)
    {
        $this->name = $params[0];
        $this->email = $params[1];
        $this->role = $params[2];
        $this->emp_code = $params[3];
        $this->phone = $params[4];
        $this->designation = $params[5];
        $this->department = $params[6];
        $this->joining_date = $params[7];
    }

    public function updateData()
    {
        $sql = "UPDATE `users` u
                JOIN `employees` e ON u.id=e.user_id
                SET
                    u.name=:name, u.role=:role,
                    e.emp_code=:emp_code, e.phone=:phone, e.designation=:designation, e.department=:department, e.joining_date=:joining_date
                WHERE u.email='" . $this->email . "'";

        $stmt = $this->dbconn->prepare($sql);

        $updateData = [
            ":name" => $this->name,
            ":role" => $this->role,
            ":emp_code" => $this->emp_code,
            ":phone" => $this->phone,
            ":designation" => $this->designation,
            ":department" => $this->department,
            ":joining_date" => (strlen(trim($this->joining_date)) > 0) ? $this->joining_date : date("Y-m-d")
        ];

        if ($stmt->execute($updateData)) {
            $this->setCookie();
            return;
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Something went wrong. Please! Try again later"
            ]);
            return;
        }
    }


    public function setCookie()
    {
        $sql = "SELECT * FROM `users` u INNER JOIN `employees` e ON u.id=e.user_id WHERE u.email='" . $this->email . "'";
        $record = $this->dbconn->query($sql);
        $record = ($record->fetchAll())[0];

        $cookieData = [
            "name" => $record["name"],
            "email" => $record["email"],
            "role" => $record["role"],
            "emp_code" => $record["emp_code"],
            "phone" => $record["phone"],
            "designation" => $record["designation"],
            "department" => $record["department"],
            "joining_date" => $record["joining_date"]
        ];

        echo json_encode([
            "status" => "success",
            "message" => "Profile updated successfully"
        ]);

        setcookie("user", json_encode($cookieData), time() + 86400, "/");
        return;
    }
}


if (isset($_POST["email"])) {

    $profile = new Profile($conn);
    $profile->setValues($_POST["name"], $_POST["email"], $_POST["role"], $_POST["emp_code"], (float)$_POST["phone"], $_POST["designation"], $_POST["department"], $_POST["joining_date"]);
    $profile->updateData();
}
