<?php

session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
if ($user["position"] != "HR") {
    echo "404 Not Found";
    return;
}
?>
<html>

<head>
    <title>Promote</title>
    <link href="Navbar.css" type="text/css" rel="stylesheet" />
    <style>
        table {
            width: 50%;
            /*table-layout: fixed;*/
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 13px;
        }

        td {
            border-right: 1px solid black;
            border-left: 1px solid black;
        }

        th {
            border: 1px solid black;
        }




        #t01 th:nth-child(odd),
        td:nth-child(odd) {
            background-color: #9DE7B1;
        }

        #t01 th:nth-child(even),
        td:nth-child(even) {
            background-color: #E4F9EA;
        }

        .center {
            display: flex;
            margin-top: 10px;
            justify-content: center;
            align-items: center;
            height: 50px;
        }

        .container {
            color: white;
            font-size: 15px;
            display: inline-block;
            padding: 10px;
            margin: auto;
            width: 150px;
            border-radius: 90px;
            text-align: center;
            border: 0px solid #75EC96;
            background-color: #75EC96;
            justify-content: center;
        }

        button:hover {
            color: white;
            border: 1.5px solid #0093E0;
            background-color: #0093E0;
        }

        .searchbox {
            background-color: FFEAC9;
            border: 1px solid black;
            width: 534px;
            height: 31;
            margin-top: 8px;
            margin-left: 70px;
            float: left;
        }


        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup form - hidden by default */

        .search {
            color: white;
            font-size: 25px;

            height: 30px;
            width: 120px;
            border-radius: 50px;
            text-align: center;
            border: 0px solid #75EC96;
            background-color: #75EC96;
            margin-left: 20px;
        }

        .searchbox {
            background-color: FFEAC9;
            border: 1px solid black;
            width: 534px;
            height: 35px;
            margin-top: 8px;
            margin-left: 70px;
            float: left;
        }
    </style>
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
    <div style="border-style: solid ; height :fit-content; margin-top: 71px; padding: 30px;">
        <h1 style="margin-bottom: 80px;">Promote</h1>
        <?php
        $r = -1;
        $getGrade = $conn->prepare("SELECT p.evaEmployeeID AS employeeID, AVG(g.percent) AS percent,e.fName AS firstName,e.lName AS lastName,e.position AS position
    FROM PERFORMANCE p,EMPLOYEE e, GRADE g WHERE e.employeeID = p.evaEmployeeID AND e.position != 'CEO' AND p.grade = g.grade 
    GROUP BY p.evaEmployeeID");
        $getGrade->execute();

        echo "<table id = 't01'>";
        echo "<tr>";
        echo "<th>  EmployeeID  </th> ";
        echo "<th>  FirstName   </th> ";
        echo "<th>  Lastname    </th> ";
        echo "<th>  Position    </th> ";
        echo "<th>  Percent     </th> ";
        echo "</tr>";
        if (!empty($getGrade)) {
            $_SESSION['promote'] = array();
            $r = 0;
        }

        foreach ($getGrade as $row) {
            # code...
            if ($row["percent"] >= 12) {

                if (!strpos($row["position"], "Manager")) {

                    echo "<tr>";
                    echo "<td>" . $row["employeeID"] .  "</td> ";
                    echo "<td>" . $row["firstName"] .  "</td> ";
                    echo "<td>" . $row["lastName"] . "</td> ";
                    echo "<td>" . $row["position"] . "</td> ";
                    echo "<td>" . $row["percent"] . "</td> ";
                    echo "</tr>";
                    if ($r >= 0) {
                        $_SESSION['promote'][$r] = $row["employeeID"];
                        $r++;
                    }
                }


                # code...
            }
        }

        echo "</table>";

        ?>
        <form action="promoteEmployeeDB.php" method="post">
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


            <input class="searchbox" type="text" name="employeeID" required>

            <button class="search" type="submit" name="promoteEmployee" class="btn">Promote</button>


        </form>
    </div>
</body>

</html>