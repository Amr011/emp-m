<?php

include "config.php";

// if the form's update button is clicked, we need to procss the form
if (isset($_POST['update'])) {
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $special = $_POST['special'];

    // write the update query
    $sql = "UPDATE `emp` SET `name`='$name',`birth`='$birth',`education`='$education',`phone`='$phone',`special`='$special' WHERE `id`='$emp_id'";

    // execute the query
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
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

<html>

<head>
    <title>View Page</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('partials/utils.php') ?>

</head>

<body class="container">


    <form action="" method="post">
        <fieldset>
            <legend>Personal information Update:</legend>
            Name:<br>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="emp_id" value="<?php echo $id; ?>">
            <br>
            Birth Date:<br>
            <input type="date" name="birth" value="<?php $newDate = date("Y-m-d", strtotime($birth));
                                                            echo $newDate; ?>">
            <br>
            Education:<br>
            <input type="text" name="education" value="<?php echo $education; ?>">
            <br>
            Phone:<br>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
            <br>
            Special:<br>
            <input type="text" name="special" value="<?php echo $special; ?>">
            <br>

            <br><br>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <div><a href="emp-index.php">HOME</a></div>

        </fieldset>
    </form>
</body>

</html>




<?php
    } else {
        // If the 'id' value is not valid, redirect the user back to view.php page
        header('Location: emp-index.php');
    }
}
?>