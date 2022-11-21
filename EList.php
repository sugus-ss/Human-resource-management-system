<?php

session_start();
require_once 'config/db.php';

$user = $_SESSION['user'];
$info = $conn->prepare("SELECT * FROM EMPLOYEE WHERE employeeID = :employeeID");
$info->bindParam(":employeeID", $user['employeeID']);
$info->execute();
$info = $info->fetch(PDO::FETCH_ASSOC);

if (empty($_SESSION['search'])) {
  $eList = $conn->prepare("SELECT * FROM EMPLOYEE");
  $eList->execute();
} else {
  $sList = $_SESSION['search'];
  $eList = $conn->prepare("SELECT * FROM EMPLOYEE WHERE employeeID LIKE :searchID");
  $eList->bindValue(":searchID", "%" . $_SESSION['search'] . "%");
  $eList->execute();
  unset($_SESSION['search']);
}
$_SESSION['remove_employee'] = $array;

?>
<html>

<head>
  <title>Employee List</title>
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
    .form-popup {
      background-color: none;
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50%;
      bottom: 0;
      right: 15px;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      background-color: #E4F9EA;
      max-width: 300px;
      padding: 70px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 590px;
      height: 150px;
      border: 1px solid #22CC51;
      margin-top: 10px;
      margin-right: 20px;
      justify-content: center;
      align-items: center;
    }




    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #22CC51;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 40%;
      margin-bottom: 10px;
      opacity: 0.8;
      float: left;
      border-radius: 12px;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: #FF616D;
      width: 40%;
      float: right;
      border-radius: 12px;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
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
</head>
<link href="Navbar.css" type="text/css" rel="stylesheet" />
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
  <div style="border-style: solid ; height: max-content; margin-top: 71px; padding: 30px;">
    <h1>Employee List</h1>

    <?php if (isset($_SESSION['success'])) { ?>
      <div class="center" role="alert">
        <?php
        echo "<h2 style='color:black; text-align:center; font-size: 30px; margin-bottom: 30px;'>" . $_SESSION['success'] . "</h2>";
        unset($_SESSION['success']);
        ?>
      </div>
    <?php } ?>

    <table class="type1" id="t01">
      <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Positon</th>
        <th>E-mail</th>
      </tr>
      <?php
      $loop = 0;
      foreach ($eList as $row) {
        echo "<tr>
                    <td>" . $row["employeeID"] . "</td>
                    <td>" . $row["fName"] . "</td>
                    <td>" . $row["lName"] . "</td>
                    <td>" . $row["position"] . "</td>
                    <td>" . $row["email"] . "</td>
                  </tr>";
        $_SESSION['remove_employee'][$loop] = $row;
        $loop++;
      }
      ?>

    </table>

    <form action="searchEm.php" method="POST" style="margin-bottom : 50px">
      <input class="searchbox" type="text" id="searchbox" name="searchbox" placeholder="Enter ID">
      <input type="submit" name="search" class="search" value="Search">
    </form>


    <?php
    if ($user["position"] == "HR") {
      echo "<input onclick='openForm()' style='float: right;margin-right: 70px ; margin-left: 20px; margin-top: 4px;' type='image' name='delete' src='Deleteicon.png' alt='delete'>";
    }
    ?>
    <div class='form-popup' id='myForm'>
      <form action="removeEmployee.php" class='form-container'>
        <h3 style='text-align: center;'>Do you want to delete this list?</h3><br>
        <button type="submit" class="btn"><i style="margin-right: 8px;" class="fa fa-check"></i>Yes</button>
        <button type="button" class="btn cancel" onclick="closeForm()"><i style="margin-right: 8px;" class="fa fa-close"></i>No</button>
      </form>
    </div>

    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>

    <?php
    if ($user["position"] == "HR") {
      echo "<a href='Add.php' style='float: right; margin-left: 20px; margin-top: 4px;'><img src='Addicon.png'></a><br><br><br>
    <div class='center'>";
    } ?>
    <!--<button type="submit" class="container"><i class="fa fa-arrow-left"></i> Previous</button>
      <button type="submit" class="container">Next <i class='fa fa-arrow-right'></i></button>-->
  </div>
  </div>
</body>

</html>