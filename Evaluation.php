<?php

session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
$userID = $user["employeeID"];
$userPos = $user["position"];
$loop = 0;
$evaList = array();

$_SESSION['evaList'] = array();

if (strpos($userPos, "Manager")) {
  $managerID = $userID;
} else {
  $getManager = $conn->prepare("SELECT managerID FROM BRANCH WHERE employeeID = :employeeID");
  $getManager->bindParam(":employeeID", $userID);
  $getManager->execute();
  $getManager = $getManager->fetch(PDO::FETCH_ASSOC);
  $managerID = $getManager["managerID"];
}

if (!empty($managerID)) {
  $getbranch = $conn->prepare("SELECT employeeID,fName,lName FROM EMPLOYEE WHERE employeeID IN (SELECT employeeID FROM BRANCH WHERE managerID = :managerID AND employeeID != :userID)");
  $getbranch->bindParam(":managerID", $managerID);
  $getbranch->bindParam(":userID", $userID);
  $getbranch->execute();

  foreach ($getbranch as $row) {
    $evaList[$loop] = $row;
    $_SESSION['evalist'][$loop] = $row["employeeID"];
    $loop++;
  }
  if (!strpos($userPos, "Manager")) {
    $getManInfo = $conn->prepare("SELECT employeeID,fName,lName FROM EMPLOYEE WHERE employeeID = :managerID");
    $getManInfo->bindParam(":managerID", $managerID);
    $getManInfo->execute();
    $getManInfo = $getManInfo->fetch(PDO::FETCH_ASSOC);
    $evaList[$loop] = $getManInfo;

    $_SESSION['evalist'][$loop] = $getManInfo["employeeID"];
    $loop++;
  }
}

?>
<html>

<head>
  <title>Evaluation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    table#t01 {
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
    }

    table#t01 tr:nth-child(even) {
      background-color: #E4F9EA;
    }

    table#t01 tr:nth-child(odd) {

      background-color: #9DE7B1;
    }

    table#t01 th {
      background-color: #9DE7B1;
      color: black;
    }

    table,
    th,
    td,
    tr {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 20px;
    }

    th,
    td {
      border: none;
      text-align: center;
      border-collapse: collapse;
      padding: 20px;
    }
    th{
      font-size: larger;
    }
    td{
      font-size: large;
    }

    input {
      margin: auto;
      /*setting margin to auto of the cheeckbox*/
      display: flex;
      /*Flex box property*/
    }

    .evaluate {
      color: white;
      font-size: 25px;

      width: 120px;
      border-radius: 50px;
      text-align: center;
      border: 0px solid #75EC96;
      background-color: #75EC96;
      height: 50px;
      border: 0px;
      float: right;
      margin-right: 70px;
      margin-top: 20px;
      
    }

    table {
      width: 60%;
    }

    td {
      text-align: center;
    }
  </style>
</head>
<link href="Navbar.css" type="text/css" rel="stylesheet" />

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
    
    <h1 style="float:left;">Evaluation: </h1>
    
    <form action="evaluateDB.php" method="POST" style="margin-bottom: 50px;">
      <table id="t01">

        <tr>
          <th>EmployeeID</th>
          <th>Name</th>
          <th>Surname</th>
          <th>A</th>
          <th>B</th>
          <th>C</th>
          <th>D</th>
        </tr>
        <?php
        for ($loop = 0; $loop < count($evaList); $loop++) {
          echo "<tr>";
          echo "<td>" . $evaList[$loop]["employeeID"] . "</td>";
          echo "<td>" . $evaList[$loop]["fName"] . "</td>";
          echo "<td>" . $evaList[$loop]["lName"] . "</td>";
          echo "<td><input type='radio' name = '" . $loop . "' value = 'A'></td>";
          echo "<td><input type='radio' name = '" . $loop . "' value = 'B'></td>";
          echo "<td><input type='radio' name = '" . $loop . "' value = 'C'></td>";
          echo "<td><input type='radio' name = '" . $loop . "' value = 'D'></td>";
          echo "</tr>";
        }
        ?>


      </table>
      <button class="evaluate" type="submit" name="evaluate">Save</button>
    </form>
  </div>
</body>

</html>