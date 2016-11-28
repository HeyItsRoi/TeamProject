<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home page</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- Style sheet for the nav-bar-->
	<link href = "startbootstrap-small-business-gh-pages\css\small-business.css" rel = "stylesheet" type = "text/css" />

	<!-- Latest compiled and minified JavaScript 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

	<!-- Custom CSS for this page -->
	<link href ="HomePageStyle.css" rel ="stylesheet" type ="text/css" />
	
</head>
<body class="container">
	<!-- <nav class="navbar-fixed-top">
		<div id="navigation">
			<a href="Home Page.html">Home</a>
			<a href="">Add new child</a>
			<a href="">Staff Directory</a>
			<a href="">Calendar</a>
			<a href="">Sign out</a>
			<div id="search"> <!-- CHANGE THE SEARCH BUTTON-->
				<!-- <input type="text" name="searchBox" id="searchBox" placeholder="Search">
				<button type="submit" class="btn btn-info">Search</button>
			</div>
		</div>
		
	</nav> -->


	<?php

	$id = 1;
	
		// Create connection
		$conn = new mysqli("localhost", "Roi", "password", "mydaycare");
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}  

	
		$sql = "SELECT * FROM mychild";
		$result = $conn->query($sql);
		echo "<table class=\"table table-bordered\">
		<tr>
			<th><b>First name</b></th>
			<th><b>Last name</b></th>
			<th><b>Edit / Remove</b></th> <!-- ADD AN ALERT BOX (ex: Do) WHEN YOU WANT TO REMOVE A CHILD -->
		</tr>";
	

		    while($row = $result->fetch_assoc()){
		    	echo "<tr>";
		    	echo "<td>" . $row["child_fname"] . "</td>";
		    	echo "<td>" . $row["child_lname"] . "</td>";
		    	echo "<td><a href=\"Edit\">Edit</a> / <a href=\"Edit\">Remove</a></td>";
		    	echo "</tr>";
		    }
		echo "</table>";

		$conn->close();


	?>
</body>
</html>