<?php
include "../config.php";

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
        echo "new record created successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('../partials/utils.php') ?>

</head>

<body class="container">
    <form action="" method="POST">
        <fieldset>
            <legend>Personal information</legend>
            name:<br>
            <input type="text" name="name">
            <br>
            birth:<br>
            <input type="date" name="birth">
            <br>
            education:<br>
            <input type="text" name="education">
            <br>
            phone:<br>
            <input type="text" name="phone">
            <br>
            special:<br>
            <input type="text" name="special">
            <br>
            <br><br>

            <button type="submit" name="submit">submit</button>
            <div><a href="index.php">HOME</a></div>
        </fieldset>
    </form>

</body>

</html>