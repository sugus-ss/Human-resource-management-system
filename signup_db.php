<?php
    
    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
    $ctFirstName = $_POST['ctFirstName'];
    $ctLastName = $_POST['ctLastName'];
    $ctPassword = $_POST['ctPassword'];
    $c_password= $_POST['c_password'];
    $ctTel= $_POST['ctTel'];
    $ctEmail = $_POST['ctEmail'];
    $ctGender = $_POST['ctGender'];
    $ctDOB= $_POST['ctDOB'];
    $mbTypeName ='user';
        
        if (empty($ctFirstName)) {
        $_SESSION['error'] = 'Please enter your firstName';
        header("location: index.php");
        }
        else if(empty($ctLastName)){
            $_SESSION['error'] = 'Please enter your lastname';
            header("location: index.php");
        }
        else if (empty($ctPassword)) {
            $_SESSION['error'] = 'Please enter your password';
            header("location: index.php");
        } else if (strlen($_POST['ctPassword']) > 20 || strlen($_POST['ctPassword']) < 5) {
            $_SESSION['error'] = 'password 5 to 20';
            header("location: index.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'Please confirm your password';
            header("location: index.php");
        } else if ($ctPassword != $c_password) {
            $_SESSION['error'] = 'Incorrect password';
            header("location: index.php");
        }   
        else if(empty($ctTel)){
            $_SESSION['error'] = 'Please enter your phone number';
            header("location: index.php");
        }
        else if(empty($ctEmail)){
            $_SESSION['error'] = 'Please enter your email';
            header("location: index.php");
        }
        else if(!filter_var($ctEmail, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'Invalid email format';
            header("location: index.php");
        }
        else if(empty($ctGender)){
            $_SESSION['error'] = 'Please enter your gender';
            header("location: index.php");
        }
        else if(empty($ctDOB)){
            $_SESSION['error'] = 'Please enter your date';
            header("location: index.php");
        }
        else {
            try {
                $check_email = $conn->prepare("SELECT ctEmail FROM CustomerInfo where ctEmail = :ctEmail");
                $check_email->bindParam(":ctEmail", $ctEmail);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if($row['ctEmail'] == $ctEmail){
                    $_SESSION['warning'] = "Already have this email <a href = 'signin.php'> click here </a> for sign in";
                    header("location : index.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($ctPassword, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO CustomerInfo(ctFirstName,ctLastName,ctPassword,ctTel,ctEmail, ctGender, ctDOB, mbTypeName)
                    VALUES (:ctFirstName, :ctLastName, :ctPassword, :ctTel, :ctEmail, :ctGender, :ctDOB, :mbTypeName)");

                    $stmt->bindParam(":ctFirstName", $ctFirstName);
                    $stmt->bindParam(":ctLastName", $ctLastName);
                    $stmt->bindParam(":ctPassword", $passwordHash);
                    $stmt->bindParam(":ctTel", $ctTel);
                    $stmt->bindParam(":ctEmail", $ctEmail);
                    $stmt->bindParam(":ctGender", $ctGender);
                    $stmt->bindParam(":ctDOB", $ctDOB);
                    $stmt->bindParam(":mbTypeName", $mbTypeName);
                    $stmt->execute();

                    $_SESSION['success'] = "Successful registration! <a href ='sigin.php class='alert-link'>Click here</a> for log in";
                    header("location : index.php");
                } else{
                    $_SESSION['success'] = "Something is wrong";
                    header("location : index.php");
                }

            } catch(PDOException $e){
                echo $e->getMessage();
            }

        }
    }



?>