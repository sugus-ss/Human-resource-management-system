<?php

session_start();
require_once 'config/db.php';
unset($_['user']);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>

    <style>
        input[type="text"] {
            display: block;
            border-radius: 20px;
            padding: 14px;
            margin: auto;
            margin-bottom: 24px;
            width: 75%;
            border: 2px solid black;
            background-color: #E4F9EA;
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
            width: 28%;
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
    </style>

</head>

<body>
    <header style="background-color:#75EC96; height: 71px; padding: 15px;">
    </header>

    <div style="background-image: url('bgLogin.png'); background-size: 100% 100%;" class="d-flex vh-100">
        <div style="background-color: white; width: 690px; height: 390px; border-radius: 30px; padding:30px 20px 30px 20px; border: 1px solid black;;" class="mx-auto align-self-center">
            <h1 style="color:black; text-align:center; font-size: 30px; margin-bottom: 30px;">Login</h1>
            <form action="loginDB.php" method="POST">

                <input type="text" name="email" placeholder = "Email" required>
                <input type="password" name="employeeID" placeholder = "Password" required>
                <button type="submit" name="login">Login</button>
            </form>
            <?php
            if (!empty($_SESSION)) {
                echo "<h1 style='color:black; text-align:center; font-size: 30px; margin-bottom: 30px;'>" . $_SESSION['error'] . "</h1>";
                unset($_SESSION['error']);
            }

            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <footer style="background-color:#75EC96; height: 71px; padding: 15px;">
    </footer>
</body>

</html>