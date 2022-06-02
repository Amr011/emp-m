<?php

include "config.php";

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}


// if the form's update button is clicked, we need to procss the form
if (isset($_POST['update'])) {
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $special = $_POST['special'];

    if (!$name || !$birth || !$education || !$phone || !$special) {
        echo '<script> alert(" يجب تعبئة البيانات كاملة ")</script>';
    } else {
        // write the update query
        $sql = "UPDATE `emp` SET `name`='$name',`birth`='$birth',`education`='$education',`phone`='$phone',`special`='$special' WHERE `id`='$emp_id'";

        // execute the query
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "<script> alert('تم تعديل السجل بنجاح')</script>";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    // write SQL to get user data
    $sql = "SELECT * FROM `emp` WHERE `id`='$emp_id'";

    //Execute the sql
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $birth = $row['birth'];
            $education = $row['education'];
            $phone = $row['phone'];
            $special = $row['special'];
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
        <form action="" method="POST">
            <fieldset>
                <legend class="fw-bold">تعديل البيانات الشخصية:</legend>
                الاسم الثلاثي:<br>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <input type="hidden" name="emp_id" class="form-control" value="<?php echo $id; ?>">
                <br>
                تاريخ الميلاد:<br>
                <input type="date" name="birth" class="form-control" value="<?php $newDate = date("Y-m-d", strtotime($birth));
                                                                                    echo $newDate; ?>">
                <br>
                التحصيل الدراسي:<br>
                <!-- <input type="text" name="education" class="form-control" value=""> -->
                <select class="form-select" name="education">
                    <option selected><?php echo $education; ?></option>
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
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <br>
                التخصص:<br>
                <input type="text" name="special" class="form-control" value="">

                <br>


                <button type="submit" class="btn btn-primary w-100" name="update">حفظ</button>
                <br>
                <br>
                <div class="text-center"><a href="index.php">الصفحة الرئيسية</a></div>

            </fieldset>
        </form>
    </div>
</body>
<br>
<br>
<br>
<br>
<br>
<br>

</html>




<?php
    } else {
        // If the 'id' value is not valid, redirect the user back to view.php page
        header('Location: index.php');
    }
}
?>