<?php
session_start();
require_once 'config/db.php';

$user = $_SESSION['user'];
$position = $user["position"];
$userID = $user["employeeID"];

if(!isset($_POST['enroll']))
{
    $_SESSION['error'] = "Empty"; 
    header("location : Course.php");
    return;
}

$getCourse = $conn->prepare("SELECT * FROM COURSE WHERE courseID = :courseID");
$getCourse -> bindParam(":courseID",$_POST['courseID']);
$getCourse->execute();
$getCourse = $getCourse -> fetch(PDO::FETCH_ASSOC);

if($getCourse["position"] != $position)
{
    $_SESSION['warning'] = "You can not enroll this course"; 
    header("location : Course.php");
    return;
}

$enroll = $conn -> prepare("INSERT INTO ENROLLMENT (employeeID,courseID) VALUES (:employeeID,:courseID)");
$enroll -> bindParam(":employeeID",$userID);
$enroll -> bindParam(":courseID",$getCourse["courseID"]);
$enroll -> execute();
$_SESSION['success'] = "Enroll successfully"; 
header("location : Course.php");
return;
?>
