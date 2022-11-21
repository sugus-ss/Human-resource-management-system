<?php

session_start();
require_once 'config/db.php';

?>

<?php
if (isset($_POST['login'])) {
    $inputEmail = $_POST['email'];
    $inputID = $_POST['employeeID'];

    $login = $conn->prepare("SELECT employeeID,email FROM EMPLOYEE WHERE email = :email");
    $login->bindParam(":email", $inputEmail);
    $login->execute();
    $login = $login->fetch(PDO::FETCH_ASSOC);

    if ($login["employeeID"] !== $inputID || $login["email"] !== $inputEmail) {
        $_SESSION['error'] = "Wrong email or password";
        header("location : index.php");
        return;
    }
    $user = $conn->prepare("SELECT * FROM EMPLOYEE WHERE email = :email");
    $user->bindParam(":email", $inputEmail);
    $user->execute();
    $user = $user->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;
    header("location : Home.php");
    return;
}
?>