<?php
require_once("config.php");

$business_name = $_POST['business_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];

$sql = "INSERT INTO BBE_clients(business_name, first_name, last_name, email, phone_number) VALUES ('" . $business_name . "','" . $first_name . "','" . $last_name . "','" . $email . "','" . $phone_number . "');";
// echo $sql;

mysqli_query($con, $sql) or die(mysqli_error($con));

//Close MySQL connection
mysqli_close($con);
echo 'Success';
?>