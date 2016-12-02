
<!DOCTYPE>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Style sheet for the nav-bar-->
	<link href = "startbootstrap-small-business-gh-pages\css\small-business.css" rel = "stylesheet" type = "text/css" />
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<!-- Custom CSS for this page -->
	<link href = "ParentAddPageStyle.css" rel = "stylesheet" type = "text/css" />

	

	<title>Adding a parent</title>
</head>
<body class="container"> 
	<header>
		<nav class="navbar-fixed-top">
			<div id="navigation">
				<a href="main.php">Home</a>
				<a href="addChild.php">Add new child</a>
				<a href="">Staff Directory</a>
				<a href="">Calendar</a>
				<a href="">Sign out</a>
				<div id="search"> <!-- CHANGE THE SEARCH BUTTON, ADD A BUTTON WITH A PICTURE-->
					<input type="text" name="searchBox" id="searchBox" placeholder="Search">
					<button type="submit" class="btn btn-info">Search</button>
				</div>
			</div>	
		</nav>
	</header>

	<div id = "picture">
		<img src="profile.png" alt="picture" class="img-thumbnail" style="width:250px;height:250px;">
		<div id = "button">
			<button type="button" class="btn btn-info" id="change">Change</button>
			<button type="button" class="btn btn-info" id="remove">Remove</button>
		</div>
	</div>
	
	<div id="specifics"> 
		<ul>
			<li> Profile image should have a minimum width of 210px and minimum height of 210px. </li>
		    <li> Make sure to save changes after changing the image. </li> 
		</ul>
	</div>
	
	<form class="form-horizontal" style="height:47%;" method="POST" action="ParentAddPage.php">
	<div id="left">
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name = "parent_Fname" class="form-control" >
		  </div>
		  <div class="form-group">
			<label>Last name</label>
			<input type="text" name = "parent_Lname" class="form-control" >
		  </div>
		  <div class="form-group">
			<label>Email</label>
			<input type="text" name = "email" class="form-control" >
		  </div>
	  </div>
	  <div id="right">
		  <div class="form-group">
			<label>Child's First Name</label>
			<input type="text" name = "cfirstname" class="form-control" >
		  </div>
		  <div class="form-group">
			<label>Child's Last Name</label>
			<input type="text" name = "clastname" class="form-control" >
		  </div>
		  <div class="form-group">
			<label>Phone Number</label>
			<input type="text" name = "phone_number" class="form-control" >
		  </div>
		  <div class="form-group">
			<label>Address</label>
			<input type="text" name = "address" class="form-control" >
		  </div>
	  </div>
	  <!---<button type="submit" class="btn btn-info" id="saveButton">Save</button>--->
	  <input type="submit" name = "submit" id="saveButton" class="btn btn-info">
	</form>	
	
	<?php
	if (isset($_POST['submit'])){
			
			$conn = mysql_connect("localhost", "username", "password");
			
			if (!$conn) {
				die("Connection failed: " . mysql_error());
			} 
			mysql_select_db("myDaycare", $conn);
		
			$sql = "INSERT INTO MyParents (firstname, lastname, email, phone_number, address, child_Fname, child_Lname) VALUES ('$_POST[parent_Fname]', 
			'$_POST[parent_Lname]', '$_POST[email]', '$_POST[phone_number]', '$_POST[address]', '$_POST[cfirstname]', '$_POST[clastname]')";
		
			mysql_query($sql, $conn);
			mysql_close($conn);
		}
	?>
</body>
</html>
