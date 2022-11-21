<?php

session_start();
require_once 'config/db.php';

?>
<html>

<body>
    <?php
    $pic = $_SESSION['user']['employeePic'];
    echo $pic;
    echo "<img src = ".$pic.">";
    ?>
    
</body>

</html>