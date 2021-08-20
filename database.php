<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hng";

// Creating connection
$connect = mysqli_connect($servername,$username,$password,$database);

// Checking connection
if (!$connect) {
    echo ("Connection failed:" . mysqli_connect_error());
}


?>