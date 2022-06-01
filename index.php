<?php
include "config.php";


$sql = "SELECT * FROM emp ORDER BY id DESC";


$result = $conn->query($sql);

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $result = $conn->query("SELECT * FROM emp
			WHERE (`name` LIKE '%" . $query . "%')");
} else {
    $result = $conn->query($sql);
}



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
                    <input type="text" name="query" class="form-control  border border-secondary"
                        placeholder="بحث عن ....">
                </div>
            </form>
            <a href="index.php" class="btn btn-light border"><i class="text-dark fa fa-refresh"></i></a>
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
    </div>

</body>

</html>