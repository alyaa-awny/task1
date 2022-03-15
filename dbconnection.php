<?php
$server = "localhost";
$dbname = "group12";
$dbuser = "root";
$dbpassword = "";

$con = mysqli_connect($server,$dbuser,$dbpassword,$dbname);
if (!$con) {  
    die('error'.mysqli_connect_error());
}