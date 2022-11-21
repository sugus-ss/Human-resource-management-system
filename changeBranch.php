<?php

session_start();
require_once 'config/db.php';

?>
<html>

<head>
    <title>Promote</title>
</head>

<body>
    <?php
    
    $getPos = $conn->prepare("SELECT position FROM POSITION WHERE position NOT LIKE '%Manager%'");
    $getPos->execute();
    $getPos = $getPos->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="changeBrachDB.php" method="post" id = "changeBrach">
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
        <div class="input-group">
            <label for="employeeID">Employee ID :</label>
            <input type="text" name="employeeID">
        </div>
        <div class="input-group">
            <button type="submit" name="branch" class="btn">Submit</button>
        </div>
    </form>
    <label for="newPos">Position :</label>
    <select name = "newPos" form = "changeBrach">
        <?php
            foreach ($getPos as $row) {
                echo "<option value = ".$row.">".$row."<option>";
            }
        ?>
    </select>

</body>

</html>