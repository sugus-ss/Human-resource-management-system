<?php 

session_start();
require_once 'config/db.php';

if (isset($_POST['signin'])) {
    $ctEmail = $_POST['ctEmail'];
    $ctPassword = $_POST['ctPassword'];

  
    if (empty($ctEmail)) {
        $_SESSION['error'] = 'Please enter your email';
        header("location: signin.php");
    } else if (!filter_var($ctEmail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format';
        header("location: signin.php");
    } else if (empty($ctPassword)) {
        $_SESSION['error'] = 'Please enter your password';
        header("location: signin.php");
    } else if (strlen($_POST['ctPassword']) > 20 || strlen($_POST['ctPassword']) < 5) {
        $_SESSION['error'] = 'password 5 to 20';
        header("location: signin.php");
    } else {
        try {

            $check_data = $conn->prepare("SELECT * FROM CustomerInfo WHERE ctEmail = :ctEmail");
            $check_data->bindParam(":ctEmail", $ctEmail);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {

                if ($ctEmail == $row['ctEmail']) {
                    if (password_verify($ctPassword, $row['ctPassword'])) {
                        if ($row['mbTypeName'] == 'admin') {
                            $_SESSION['admin_login'] = $row['ctUserID'];
                            header("location: admin.php");
                        } else {
                            $_SESSION['user_login'] = $row['ctUserID'];
                            header("location: user.php");
                        }
                    } else {
                        $_SESSION['error'] = 'wrong password';
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = 'wrong email';
                    header("location: signin.php");
                }
            } else {
                $_SESSION['error'] = "no data in the system";
                header("location: signin.php");
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>