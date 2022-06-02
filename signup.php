<?php

require 'config.php';
session_start();

if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
$orginal_token = "@@33sdn&(&*2311";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $token = $_POST["token"];
    if ($token == $orginal_token) {
        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo
            "<script> alert('اسم المستخدم محجوز بالفعل'); </script>";
        } else {
            if ($password) {
                $query = "INSERT INTO user (`email`, `password`) VALUES('$email','$password')";
                mysqli_query($conn, $query);
                echo
                "<script> alert('تمت عملية انشاء حساب مستخدم جديد بنجاح'); </script>";
            } else {
                echo "<script> alert('ادخال خاطئ'); </script>";
            }
        }
    } else {
        echo "<script> alert('الرمز غير صحيح'); </script>";
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
        <h1 class="fw-bold">انشاء حساب مستخدم</h1>
        <br>
        <form method="post" autocomplete="off">
            اسم المستخدم:<br>
            <input type="text" class="form-control" name="email">
            <br>
            كلمة المرور:<br>
            <input type="password" class="form-control" name="password">
            <br>
            الرمز الفريد:<br>
            <input type="password" class="form-control" name="token">
            <br>
            <br>
            <button type="submit" class="btn btn-primary w-100" name="submit"> تسجيل
                الدخول</button>
        </form>
        <br>

        <div class="text-center"><a href="login.php">تسجيل الدخول</a></div>
    </div>
</body>

</html>