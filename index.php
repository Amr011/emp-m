<?php
session_start();

include "config.php";

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}

$query = "SELECT * from emp ";

$term = " ";


if (isset($_GET['term'])) {
    $term = $_GET['term'];
}

$result = mysqli_query($conn, $query);

$results_per_page = 25;

$number_of_result = mysqli_num_rows($result);

$number_of_page = ceil($number_of_result / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$page_first_result = ($page - 1) * $results_per_page;
//retrieve the selected results from database   
$query = "SELECT * FROM emp WHERE (`name` LIKE '%" . $term . "%')  LIMIT " . $page_first_result . ',' . $results_per_page;

$result = mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>قسم التشغيل</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('partials/utils.php') ?>

</head>

<body>
    <div class="container">
        <?php require('partials/header.php') ?>
        <?php require('partials/hero.php') ?>



        <div class=" d-flex justify-content-between">
            <form action="" method="GET" class="w-25">
                <div class="d-flex  text-center">
                    <button class=" text-center  btn btn-secondary   d-flex align-items-center"
                        style="margin-left: 5px;"> <i class="fa fa-search" style="padding-left: 5px;"></i>بحث</button>
                    <input type="text" name="term" class="form-control  border border-secondary"
                        placeholder="بحث عن ....">
                </div>
            </form>
            <div>
                <a href="index.php" class="btn btn-light border" style="margin-left: 4px;"><i style="margin-left: 4px;"
                        class="text-dark fa fa-refresh"></i>تحديث الجدول</a>
                <a href="logout.php" class="btn btn-light border" style="margin-right: 4px;"> <i
                        style="margin-left: 4px;" class="text-dark  fa fa-sign-out"></i>تسجيل
                    الخروج</a>
            </div>
            <!-- style="position: absolute; left: 50%; transform: translateX(-50%);" -->
            <a href="create.php" class="btn btn-primary w-25"> <i class="fa fa-plus"
                    style="padding-left: 5px;"></i>انشاء سجل جديد</a>
        </div>
        <br>
        <?php
        if ($result->num_rows > 0) { ?>
        <table class="table ">
            <thead>
                <tr>
                    <th>التسلسل</th>
                    <th>الاسم الثلاثي</th>
                    <th>تاريخ الميلاد</th>
                    <th>التحصيل الدراسي</th>
                    <th>رقم الهاتف</th>
                    <th>التخصص</th>
                    <th>اجراء</th>

                </tr>
            </thead>
            <tbody>
                <?php

                    while ($row = $result->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['birth']; ?></td>
                    <td><?php echo $row['education']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['special']; ?></td>
                    <td><a class="btn btn-success" href="update.php?id=<?php echo $row['id']; ?>"> <i
                                class="fa fa-pencil" style="padding-left: 5px;"></i>تعديل</a>&nbsp;<a
                            class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>"> <i
                                class="fa fa-trash" style="padding-left: 5px;"></i>حذف</a></td>





                </tr>

                <?php     }
                } else {    ?>

                <h2 class="fw-bold text-center">لا يوجد سجلات حتى الان</h2>

                <?php } ?>

            </tbody>
        </table>
        <h3 class="text-center fw-bold">
            عدد السجلات
            (<?php echo $number_of_result; ?>)
        </h3>
        <div class=" text-center">
            <?php
                //display the link of the pages in URL  
                for ($page = 1; $page <= $number_of_page; $page++) {
                    echo '<a style="margin-left:4px;" class="btn btn-light border  border-dark fw-bold"  href="index.php?page=' . $page . '">' . $page . ' </a>';
                } ?>
        </div>
    </div>

</body>

</html>