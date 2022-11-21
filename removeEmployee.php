<?php

session_start();
require_once 'config/db.php';

if (isset($_SESSION['remove_employee'])) {
    $eList = $_SESSION['remove_employee'];
    for ($loop = 0 ; $loop < count($eList) ; $loop++) {
        $employeeID = $eList[$loop]["employeeID"];
        $position = $eList[$loop]["position"];
        

        $update_position = $conn->prepare("SELECT * FROM POSITION WHERE position = :position");
        $update_position->bindParam(":position", $position);
        $update_position->execute();
        $row_position = $update_position->fetch(PDO::FETCH_ASSOC);

        $delete_employee = $conn->prepare("DELETE FROM EMPLOYEE WHERE employeeID = :employee");
        $delete_employee->bindParam(":employee", $employeeID);
        $delete_employee->execute();

        $left = $row_position['posLeft'];
        $left = $left + 1;
        $update_posLeft = $conn->prepare("UPDATE POSITION SET posLeft = '$left' WHERE position = '$position'");
        $update_posLeft->execute();

        unset($_SESSION['remove_employee']);
        header("location : EList.php");
    }

}?>
