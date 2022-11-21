<?php

session_start();
require_once 'config/db.php';

?>
<html>

<head>
    <title>Promote</title>
</head>

<body>
    <?php
    $getGrade = $conn->prepare("SELECT p.evaEmployeeID AS employeeID, AVG(g.percent) AS grade,e.fName AS firstName,e.lName AS lastName 
    FROM PERFORMANCE p,EMPLOYEE e, GRADE g WHERE e.employeeID = p.evaEmployeeID AND p.grade = g.grade GROUP BY p.evaEmployeeID");
    $getGrade->execute();
    $row_ID = $getGrade->fetch(PDO::FETCH_ASSOC);
    echo "<table border='1' align='center' class='table table-hover'>";
    echo "<tr>";
    echo "<td>" . "No." . "</td> ";
    echo "<td>" . "FirstName" . "</td> ";
    echo "<td>" . "Lastname" . "</td> ";
    echo "<td>" . "Age (Yr.)" . "</td> ";
    echo "</tr>";
    foreach ($row_ID as $row) {
        # code...
        //$getName = $conn->prepare("SELECT employeeID,firstName,lastName FROM EMPLOYEE WHERE employeeID = '$row'");
        //$getName->execute();
        /*if ($row["percent"] >= 12) {*/
        echo "<tr>";
        echo "<td>" . $row["employeeID"] .  "</td> ";
        echo "<td>" . $row["firstName"] .  "</td> ";
        echo "<td>" . $row["lastName"] . "</td> ";
        echo "<td>" . $row["percent"] . "</td> ";
        echo "</tr>";
        # code...
        //}
    }
    echo "</table>";
    ?>

</body>

</html>