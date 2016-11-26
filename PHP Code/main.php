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
	<nav class="navbar-fixed-top">
		<div id="navigation">
			<a href="Home Page.html">Home</a>
			<a href="">Add new child</a>
			<a href="">Staff Directory</a>
			<a href="">Calendar</a>
			<a href="">Sign out</a>
			<div id="search"> <!-- CHANGE THE SEARCH BUTTON-->
				<input type="text" name="searchBox" id="searchBox" placeholder="Search">
				<button type="submit" class="btn btn-info">Search</button>
			</div>
		</div>
		
	</nav>

	<?php  
	
	$conn = mysql_connect("localhost", "username", "password");
	
	//check connection 
	if (!$conn)
	{
		die("Cannot connect: " . mysql_error());	
	}
	
	mysql_select_db("myDaycare", $conn);

	if (isset($_POST['remove']))
		{
			$remove = "DELETE from myChild where cfirstname = '$_POST[cfirstname]' and clastname = '$_POST[clastname]'";
			mysql_query($remove, $conn);
		};

    
	$sql="SELECT * FROM myChild";
	
	$myData=mysql_query($sql, $conn);
	
	echo "<table>
	<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Edit/Remove</th>
	</tr>";
	
	while($record=mysql_fetch_array($myData)){
		
		echo "<form action = main.php method=post>";
		echo "<tr>";
		echo "<td>" . "<input type=text name = cfirstname value=" . $record['cfirstname']. ">" . "</td>";
		echo "<td>" . "<input type=text name = clastname value=" . $record['clastname']. ">" . "</td>";
		echo "<td>" . "<a href=edit.php>Edit</a>" . "</td>";
		echo "<td>" . "<input type=submit name=remove value=remove" .  ">" . "</td>";
		echo "</form>";	
	}
	
	echo "</table";
	
	mysql_close($conn);
	
	?>


</body>

</html>