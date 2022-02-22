<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="123456789";
$dbname="login_sample_db";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conn) {
  die("failed to connect!");
}
?>