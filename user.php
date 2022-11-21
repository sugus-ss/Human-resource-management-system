<?php
    session_start();
    if (!isset($_SESSION['user_login'])){
        $_SESSION['error'] = 'login user please!';
        header('location: signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
</head>
<body>
    <div class="container">
        <h3 class="mt=4">Welcome!</h3>
    </div>
    
</body>
</html>