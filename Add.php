<html>
<?php

session_start();
require_once 'config/db.php';

$position = $conn -> prepare("SELECT * FROM POSITION");
$position -> execute();
?>

<head>
  <title>Add Employee</title>
  <style>
    .add {
      color: white;
      font-size: 25px;

      width: 120px;
      border-radius: 50px;
      text-align: center;
      border: 0px solid #C9C7C7;
      background-color: #C9C7C7;
      float: left;
      margin-left: 370px;
      margin-right: 10px;
      margin-top: 50px;
      height: 50px;
      border: 0px;
    }
  </style>
</head>
<link href="Navbar.css" type="text/css" rel="stylesheet" />
<link href="EditPerson.css" type="text/css" rel="stylesheet" />
<link href="Add.css" type="text/css" rel="stylesheet" />
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
  <div style="border-style: solid ; height: 100%; margin-top: 71px; padding: 30px;">
    <h1 style="margin-bottom: 55px;">Add Employee</Em></h1>
    <div>
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
      <form style="float: center; width: 50%; margin-left: 150px;" action="addEmployeeDB.php" method="post" enctype="multipart/form-data" id = "add">
        <p>
          <label for="id">Employee ID:</label>
          <input type="text" name="employeeID" required>
        </p>
        <p>
          <label for="fname">First Name:</label>
          <input type="text" name="firstName" required>
        </p>
        <p>
          <label for="lname">Last Name:</label>
          <input type="text" name="lastName" required>
        </p>
        <p>
          <label for="dob">Date of Birth:</label>
          <input type="date" name="bDate" required>
        </p>
        <p>
          <label for="gender">Gender:</label>
          <input type="text" name="sex" required>
        </p>
        <p>
          <label for="phone">Phone Number:</label>
          <input type="text" name="tel" required>
        </p>
        <p>
          <label for="email">E-mail:</label>
          <input type="email" name="Email" required>
        </p>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <p>
          <label for="position">Position:</label>
          <select name="position" required>
          <?php
            foreach($position as $row)
            {
              echo "<option value = ".$row["position"].">".$row["position"]."</option>";
            }
          ?>
          </select>
        </p>
        <p>
          <label for="cond">Congenital Disease:</label>
          <input type="text" name="conDisease">
        </p>

        <p><br></p>

        <p>
          <label for="degree">Degree:</label>
          <input type="text" name="degree">
        </p>
        <p>
          <label for="fac">Faculty:</label>
          <input type="text" name="faculty">
        </p>
        <p>
          <label for="school">School Name:</label>
          <input type="text" name="schoolName" required>
        </p>

        <p><br></p>

        <p>
          <label for="sdate">Starting Date:</label>
          <input type="date" name="startDate" required>
        </p>
        <p>
          <label for="edate">Ending Date:</label>
          <input type="date" name="endDate" required>
        </p>

        <label for="uploadPic">Employee Picture:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">

        <button class="add" type="submit" name="add_employee">+ Add</button>
      </form>

      <!--<input onclick="openForm()" style="float: left;margin-right: 10px ; margin-left: 370px; margin-top: 50px; height: 50px; border: 0px; background-color: none;" type="image" name="add" src="Addicon.png" alt="add">
                  <div class="form-popup" id="myForm">      
                    <form action="/action_page.php" class="form-container">
                      <h3 style="text-align: center;">Do you want to add this list?</h3><br>

                      <button type="submit" class="btn"><i style="margin-right: 8px;" class="fa fa-check"></i>Yes</button>

                      <button type="button" class="btn cancel" onclick="closeForm()"><i style="margin-right: 8px;" class="fa fa-close"></i>No</button>
                    </form>
                  </div>-->

      <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
      </script>



    </div>
  </div>
</body>

</html>