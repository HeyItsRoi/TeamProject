<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDaycare";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create database
$sql = "CREATE DATABASE myDaycare";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}
$parent = "CREATE TABLE MyParent (
parent_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
phone_number VARCHAR(15) NOT NULL,
address VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL,
zip VARCHAR(10) NOT NULL,
child_fname VARCHAR(50) NOT NULL,
child_lname VARCHAR(50) NOT NULL
)";
$child = "CREATE TABLE MyChild (
child_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
child_fname VARCHAR(30) NOT NULL,
child_lname VARCHAR(30) NOT NULL,
phone_number VARCHAR(15) NOT NULL,
address VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL,
zip VARCHAR(10) NOT NULL,
parent_fname VARCHAR(50) NOT NULL,
parent_lname VARCHAR(50) NOT NULL,
info VARCHAR(200),
allergies VARCHAR(50),
child_dob DATE NOT NULL
)";
if ($conn->query($parent) === TRUE) {
    echo "Table MyParent created successfully";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}
if ($conn->query($child) === TRUE) {
    echo "Table MyChild created successfully";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}


//Insert into Table MyChild 
$id = mysqli_real_escape_string($conn, $_POST['id from html form']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastname = mysqli_real_escape_string($conn, $_POST['']);
$phone_number = mysqli_real_escape_string($conn, $_POST['']);
$address = mysqli_real_escape_string($conn, $_POST['']);
$city = mysqli_real_escape_string($conn, $_POST['']);
$zip = mysqli_real_escape_string($conn, $_POST['']);
$parent_fname = mysqli_real_escape_string($conn, $_POST['']);
$parent_lname = mysqli_real_escape_string($conn, $_POST['']);
$info = mysqli_real_escape_string($conn, $_POST['']);
$allergies = mysqli_real_escape_string($conn, $_POST['']);
$child_dob = mysqli_real_escape_string($conn, $_POST['']);


$sql = "INSERT INTO MyChild (child_id, child_fname, child_lname, phone_number, address, city, zip, parent_fname, parent_lname, info, allergies, child_dob) 
					VALUES ('$id', '$firstname', '$lastname', '$phone_number', '$address', '$city', '$zip','$parent_fname', '$parent_lname', '$info', '$allergies', '$child_dob')";


//Insert MyParent Table
$id = mysqli_real_escape_string($conn, $_POST['']);
$firstname = mysqli_real_escape_string($conn, $_POST['']);
$lastname = mysqli_real_escape_string($conn, $_POST['']);
$email = mysqli_real_escape_string($conn, $_POST['']);
$phone_number = mysqli_real_escape_string($conn, $_POST['']);
$address = mysqli_real_escape_string($conn, $_POST['']);
$city = mysqli_real_escape_string($conn, $_POST['']);
$zip = mysqli_real_escape_string($conn, $_POST['']);
$child_fname = mysqli_real_escape_string($conn, $_POST['']);
$child_lname = mysqli_real_escape_string($conn, $_POST['']);


$sql = "INSERT INTO MyParent (parent_id, firstname, lastname, email, phone_number, address, city, zip, child_fname, child_lname) 
					VALUES ('$id', '$firstname', '$lastname', '$email', '$phone_number', '$address', '$city', '$zip', '$child_fname', '$child_lname')";

	
//Delete MyChild
$sql = "DELETE FROM MyChild WHERE child_id = $id";

//Delete MyParent
$sql = "DELETE FROM MyParent WHERE parent_id = $id";

//Update MyChild
$sql = "UPDATE MyChild SET child_fname = '$firstname' WHERE child_id = '$id'";

//Update MyParent
$sql = "UPDATE MyParent SET firstname = '$firstname' WHERE parent_id = '$id'";


$conn->close();
?>
