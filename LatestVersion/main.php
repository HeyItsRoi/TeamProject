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
			<a href="main.php">Home</a>
			<a href="addChild.php">Add new child</a>
			<a href="">Staff Directory</a>
			<a href="">Calendar</a>
			<a href="">Sign out</a>
			
			<form action="search.php" method="post">
			<div id="search">
				<input type="text" name="searchBox" id="searchBox" placeholder="Search">
				<!---<button type="submit" class="btn btn-info">Search</button>--->
				<input type="submit" name = "search" id="search" class="btn btn-info" >
			</div>
			</form>
			
			
		</div>
		
	</nav>

	<table class="table table-bordered">
		<tr>
			<th><b>First name</b></th>
			<th><b>Last name</b></th>
			<th><b>Edit / Remove</b></th> <!-- ADD AN ALERT BOX (ex: Do) WHEN YOU WANT TO REMOVE A CHILD -->
		</tr>
		
		
		
		<?php  
		$conn = mysql_connect("localhost", "username", "password");
	
	//check connection 
	if (!$conn)
	{
		die("Cannot connect: " . mysql_error());	
	}
	
	mysql_select_db("myDaycare", $conn);
	
 
	$sql="SELECT * FROM myChild";
	
	$myData=mysql_query($sql, $conn);
		
		while($record=mysql_fetch_array($myData)){
		
		echo "<form action = main.php method=post>";
		echo "<tr>";
		echo  "<input type=hidden name = cid value=" . $record['id']. ">";
		echo "<td>" . "<input type=text name = cfirstname value=" . $record['firstName']. ">" . "</td>";
		echo "<td>" . "<input type=text name = clastname value=" . $record['lastName']. ">" . "</td>";
		echo "<td><a href='edit.php?id=$record[id]&firstName=$record[firstName]&lastName=$record[lastName]&parent_Fname=$record[parent_Fname]
				&parent_Lname=$record[parent_Lname]&allergies=$record[allergies]&phone_number=$record[phone_number]&address=$record[address]
				&city=$record[city]&zip=$record[zip]'>Edit</a>  <a href='childPage.php?id=$record[id]&firstName=$record[firstName]&lastName=
				$record[lastName]&parent_Fname=$record[parent_Fname]&parent_Lname=$record[parent_Lname]&allergies=$record[allergies]
				&phone_number=$record[phone_number]&address=$record[address]&city=$record[city]&zip=$record[zip]'>View</a>  <input type=submit 
				name=remove value=Remove" .  "> </td>";
										
		echo "</form>";	
	}
	
	//Delete child
	if (isset($_POST['remove']))
		{
			$remove = "DELETE from myChild where id = '$_POST[cid]'";
			mysql_query($remove, $conn);
		};
		
			mysql_close($conn);
	?>
		
	</table>
</body>
</html>
