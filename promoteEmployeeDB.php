<?php

session_start();
require_once 'config/db.php';

?>

<?php
if (!isset($_POST['promoteEmployee'])) {
    $_SESSION['error'] = "Empty field";
    header("location : promoteEmployee.php");
    return;
}
$result = -1;
$posNum = -1;
$allProID = $_SESSION['promote'];
$proID = $_POST['employeeID'];
for ($loop = 0; $loop < count($allProID); $loop++) {
    if ($proID == $allProID[$loop]) {
        $result = 1;
        break;
    }
}
if ($result != 1) {
    $_SESSION['error'] = "This employee can not promote";
    header("location : promoteEmployee.php");
    return;
}
$position = $conn->prepare("SELECT e.position AS position,p.posLeft as posLeft FROM EMPLOYEE e, POSITION p WHERE employeeID = :proID");
$position -> bindParam(":proID",$proID);
$position->execute();
$position = $position->fetch(PDO::FETCH_ASSOC);
$oldPos = $position["position"];
echo $oldPos;


$getNewPos = $conn->prepare("SELECT position,posLeft from POSITION WHERE position LIKE '%$oldPos%' AND position LIKE '%Manager%'");
$getNewPos->execute();
$getNewPos = $getNewPos->fetch(PDO::FETCH_ASSOC);
$newPos = $getNewPos["position"];

if ($getNewPos["posLeft"] <= 0) {
    $_SESSION['warning'] = "Not enough position left to promote";
    header("location : promoteEmployee.php");
    return;
}
$posNumNew = $getNewPos["posLeft"] - 1;
$posNumOld = $position["posLeft"] + 1;


$updatePos = $conn->prepare("UPDATE EMPLOYEE SET position = '$newPos' WHERE employeeID = :proID ");
$updatePos -> bindParam(":proID",$proID);
$updatePos -> execute();
echo $newPos;

$updatePosLeft = $conn->prepare("UPDATE POSITION SET posLeft = '$posNumNew' WHERE position = '$newPos'");

$updatePosLeft->execute();


$updateOldPos = $conn->prepare("UPDATE POSITION SET posLeft = '$posNumOld' WHERE position = '$oldPos'");
$updateOldPos->execute();

$deleteBranch = $conn->prepare("DELETE FROM BRANCH WHERE employeeID = :proID");
$deleteBranch -> bindParam(":proID",$proID);
$deleteBranch->execute();

$reward = $conn -> prepare("INSERT INTO REWARD (employeeID,type,detail) VALUES(:employeeID,'Promote','Promote to Manager')");
$reward -> bindParam(":employeeID",$proID);
$reward -> execute();

$_SESSION['success'] = "Update successfully";
header("location : promoteEmployee.php");
?>