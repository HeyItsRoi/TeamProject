<?php

if (isset($_POST['submit'])){
	$servername = "localhost";
	$username = "username";
	$password = "password";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysql_error());
	} 

	if(mysql_query("CREATE DATABASE myDaycare", $conn)){
		echo "Your Databse was created successfully";
	} else echo "Error: " . mysql_error();

	
	mysql_close($conn);
}

$parentsTable = "CREATE TABLE MyParents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR2(30) NOT NULL,
lastname VARCHAR2(30) NOT NULL,
email VARCHAR2(50) NOT NULL,
phone_number NUMBER NOT NULL,
address VARCHAR2(50) NOT NULL,
child_Fname VARCHAR2(50) NOT NULL,
child_Lname VARCHAR2(50) NOT NULL,
)";

$childTable = "CREATE TABLE MyChild (
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

?>