<?php


include "config.php";

// if the 'id' variable is set in the URL, we hnow that we need to edit a record
if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    //write delete query
    $sql  = "DELETE FROM `emp` WHERE `id`= '$emp_id'";

    //execute the query
    $result = $conn->query($sql);
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
    <div class="card text-center p-4 mt-4" style="max-width: 500px; margin-left: auto; margin-right: auto;">
        <?php if ($result == TRUE) { ?>
        <p>تم حذف السجل بنجاح </p>
        <p> التسلسل (<?= $emp_id  ?>)</p>
        <?php } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        } ?>

        <div><a href="index.php">الصفحة الرئيسية</a></div>
    </div>
</body>

</html>