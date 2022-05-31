<?php
include "../config.php";

//write the query to get data from users table

$sql = "SELECT * FROM emp";

//execute the query

$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <!-- to make it looking good in using bootstrap -->
    <?php require('../partials/utils.php') ?>

</head>

<body class="container">
    <div class="container">
        <h1>Employee</h1>
        <a href="create.php" class="btn btn-primary">create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Education</th>
                    <th>phone</th>
                    <th>Special</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['birth']; ?></td>
                    <td><?php echo $row['education']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['special']; ?></td>
                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a
                            class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>





                </tr>

                <?php

                    }
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>