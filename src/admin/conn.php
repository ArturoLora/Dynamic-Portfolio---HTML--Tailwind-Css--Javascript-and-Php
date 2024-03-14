<?php 

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "portfolio";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    if (!$conn) {
        die ("Cannot connect to the database, Kindly contact your admin for help");
    } 