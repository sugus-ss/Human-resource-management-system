<?php

session_start();
require_once 'config/db.php';

if (isset($_POST['add_employee'])) {
    
    $employeeID = $_POST['employeeID'];
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $bDate = $_POST['bDate'];
    $sex = $_POST['sex'];
    $tel = $_POST['tel'];
    $Email = $_POST['Email'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $conDisease = $_POST['conDisease'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $degree = $_POST['degree'];
    $faculty = $_POST['faculty'];
    $schoolName = $_POST['schoolName'];

    $target_dir = "employeePic/";
    echo basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    /*if (empty($employeeID)) {
        $_SESSION['error'] = 'Please enter your employeeID';
        header("location: addEmployee.php");
    } else if (empty($fName)) {
        $_SESSION['error'] = 'Please enter your first name';
        header("location: addEmployee.php");
    } else if (empty($lName)) {
        $_SESSION['error'] = 'Please enter your last name';
        header("location: addEmployee.php");
    } else if (empty($bDate)) {
        $_SESSION['error'] = 'Please enter your date of birth';
        header("location: addEmployee.php");
    } else if (empty($sex)) {
        $_SESSION['error'] = 'Please enter your sex';
        header("location: addEmployee.php");
    } else if (empty($Email)) {
        $_SESSION['error'] = 'Please enter your E-mail';
        header("location: EList.php");
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format';
        header("location: EList.php");
    } else if (empty($address)) {
        $_SESSION['error'] = 'Please enter your address';
        header("location: EList.php");
    } else if (empty($conDisease)) {
        $_SESSION['error'] = 'Please enter your con disease';
        header("location: EList.php");
    } else if (empty($startDate)) {
        $_SESSION['error'] = 'Please enter your start date';
        header("location: EList.php");
    } else if (empty($endDate)) {
        $_SESSION['error'] = 'Please enter your end date';
        header("location: EList.php");
    } else if (empty($degree)) {
        $_SESSION['error'] = 'Please enter your degree';
        header("location: EList.php");
    } else if (empty($faculty)) {
        $_SESSION['error'] = 'Please enter your faculty;';
        header("location: EList.php");
    } else if (empty($schoolName)) {
        $_SESSION['error'] = 'Please enter your school name';
        header("location: EList.php");
    } else {*/
        try {

            $check_ID = $conn->prepare("SELECT * FROM EMPLOYEE where employeeID = :employeeID OR email = :email");
            $check_ID->bindParam(":employeeID", $employeeID);
            $check_ID->bindParam(":email", $Email);
            $check_ID->execute();
            $row_ID = $check_ID->fetch(PDO::FETCH_ASSOC);

            $check_posLeft = $conn->prepare("SELECT * FROM POSITION WHERE position = :position");
            $check_posLeft->bindParam(":position", $position);
            $check_posLeft->execute();
            $row_position = $check_posLeft->fetch(PDO::FETCH_ASSOC);

            if ($row_ID['employeeID'] == $employeeID) {
                $_SESSION['warning'] = "Employee ID have already been used";
                header("location : Add.php");
            } else if ($row_ID['email'] == $Email) {
                $_SESSION['warning'] = "E-mail have already been used";
                header("location : Add.php");
            } else if ($row_position['posLeft'] < 1) {
                $_SESSION['warning'] = "The position is full";
                header("location : Add.php");
            } else if (!isset($_SESSION['error'])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    $_SESSION['error'] = "Sorry, your file was not uploaded.";
                    header("location : Add.php");
                   
                } else {
                    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                        header("location : Add.php");
                    }
                }

                $left = $row_position['posLeft'];
                $left = $left - 1;
                $update_posLeft = $conn->prepare("UPDATE POSITION SET posLeft = '$left' WHERE position = '$position'");
                $update_posLeft->execute();

                $sql_employee = $conn->prepare("INSERT INTO EMPLOYEE (employeeID, fName, lName, bDate, sex, tel, email, address, position, conDisease,employeePic)
                    VALUES (:employeeID, :fName, :lName, :bDate, :sex, :tel, :Email, :address, :position, :conDisease, :picture)");

                $sql_employee->bindParam(":employeeID", $employeeID);
                $sql_employee->bindParam(":fName", $fName);
                $sql_employee->bindParam(":lName", $lName);
                $sql_employee->bindParam(":bDate", $bDate);
                $sql_employee->bindParam(":sex", $sex);
                $sql_employee->bindParam(":tel", $tel);
                $sql_employee->bindParam(":Email", $Email);
                $sql_employee->bindParam(":address", $address);
                $sql_employee->bindParam(":position", $position);
                $sql_employee->bindParam(":conDisease", $conDisease);
                $sql_employee -> bindParam(":picture",$target_file);
                $sql_employee->execute();

                $sql_contract = $conn->prepare("INSERT INTO CONTRACT (employeeID, startDate, endDate)
                    VALUES (:employeeID, :startDate, :endDate)");
                $sql_contract->bindparam(":employeeID", $employeeID);
                $sql_contract->bindparam(":startDate", $startDate);
                $sql_contract->bindparam(":endDate", $endDate);
                $sql_contract->execute();

                $sql_education_his = $conn->prepare("INSERT INTO EDUCATION_HIS (employeeID, degree, faculty, schoolName)
                    VALUES (:employeeID, :degree, :faculty, :schoolName)");
                $sql_education_his->bindparam(":employeeID", $employeeID);
                $sql_education_his->bindparam(":degree", $degree);
                $sql_education_his->bindparam(":faculty", $faculty);
                $sql_education_his->bindparam(":schoolName", $schoolName);
                $sql_education_his->execute();

                $_SESSION['success'] = "Successful adding new employee!";
                header("location : EList.php");
            } else {
                $_SESSION['success'] = "Something is wrong";
                header("location : EList.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
//}
