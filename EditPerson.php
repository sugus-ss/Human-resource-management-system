<?php

session_start();
require_once 'config/db.php';
$user = $_SESSION['user'];
?>

<html>

<head>
  <title>Edit Personal Infomation</title>
  <style>
    .save {
      color: white;
      font-size: 25px;

      height: 50px;
      width: 120px;
      border-radius: 50px;
      text-align: center;
      border: 0px solid #75EC96;
      background-color: #75EC96;
    }

    input[type="text"],
    input[type="email"] {
      display: block;
      border-radius: 20px;
      padding: 14px;
      margin-top: 10px;
      margin-bottom: 24px;
      width: 50%;
      height: 35px;
      border: 2px solid black;
      background-color: #E4F9EA;
      font-size: large;
    }

    input[type="password"] {
      display: block;
      border-radius: 20px;
      padding: 14px;
      margin: auto;
      margin-bottom: 43px;
      width: 75%;
      border: 2px solid black;
      background-color: #E4F9EA;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="text"]:hover,
    input[type="password"]:hover {
      border: 2px solid #0093E0;
      outline: none;
    }

    button[type="submit"] {
      color: white;
      font-size: 25px;
      display: block;
      padding: 13px;
      margin: auto;
      width: 120px;
      border-radius: 90px;
      text-align: center;
      border: 0px solid #75EC96;
      background-color: #75EC96;
    }

    button[type="submit"]:hover {
      color: white;
      border: 1.5px solid #0093E0;
      background-color: #0093E0;
    }

    label {
      font-size: larger;
    }
  </style>
</head>
<link href="Navbar.css" type="text/css" rel="stylesheet" />
<link href="EditPerson.css" type="text/css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  <div style="border-style: solid ; height: 150%; margin-top: 71px; padding: 30px;">
    <h1 style="margin-bottom: 55px;">Edit Personal Information</h1>
    <form style="float: left; width: 35%; margin-left: 150px;margin-bottom : 50px;" action="editPersonDB.php" method="POST">
      <p>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname">
      </p>
      <p>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname">
      </p>
      <p>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">
      </p>
      <p>
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone">
      </p>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address">
      <p>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">
      </p>
      <p>
        <label for="cond">Congenital Disease:</label>
        <input type="text" id="cond" name="cond">
      </p>
      <p><br></p>
      <div style="margin-top: 50px;float: right; margin-right: 150px;">
        <button type="submit" class="save" name="edit">Save</button>
      </div>

    </form>
    <?php if (isset($_SESSION['error'])) { ?>
      <div class="center" role="alert">
        <?php
        echo "<h2 style='color:black; text-align:center; font-size: 30px; margin-bottom: 30px;'>" . $_SESSION['error'] . "</h2>";
        unset($_SESSION['error']);
        ?>
      </div>
    <?php } ?>
    <?php if (isset($_SESSION['warning'])) { ?>
      <div class="center" role="alert">
        <?php
        echo "<h2 style='color:black; text-align:center; font-size: 30px; margin-bottom: 30px;'>" . $_SESSION['warning'] . "</h2>";
        unset($_SESSION['warning']);
        ?>
      </div>
    <?php } ?>
  </div>
</body>

</html>