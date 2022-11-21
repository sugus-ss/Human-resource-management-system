<?php

session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
$userID = $user["employeeID"];
$evaList = $_SESSION['evalist'];
?>

<?php
    if(isset($_POST['evaluate']))
    {
        
        if(empty($evaList))
        {
            echo "EMPTY";
            header("location : Evaluation.php");
            return;
        }
        for($loop = 0;$loop < count($evaList);$loop++)
        {
            $grade = $_POST[strval($loop)];
            
            if(!empty($grade))
            {
                $check = $conn -> prepare("SELECT * FROM PERFORMANCE WHERE employeeID = :employeeID AND evaEmployeeID = :evaID");
                $check -> bindParam(":employeeID",$userID);
                $check -> bindParam(":evaID",$evaList[$loop]);
                $check -> execute();
                $check = $check -> fetch(PDO::FETCH_ASSOC);
                if(isset($check["employeeID"]))
                {
                    continue;
                }
                $evaluate = $conn -> prepare("INSERT INTO PERFORMANCE(employeeID,evaEmployeeID,grade) VALUES(:employeeID,:evaID,:grade)");
                $evaluate -> bindParam(":employeeID",$userID);
                $evaluate -> bindParam(":evaID",$evaList[$loop]);
                $evaluate -> bindParam(":grade",$grade);
                $evaluate -> execute();
                echo $evaList[$loop];
            }
        }
        header("location : Evaluation.php");
    }
?>