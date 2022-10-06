<?php
$server="localhost";
$admin="root";
$password="";
$database="swadist_mini_project";

$conn=mysqli_connect($server,$admin,$password,$database) OR die("Connection failed".mysqli_connect_error());
?>