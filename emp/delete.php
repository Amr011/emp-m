<?php


include "../config.php";

// if the 'id' variable is set in the URL, we hnow that we need to edit a record
if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    //write delete query
    $sql  = "DELETE FROM `emp` WHERE `id`= '$emp_id'";

    //execute the query
    $result = $conn->query($sql);
}
?>

<html>

<head>
    <title>View Page</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('../partials/utils.php') ?>

</head>

<body class="container">
    <?php if ($result == TRUE) { ?>
    <p>Record deleted successfully </p>
    <p> ID (<?= $emp_id  ?>)</p>
    <?php } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    } ?>

    <div><a href="index.php">HOME</a></div>
</body>

</html>