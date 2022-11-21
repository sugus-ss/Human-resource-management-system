<?php

session_start();
require_once 'config/db.php';

?>
<html>

<head>
    <title>Add employee</title>
</head>

<body>

    <form action="addEmployeeDB.php" method="post" enctype="multipart/form-data">
        
        <div class="input-group">
            <label for="employeeID">Employee ID</label>
            <input type="text" name="employeeID">
        </div>
        <div class="input-group">
            <label for="firstName">First Name</label>
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
            <label for="uploadPic">Employee Picture</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="input-group">
            <button type="submit" name="add_employee" class="btn">Submit</button>
        </div>
    </form>
</body>

</html>