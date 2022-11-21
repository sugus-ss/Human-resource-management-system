<?php

session_start();
require_once 'config/db.php';

$user = $_SESSION['user'];
$userID = $user["employeeID"];
$position = $user['position'];
?>
<html>

<head>
    <title>Salary</title>
    <link href="Navbar.css" type="text/css" rel="stylesheet" />
    <link href="EList.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header style="background-color:#75EC96; height: 71px; padding: 15px;">
        <a href="Home.php"><img src="Logo.png" style="height: 70px;"></a>
    </header>
    <div class="navbar" style="background-color: #22CC51;">
        <div class="dropdown">
            <button class="dropbtn">Information
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="PersonalInfo.php">Personal Information</a>
                <a href="Attendance.php">Attendance Record</a>
                <a href="Overtime.php">Overtime</a>
                <a href="calculateSalary.php">Salary</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Employee
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="EList.php">Employee List</a>
                <a href="Branch.php">Branch</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Training
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="Course.php">Course</a>
            </div>
        </div>

        <?php
        if ($user["position"] == "HR") {
            echo "<div class='dropdown'>
      <button class='dropbtn'>Evaluation
        <i class='fa fa-caret-down'></i>
      </button>
      <div class='dropdown-content'>
      <a href='Evaluation.php'>Evaluation</a>
      <a href='promoteEmployee.php'>Promote</a>
      </div>
    </div>";
        } else {
            echo "<a href='Evaluation.php'>Evaluation</a>";
        }
        ?>
        <a href="index.php">Log Out</a>
    </div>
    <div style="border-style: solid ; height: max-content; margin-top: 71px; padding: 30px;">
        <h1>Salary</h1>

        <?php if (isset($_SESSION['success'])) { ?>
            <div class="center" role="alert">
                <?php
                echo "<h2 style='color:black; text-align:center; font-size: 30px; margin-bottom: 30px;'>" . $_SESSION['success'] . "</h2>";
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>

        <?php
        if ($position != 'HR') {
            try {
                $check_ID = $conn->prepare("SELECT * FROM EMPLOYEE where employeeID = :employeeID");
                $check_ID->bindParam(":employeeID", $userID);
                $check_ID->execute();
                $employee = $check_ID->fetch(PDO::FETCH_ASSOC);


                $check_pos = $conn->prepare("SELECT * FROM POSITION WHERE position = :position");
                $check_pos->bindParam(":position", $position);
                $check_pos->execute();
                $position_query = $check_pos->fetch(PDO::FETCH_ASSOC);

                $check_salary = $conn->prepare("SELECT * FROM ATTENDANCE where employeeID = :employeeID");
                $check_salary->bindParam(":employeeID", $userID);
                $check_salary->execute();

                $sum = 0;
                $hour = 0;
                $count = 0;


                //ATTENDANCE
                if ($check_salary->rowCount() != 0) {
                    if ($position_query['rateType'] == 'hour') {
                        foreach ($check_salary as $row) {
                            $in = $row['timeIn'];
                            $out = $row['timeOut'];
                            $to_time = strtotime($out);
                            $from_time = strtotime($in);
                            $hour = round(abs($to_time - $from_time) / 3600) + $hour;
                        }
                        $rate = $position_query['rate'];
                        $sum = $rate * $hour;
                    } else if ($position_query['rateType'] == 'month') {
                        foreach ($check_salary as $row) {
                            $count = $count + 1;
                        }
                        $rate = $position_query['rate'];
                        $sum = ($count / 20) * $rate;
                    }
                }

                //OT
                $OT = $conn->prepare("SELECT * FROM OT where employeeID = :employeeID");
                $OT->bindParam(":employeeID", $userID);
                $OT->execute();

                $count = 0;
                $dummy = 0;

                if ($OT->rowCount() != 0) {
                    foreach ($OT as $row) {
                        $count = $count + $row['hour'];
                    }
                    $dummy = $count * 50;
                    $sum = $sum + $dummy;
                }

                //PUNISHMENT
                $punishment = $conn->prepare("SELECT * FROM PUNISHMENT where employeeID = :employeeID");
                $punishment->bindParam(":employeeID", $userID);
                $punishment->execute();

                $dummy = 0;

                if ($punishment->rowCount() != 0) {
                    foreach ($punishment as $row) {
                        $dummy = $dummy + $row['deduction'];
                    }
                    $sum = $sum - $dummy;
                }

                //performance-grade
                $performance = $conn->prepare("SELECT * FROM PERFORMANCE where evaEmployeeID = :employeeID");
                $performance->bindParam(":employeeID", $userID);
                $performance->execute();

                $c = $conn->prepare("SELECT COUNT(*) AS count FROM PERFORMANCE where evaEmployeeID = :employeeID");
                $c->bindParam(":employeeID", $userID);
                $c->execute();
                $count = $c->fetch(PDO::FETCH_ASSOC);

                $dummy = 0;
                $grade;
                $ratio;



                if ($performance->rowCount() != 0) {
                    foreach ($performance as $row) {
                        $grade = $row['grade'];
                        $query_grade = $conn->prepare("SELECT * FROM GRADE where grade = :grade");
                        $query_grade->bindParam(":grade", $grade);
                        $query_grade->execute();
                        $q_grade = $query_grade->fetch(PDO::FETCH_ASSOC);
                        $dummy = $dummy + $q_grade['percent'];
                    }
                    $percent = $dummy / $count['count'];
                    $sum = $sum * (($percent / 100) + 1);
                }

                echo "<h3>Firstname : " . $user["fName"] . "</h3></br>";
                echo "<h3>Lastname : " . $user["lName"] . "</h3></br>";
                echo "<h3>Position : " . $position . "</h3></br>";
                echo "<h3>Salary : " . $sum . " Baht</h3></br>";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else //HR
        {

            $check_ID = $conn->prepare("SELECT * FROM EMPLOYEE");
            $check_ID->execute();
            $eList = array();
            $salary = array();
            $loop = 0;

            echo "<table class='type1' id='t01'>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Positon</th>
                <th>Salary (Baht)</th>
            </tr>";
            foreach ($check_ID as $employee) {

                $position = $employee['position'];
                $employeeID = $employee['employeeID'];
                try {
                    $check_pos = $conn->prepare("SELECT * FROM POSITION WHERE position = :position");
                    $check_pos->bindParam(":position", $position);
                    $check_pos->execute();
                    $position_query = $check_pos->fetch(PDO::FETCH_ASSOC);

                    $check_salary = $conn->prepare("SELECT * FROM ATTENDANCE where employeeID = :employeeID");
                    $check_salary->bindParam(":employeeID", $employeeID);
                    $check_salary->execute();

                    $sum = 0;
                    $hour = 0;
                    $count = 0;


                    //ATTENDANCE
                    if ($check_salary->rowCount() != 0) {
                        if ($position_query['rateType'] == 'hour') {
                            foreach ($check_salary as $row) {
                                $in = $row['timeIn'];
                                $out = $row['timeOut'];
                                $to_time = strtotime($out);
                                $from_time = strtotime($in);
                                $hour = round(abs($to_time - $from_time) / 3600) + $hour;
                            }
                            $rate = $position_query['rate'];
                            $sum = $rate * $hour;
                        } else if ($position_query['rateType'] == 'month') {
                            foreach ($check_salary as $row) {
                                $count = $count + 1;
                            }
                            $rate = $position_query['rate'];
                            $sum = ($count / 20) * $rate;
                        }
                    }


                    //OT
                    $OT = $conn->prepare("SELECT * FROM OT where employeeID = :employeeID");
                    $OT->bindParam(":employeeID", $employeeID);
                    $OT->execute();

                    $count = 0;
                    $dummy = 0;

                    if ($OT->rowCount() != 0) {
                        foreach ($OT as $row) {
                            $count = $count + $row['hour'];
                        }
                        $dummy = $count * 50;
                        $sum = $sum + $dummy;
                    }

                    //PUNISHMENT
                    $punishment = $conn->prepare("SELECT * FROM PUNISHMENT where employeeID = :employeeID");
                    $punishment->bindParam(":employeeID", $employeeID);
                    $punishment->execute();

                    $dummy = 0;

                    if ($punishment->rowCount() != 0) {
                        foreach ($punishment as $row) {
                            $dummy = $dummy + $row['deduction'];
                        }
                        $sum = $sum - $dummy;
                    }

                    //performance-grade
                    $performance = $conn->prepare("SELECT * FROM PERFORMANCE where evaEmployeeID = :employeeID");
                    $performance->bindParam(":employeeID", $employeeID);
                    $performance->execute();

                    $count = 0;
                    $dummy = 0;
                    $grade;
                    $ratio;

                    if ($performance->rowCount() != 0) {
                        foreach ($performance as $row) {
                            $grade = $row['grade'];
                            $query_grade = $conn->prepare("SELECT * FROM GRADE where grade = :grade");
                            $query_grade->bindParam(":grade", $grade);
                            $query_grade->execute();
                            $q_grade = $query_grade->fetch(PDO::FETCH_ASSOC);
                            $dummy = $dummy + $q_grade['percent'];
                            $count = $count + 1;
                        }
                        $percent = $dummy / $count;
                        $sum = $sum * (($percent / 100) + 1);
                    }


                    echo "<tr>
                    <td>" . $employee["employeeID"] . "</td>
                    <td>" . $employee["fName"] . "</td>
                    <td>" . $employee["lName"] . "</td>
                    <td>" . $employee["position"] . "</td>
                    <td>" . $sum . "</td>
                  </tr>";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            echo "</table>";
        }
        ?>
    </div>
</body>

</html>