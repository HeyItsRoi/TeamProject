<!DOCTYPE>
<html>
<head>
	
</head>

<body>

	<?php                

	$conn = mysql_connect("localhost", "username", "password");
	
	//Check connection 
	if (!$conn)
	{
		die("Cannot connect: " . mysql_error());	
	}
	
	//Create database
	if (mysql_query("Create database myDayCare", $conn))
		echo "Your database was created";
	else
		echo ("Error: ". mysql_error());
	
	//Create myChild table
	mysql_select_db("myDayCare", $conn);
	$child = "CREATE TABLE myChild(
	cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	cfirstname VARCHAR(30) NOT NULL,
	clastname VARCHAR(30) NOT NULL,
	parent_Fname VARCHAR(50) NOT NULL,
	parent_Lname VARCHAR(50) NOT NULL,
	date_of_birth DATE NOT NULL,
	allergies VARCHAR(50),
	phone_number VARCHAR(15) NOT NULL,
	address VARCHAR(50) NOT NULL,
	city VARCHAR(50) NOT NULL,
	zip VARCHAR(10) NOT NULL)";
	
	mysql_query($child, $conn);
	
	mysql_close($conn);
	
	?>	
</body>

</html>




