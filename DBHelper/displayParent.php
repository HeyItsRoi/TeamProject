<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysql_error());
	} 
	mysql_select_db(myDaycare, $conn);
	$sql = "SELECT * FROM MyParent";
	$myData = mysql_query($sql, $conn);

	//Try to display it in TextBoxes, this is just a test
	while($record = my sql_fetch_array($myData)){
	echo $record['firstname']."".$record['lastname']."".$record['email']."".$record['phone_number']."".$record['address']."".$record['child_Fname']."".$record['child_Lname'];
	echo "<br />"
	}

	
	mysql_close($conn);

?>