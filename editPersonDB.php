<?php

session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
?>
<?php
if (isset($_POST['edit'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $conDisease = $_POST['cond'];


    if (!empty($firstName)) {
        $query = $conn->prepare("UPDATE EMPLOYEE SET fName = :fname WHERE employeeID = :employeeID");
        $query->bindParam(":fname", $firstName);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }
    if (!empty($lastName)) {
        $query = $conn->prepare("UPDATE EMPLOYEE SET lName = :lname WHERE employeeID = :employeeID");
        $query->bindParam(":lname", $lastName);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }
    if (!empty($gender)) {
        $query = $conn->prepare("UPDATE EMPLOYEE SET sex = :gender WHERE employeeID = :employeeID");
        $query->bindParam(":gender", $gender);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }
    if (!empty($phone)) {
        $query = $conn->prepare("SELECT * FROM EMPLOYEE WHERE tel = :phone");
        $query->bindParam(":phone", $phone);
        
        $query->execute();
        if (!empty($query)) {
            $_SESSION['warning'] = "Can not edit. Duplicate phone number.";
            header("location : EditPerson.php");
            return;
        }
        $query = $conn->prepare("UPDATE EMPLOYEE SET tel = :phone WHERE employeeID = :employeeID");
        $query->bindParam(":lname", $phone);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }
    if (!empty($address)) {
        $query = $conn->prepare("UPDATE EMPLOYEE SET address = :address WHERE employeeID = :employeeID");
        $query->bindParam(":address", $address);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }
    if (!empty($email)) {
        $query = $conn->prepare("SELECT * FROM EMPLOYEE WHERE tel = :email");
        $query->bindParam(":email", $email);
        $query->execute();
        if (!empty($query)) {
            $_SESSION['warning'] = "Can not edit. Duplicate email.";
            header("location : EditPerson.php");
            return;
        }

        $query = $conn->prepare("UPDATE EMPLOYEE SET email = :email WHERE employeeID = :employeeID");
        $query->bindParam(":email", $email);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }

    if (!empty($conDisease)) {
        $query = $conn->prepare("UPDATE EMPLOYEE SET conDisease = :cond WHERE employeeID = :employeeID");
        $query->bindParam(":cond", $conDisease);
        $query->bindParam(":employeeID", $user["employeeID"]);
        $query->execute();
    }
    header("location : PersonalInfo.php");
}

?>