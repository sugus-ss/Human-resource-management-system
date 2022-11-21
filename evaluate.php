<?php

session_start();
require_once 'config/db.php';
$testID = "E001" //$_SESSION["loginID"];
?>
<html>

<head>
    <title>Add employee</title>
</head>

<body>
    <?php
    $getName = $conn->prepare("SELECT fName AS firstName,lname AS lastName WHERE employeeID != :testID");
    $getName->bindParam(":testID", $testID);
    $getName->execute();
    $row_ID = $getName->fetch(PDO::FETCH_ASSOC);
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
        
        //}
    }
    echo "</table>";
    ?>
    <!--<form action="addEmployee.php" method="post">
        <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <div class="input-group">
                <label for="employeeID">Employee ID</label>
                <input type="text" name="employeeID">
            </div>
            <div class="input-group">
                <label for="evaEmployeeID">First Name</label>
                <input type="text" name="firstName">
            </div>
            <div class="input-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName">
            </div>
            <div class="input-group">
                <label for="bDate">Date of birth</label>
                <input type="date" name="bDate">
            </div>
            <div class="input-group">
                <label for="sex">Sex</label>
                <input type="text" name="sex">
            </div>
            <div class="input-group">
                <label for="tel">Phone number</label>
                <input type="text" name="tel">
            </div>
            <div class="input-group">
                <label for="Email">Email</label>
                <input type="text" name="Email">
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" name="address">
            </div>
            <div class="input-group">
                <label for="position">Position</label>
                <input type="text" name="position">
            </div>
            <div class="input-group">
                <label for="conDisease">Con disease</label>
                <input type="text" name="conDisease">
            </div>
            <div class="input-group">
                <label for="startDate">Starting date</label>
                <input type="date" name="startDate">
            </div>
            <div class="input-group">
                <label for="endDate">Ending date</label>
                <input type="date" name="endDate">
            </div>
            <div class="input-group">
                <label for="degree">Degree</label>
                <input type="text" name="degree">
            </div>
            <div class="input-group">
                <label for="faculty">Faculty</label>
                <input type="text" name="faculty">
            </div>
            <div class="input-group">
                <label for="schoolName">School name</label>
                <input type="text" name="schoolName">
            </div>
            <div class="input-group">
                <button type="submit" name="add_employee" class="btn">Submit</button>
            </div> -->
    </form>
</body>

</html>