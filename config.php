<?php
$servername = "f80b6byii2vwv8cx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$username = "hfq7drwuaivebwpq";
$password = "iy4a6omz2v3nk82k";
$dbname = "oxna9dztwb3o0k8c";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}