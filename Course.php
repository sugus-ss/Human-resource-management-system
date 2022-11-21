<?php
session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
$position = $user["position"];
$getCourse = $conn->prepare("SELECT * FROM COURSE");
$getCourse->execute();
?>
<html>

<head>
  <style>
    body{
      background-color: white;
    }
    .search {
      color: white;
      font-size: 25px;

      height: 35px;
      width: 120px;
      border-radius: 50px;
      text-align: center;
      border: 0px solid #75EC96;
      background-color: #75EC96;
      float: left;
      margin-left: 20px;
    }

    .searchbox {
      background-color: FFEAC9;
      width: 534px;
      height: 31;
      margin-left: 20%;
      float: left;
      border: 2px solid black;
      border-radius: 20px;
      background-color: #E4F9EA;
      font-size: large;
      padding-left: 15px;

    }

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
    input[type="text"]:focus,
    input[type="text"]:hover
    {
      border: 2px solid #0093E0;
      outline: none;
    }
    .search:hover {
      color: white;
      border: 1.5px solid #0093E0;
      background-color: #0093E0;
    }
  </style>
  <title>Training Course</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <h1>Training Course</h1>
    <?php echo "<h2>Your Position : " . $position . "</h2>"; ?>


    <table class="type1" id="t01">
      <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Position</th>
        <th>Hour</th>
      </tr>
      <?php

      foreach ($getCourse as $row) {
        echo "<tr>";
        echo "<td>" . $row["courseID"] . "</td>";
        echo "<td>" . $row["courseName"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        echo "<td>" . $row["hour"] . "</td>";
        echo "</tr>";
      } ?>

    </table>
    <form action="enrollment.php" method="POST" style="margin-bottom : 50px">
      <input class="searchbox" type="text" id="searchbox" name="courseID" placeholder="Enter Course ID" required>
      <input type="submit" name="enroll" class="search" value="Enroll">
    </form>
    <?php if (isset($_SESSION['error'])) { ?>
      <div role="alert">
        <?php
        echo "<h4 style='color:black; text-align:center; font-size: 30px;'>" . $_SESSION['error'] . "</h4>";
        unset($_SESSION['error']);
        ?>
      </div>
    <?php } ?>
    <?php if (isset($_SESSION['warning'])) { ?>
      <div role="alert">
        <?php
        echo "<h4 style='color:black; text-align:center; font-size: 30px;'>" . $_SESSION['warning'] . "</h4>";
        unset($_SESSION['warning']);
        ?>
      </div>
    <?php } ?>
    <?php if (isset($_SESSION['success'])) { ?>
      <div role="alert">
        <?php
        echo "<h4 style='color:black; text-align:center; font-size: 30px;'>" . $_SESSION['success'] . "</h4>";
        unset($_SESSION['success']);
        ?>
      </div>
    <?php } ?>
    <!--<div class="center">
      <button type="submit" class="container"><i class="fa fa-arrow-left"></i> Previous</button>
      <button type="submit" class="container">Next <i class='fa fa-arrow-right'></i></button>
    </div>-->
  </div>
</body>

</html>