<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Your child</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="  sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Style sheet for the nav-bar-->
	<link rel="stylesheet" type="text/css" href="startbootstrap-small-business-gh-pages\css\small-business.css"> 

	<!-- Custom CSS for this page -->
	<link rel="stylesheet" type="text/css" href="ChildPageStyle.css">

	<script src="startbootstrap-small-business-gh-pages\js\bootstrap.js"></script>
	<script src="startbootstrap-small-business-gh-pages\js\jquery.js"></script>
</head>
<body class="container">
	<header>
		<nav class="navbar-fixed-top">
			<div id="navigation">
				<a href="HomePage.html">Home</a>
				<a href="addPage.php">Add a child</a>
				<a href="ParentAddPage.php">Add a parent</a>
				<a href="">Calendar</a>
				<a href="">Sign out</a>
				<div id="search"> <!-- CHANGE THE SEARCH BUTTON, ADD A BUTTON WITH A PICTURE-->
					<input type="text" name="searchBox" id="searchBox" placeholder="Search">
					<button type="submit" class="btn btn-info">Search</button>
				</div>
			</div>	
		</nav>
	</header>
	
	<div id="pageContent">
		<div class="infoContainer">
			<img src="profile.png" id="childPic" class="img-thumbnail" style="width:250px;height:250px;">
			<p id="otherInfo">
				<br>
				<h2><?php echo $_GET['firstName'] . " ". $_GET['lastName']?> </h2> 
				<br>Date of Birth: <?php echo $_GET['date_of_birth'];?> 
				<br>Address: <?php echo $_GET['address'];?> 
				<br>City: <?php echo $_GET['city'];?>
				<br>Zip: <?php echo $_GET['zip'];?>
				<br>Parent's Name: <?php echo $_GET['parent_Fname'] ." ". $_GET['parent_Lname']?>
				<br>Phone Number: <?php echo $_GET['phone_number'];?> 
				<br><a href="ParentPage.html" id="parentsLink">Parents/Guardian</a>
			</p> 
		</div>
		
		<div id = "button">
			<button type="button" class="btn btn-info" id="change">Change</button>
			<button type="button" class="btn btn-info" id="remove">Remove</button>
		</div>
		
		<p id="specificInfo">
			<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			SPECIFIC INFO ON THE KID(S) ex: Allergies, Pick-up time, Religious holidays<br>
			Allergies: <?php echo $_GET['allergies'];?>
		</p>
		
		</form>

		<form action="edit.php" method="post">
			<input type="submit" value="Edit Info" class="btn btn-info">
		</form>
		<button type="button" class="btn btn-info" id="removeButton">Remove</button>	</div>
</body>
</html>
