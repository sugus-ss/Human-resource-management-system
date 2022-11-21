<?php 

    session_start();
    require_once 'config/db.php';

?>
<html>
    <head>
        <title>Calculate salary</title>
    </head>

    <body>
        
        <form action="calculateSalary.php" method="post">
        <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <div class="input-group">
                <label for="employeeID">Employee ID</label>
                <input type="text" name="employeeID">
            </div>
            <div class="input-group">
                <button type="submit" name="search_employee" class="btn">Submit</button>
            </div>
        </form>
    </body>
</html>