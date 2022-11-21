<?php

session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Attendance Record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<link href="Navbar.css" type="text/css" rel="stylesheet" />
<!--<link href="Attendance.css" type="text/css" rel="stylesheet" />-->
<style>
  table {
    width: 60%;
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
    font-size: large;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  th {
    border: 1px solid black;
    font-size: x-large;
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
</style>

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
  <div style="border-style: solid ; height: 100%; margin-top: 71px; padding: 30px;">
    <h1>Attendance Record</h1>
    <table class="type1" id="t01">
      <tr>
        <th>Date</th>
        <th>Time In</th>
        <th>Time Out</th>
      </tr>
      <?php
      $getAtd = $conn->prepare("SELECT * FROM ATTENDANCE WHERE employeeID = :employeeID");
      $getAtd->bindParam(":employeeID", $user["employeeID"]);
      $getAtd->execute();
      foreach ($getAtd as $row) {
        echo "<tr>";
        echo "<td>" . $row["employeeID"] . "</td>";
        echo "<td>" . $row["timeIn"] . "</td>";
        echo "<td>" . $row["timeOut"] . "</td>";
        echo "</tr>";
      }
      ?>
    </table>
    <!--<div class="center">
      <button type="submit" class="container"><i class="fa fa-arrow-left"></i> Previous</button>
      <button type="submit" class="container">Next <i class='fa fa-arrow-right'></i></button>
    </div>-->
  </div>
</body>

</html>