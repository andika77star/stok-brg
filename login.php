<?php
require_once 'core/init.php';

if ( isset($_SESSION['user'])) {
    header('Locaton: frontend/data/index.php');
} else {
    $eror = '';
    if (isset($_POST['submit'])) {
        $nama = $_POST['username'];
        $pass = $_POST['pass'];

        if (!empty(trim($nama)) && !empty(trim($pass))) {
            if (login($nama, $pass)) {
                $_SESSION['user'] = $nama;
                header('Location: frontend/data/index.php');
            }else {
                $eror = "data masalah saat login";
            }
        }else {
            $eror = "Username dan Pasword wajib di isi";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <fieldset class="box">
    <h1 class="title">Login</h1>
        <form method="post">
            <label for="username">Username</label><br>
            <input class="in" type="text" id="username" name="username" autofocus><br><br>
            <label for="pass">Pssword</label><br>
            <input class="in" type="password" id="pass" name="pass"><br><br>
            <div class="eror"><?php $eror ?></div>
            <input class="btn" type="submit" name="submit" valua="Submit">
            <input class="res" type="reset" valua="Reset">
        </form>
    </fieldset>

    <style>
        body {
            font-family: sans-serif;
        }
        .box {
            border-radius: 15px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 25%;
            margin: auto;
            margin-top: 9%;
        }
        .title {
            text-align: center;
        }
        .in {
            width: 100%;
            height: 30px;
            display: inline-block;
            box-sizing: border-box;
        }
        .btn {
            color: white;
            background-color: green;
            border: none;
            font-size: 16px;
        }
        .res {
            color: white;
            background-color: orange;
            border: none;
            font-size: 16px;
            margin-left: 10px;
        }
        .eror {
            color : red;
            font-size: 14px;
        }
    </style>
</body>
</html>