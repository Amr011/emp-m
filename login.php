<?php


include "config.php";
session_start();

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}


if (isset($_POST['submit'])) {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $sql = "SELECT *FROM user where email = '$email' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $userId = $row[0];
        $dbUserName = $row[1];
        $dbPassword = $row[2];
    }
    if ($userId == null || $dbUserName == null || $dbPassword == null) {
        header('Location: index.php');
    } else {

        if ($email == $dbUserName && $password == $dbPassword) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $userId;
            header('Location: index.php');
        } else {
            echo "<script> alert('ادخال خاطئ'); </script>";
        }
    }
}

?>

<html dir="rtl">

<head>
    <title>قسم التشغيل</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('partials/utils.php') ?>

</head>

<body class="container">
    <?php require('partials/header.php') ?>
    <?php require('partials/hero.php') ?>

    <div class="card p-4 mt-4" style="max-width: 500px; margin-left: auto; margin-right: auto;">
        <h1 class="fw-bold">تسجيل الدخول</h1>
        <br>
        <form method="post" autocomplete="off">
            اسم المستخدم:<br>
            <input type="text" class="form-control" name="email">
            <br>
            كلمة المرور:<br>
            <input type="password" class="form-control" name="password">
            <br>
            <br>
            <button type="submit" class="btn btn-primary w-100" name="submit"> تسجيل
                الدخول</button>
        </form>
        <br>

        <div class="text-center"><a href="signup.php">انشاء حساب مستخدم</a></div>
    </div>
    <?php require('partials/footer.php') ?>

</body>

</html>