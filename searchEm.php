<?php

session_start();
require_once 'config/db.php';
if(isset($_POST['search']))
{
    $_SESSION['search'] = $_POST['searchbox'];
}
header("location : EList.php");

?>