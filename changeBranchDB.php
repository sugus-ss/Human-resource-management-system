<?php

session_start();
require_once 'config/db.php';

?>

<?php
if (!isset($_POST['branch'])) {
    $_SESSION['error'] = "Nothing";
    return;
}
$employeeID = $_POST['employeeID'];
$changePos = $_POST['posList'];
if(empty($employeeID))
{
    $_SESSION['error'] = "Empty fied in ID";
    header("location : index.php");
    return;
}

if(empty($changePos))
{
    $_SESSION['error'] = "Please select position to change";
    header("location : index.php");
    return;
}

$getPos = $conn->prepare("SELECT position FROM EMPLOYEE WHERE employeeID = :employeeID");
$getPos -> bindParam(":employeeID",$employeeID);
$getPos -> execute();
$getPos = $getPos->fetch(PDO::FETCH_ASSOC);
if ($changePos == $getPos["position"]) {
    $_SESSION['error'] = "They are the same position";
    header("location : index.php");
    return;
}
$setPos = $conn->prepare("UPDATE EMPLOYEE SET position = :changePos WHERE employeeID = :employeeID");
$setPos -> bindParam(":changePos",$changePos);
$setPos -> bindParam(":employeeID",$employeeID);
$setPos->execute();

$deleteBranch = $conn->prepare("DELETE FROM BRANCH WHERE employeeID = :employeeID");
$deleteBranch -> bindParam(":employeeID",$employeeID);
$deleteBranch->execute();

$_SESSION['success'] = "Change position successful";
header("location : index.php");
?>