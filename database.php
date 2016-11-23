<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDaycare";

// Create connection
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
    echo "Error creating database: " . $conn->error;
}

$sql = "CREATE TABLE MyParent (
parent_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR2(30) NOT NULL,
lastname VARCHAR2(30) NOT NULL,
email VARCHAR2(50) NOT NULL,
phone_number NUMBER NOT NULL,
address VARCHAR2(50) NOT NULL,
city VARCHAR2(50) NOT NULL,
zip VARCHAR2(10) NOT NULL,
child_Fname VARCHAR2(50) NOT NULL,
child_Lname VARCHAR2(50) NOT NULL,
)";

$sql = "CREATE TABLE MyChild (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
cfirstname VARCHAR2(30) NOT NULL,
clastname VARCHAR2(30) NOT NULL,
allergies VARCHAR2(50),
phone_number NUMBER NOT NULL,
address VARCHAR2(50) NOT NULL,
parent_Fname VARCHAR2(50) NOT NULL,
parent_Lname VARCHAR2(50) NOT NULL,
child_dob DATE NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyParent created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
if ($conn->query($sql) === TRUE) {
    echo "Table MyMyChild created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


//Insert Mychild Table
$id = mysqli_real_escape_string($link, $_POST['id']);
$cfirstname = mysqli_real_escape_string($link, $_POST['firstName']);
$clastname = mysqli_real_escape_string($link, $_POST['']);
$allergies = mysqli_real_escape_string($link, $_POST['']);
$phone_number = mysqli_real_escape_string($link, $_POST['']);
$address = mysqli_real_escape_string($link, $_POST['']);
$parent_Fname = mysqli_real_escape_string($link, $_POST['']);
$parent_Lname = mysqli_real_escape_string($link, $_POST['']);
$child_dob = mysqli_real_escape_string($link, $_POST['']);
$info = mysqli_real_escape_string($link, $_POST['']);

$sql = "INSERT INTO MyChild (id, cfirstname, clastname, allergies, phone_number, address, parent_Fname, parent_Lname, child_dob, info) 
					VALUES ('$id', '$cfirstname', '$clastname', '$allergies', '$phone_number', '$address', '$parent_Fname', '$parent_Lname', '$child_dob', '$info')";


//Insert MyParent Table
$parent_id = mysqli_real_escape_string($link, $_POST['']);
$firstname = mysqli_real_escape_string($link, $_POST['']);
$lastname = mysqli_real_escape_string($link, $_POST['']);
$email = mysqli_real_escape_string($link, $_POST['']);
$phone_number = mysqli_real_escape_string($link, $_POST['']);
$address = mysqli_real_escape_string($link, $_POST['']);
$city = mysqli_real_escape_string($link, $_POST['']);
$zip = mysqli_real_escape_string($link, $_POST['']);
$child_Fname = mysqli_real_escape_string($link, $_POST['']);
$child_Lname = mysqli_real_escape_string($link, $_POST['']);


$sql = "INSERT INTO MyParent (parent_id, firstname, lastname, email, phone_number, address, city, zip, child_Fname, child_Lname) 
					VALUES ('$parent_id', '$cfirstname', '$clastname', '$email', '$phone_number', '$address', '$city', '$zip', '$child_Fname', '$child_Lname')";

	
//Delete MyChild
$sql = "DELETE FROM MyChild WHERE id = $id";

//Delete MyParent
$sql = "DELETE FROM MyParent WHERE parent_id = $parent_id";

//Update MyChild
$sql = "UPDATE MyChild SET cfirstname = '$cfirstname' WHERE id = '$id'";

//Update MyParent
$sql = "UPDATE MyParent SET firstname = '$firstname' WHERE parent_id = '$parent_id'";





$conn->close();
?>
