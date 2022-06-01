<?php
include "config.php";


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $special = $_POST['special'];


    //write sql query
    $sql = "INSERT INTO `emp`(`name`, `birth`, `education`, `phone`, `special`) VALUES ('$name','$birth','$education','$phone','$special')";
    //execute the query
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "<script> alert('تمت اضافة سجل جديد بنجاح')</script>";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>قسم التشغيل</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('partials/utils.php') ?>

</head>

<body class="container">
    <?php require('partials/header.php') ?>
    <?php require('partials/hero.php') ?>
    <div class="card   p-4 mt-4" style="max-width: 500px; margin-left: auto; margin-right: auto;">
        <form action="" method="POST">
            <fieldset>
                <legend class="fw-bold">البيانات الشخصية</legend>
                الاسم الثلاثي:<br>
                <input type="text" class="form-control" name="name">
                <br>
                تاريخ الميلاد:<br>
                <input type="date" class="form-control" name="birth">
                <br>
                التحصيل الدراسي:<br>
                <!-- <input type="text" class="form-control" name="education"> -->
                <select class="form-select" name="education">
                    <option value="  دون الابتدائي">دون الابتدائي</option>
                    <option value=" ابتدائي">ابتدائي</option>
                    <option value=" متوسط "> متوسط</option>
                    <option value=" اعدادي "> اعدادي</option>
                    <option value=" دبلوم "> دبلوم</option>
                    <option value=" بكلوريوس "> بكلوريوس</option>
                    <option value=" ماجستير "> ماجستير</option>

                </select>
                <br>
                رقم الهاتف:<br>
                <input type="text" class="form-control" name="phone">
                <br>
                الاختصاص:<br>
                <input type="text" class="form-control" name="special">


                <br>

                <button type="submit" class="btn btn-primary  w-100" name="submit">حفظ</button>
                </br>
                </br>
                <div class="text-center "><a href="index.php">الصفحة الرئيسية</a></div>
            </fieldset>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>