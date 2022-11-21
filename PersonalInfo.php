<?php

session_start();
require_once 'config/db.php';

$user = $_SESSION['user'];

$info = $conn->prepare("SELECT * FROM EMPLOYEE WHERE employeeID = :employeeID");
$info->bindParam(":employeeID", $user['employeeID']);
$info->execute();
$info = $info->fetch(PDO::FETCH_ASSOC);

$contact = $conn->prepare("SELECT * FROM CONTRACT WHERE employeeID = :employeeID");
$contact->bindParam(":employeeID", $user["employeeID"]);
$contact->execute();
$contact = $contact->fetch(PDO::FETCH_ASSOC);

$edu = $conn->prepare("SELECT * FROM EDUCATION_HIS WHERE employeeID = :employeeID");
$edu->bindParam(":employeeID", $user["employeeID"]);
$edu->execute();
?>
<html>

<head>
  <title>Personal Infomation</title>
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
  <div style="border-style: solid ; height :100%; margin-top: 71px; padding: 30px;">
    <h1 style="margin-bottom: 80px;">Personal Information</h1>
    <div style="position:relative; background-color:gray; height: 196; width: 158; margin-left: 100px; margin-right: 0px; overflow: hidden; float: left;">
      <!--Picture-->
      <?php echo "<img style='position: absolute; margin: auto; top: -9999px; left: -9999px; right: -9999px; bottom: -9999px;' src= " . $info["employeePic"] . ">" ?>
    </div>
    <div style="float: right; width: 75%;">
      <div style="float: left; width: 35%;">
        <p>
          <?php echo "Employee ID : " . $info["employeeID"] ?>
        </p>
        <p>
          <?php echo "First Name : " . $info["fName"] ?>
        </p>
        <p>
          <?php echo "Date of Birth : " . date('d/M/Y', strtotime($info["bDate"])) ?>
        </p>
        <p>
          <?php echo "Phone Number : " . $info["tel"] ?>
        </p>
        <?php echo "Address : " . $info["address"] ?>
        <p>
          <?php echo "Position : " . $info["position"] ?>
        </p>
        <p>
          <?php echo "Congenital Disease : " . $info["conDisease"] ?>
        </p>
        <p>
          <?php echo "Starting Date : " . date('d/M/Y', strtotime($contract["startDate"])) ?>
        </p>
      </div>
      <div>
        <p><br></p>
        <p>
          <?php echo "Last Name : " . $info["lName"] ?>
        </p>
        <p>
          <?php echo "Gender : " . $info["sex"] ?>
        </p>
        <p>
          <?php echo "Email : " . $info["email"] ?>
        </p>
        <p><br></p>
        <p><br></p>
        <p><br></p>
        <p>
          <?php echo "Ending Date : " . date('d/M/Y', strtotime($contract["endDate"])) ?>
        </p>

      </div>
      <br>
      <div>
        <table class="type1" id="t01">
          <tr>
            <th>Degree</th>
            <th>Faculty</th>
            <th>School Name</th>
          </tr>
          <?php
          foreach($edu as $row) {
            echo "<tr>";
            echo "<td>" . $row["degree"] . "</td>";
            echo "<td>" . $row["faculty"] . "</td>";
            echo "<td>" . $row["schoolName"] . "</td>";
            echo "</tr>";
          }

          ?>
        </table>
      </div>
      <div style="margin-top: 20px;float: right; margin-right: 50px;"><a href="EditPerson.php"><img src="Editicon.png"></a></div>
    </div>
  </div>
</body>

</html>