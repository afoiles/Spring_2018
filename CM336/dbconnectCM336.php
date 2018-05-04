<?php
$host="localhost";
$username="root";
$password="";
$database="projectthree";
$link = mysqli_connect ($host, $username, $password, $database );
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>