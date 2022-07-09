<?php
$business_name = $_POST['business_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];

//Connect to database
$servername = "<your server ip>";
$username = "<your server username>";
$password = "<your server password>";
$dbname = "your database name";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO BBE_clients(business_name, first_name, last_name, email, phone_number) VALUES ('" . $business_name . "','" . $first_name . "','" . $last_name . "','" . $email . "','" . $phone_number . "');";
// echo $sql;

mysqli_query($con, $sql) or die(mysqli_error($con));

//Close MySQL connection
mysqli_close($con);
echo 'Success';
