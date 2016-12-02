<?php
// define variables and set to empty values
$zipErr = $cfirstnameErr = $childLastNameErr = $parentfnameErr = $parentlnameErr = $bdayErr = $phoneNumErr = $addressErr = $cityErr = "";
$zip = $cfirstname = $childLastName = $parentfname = $parentlname = $bday = $phoneNum = $address = $city = $allergies = "";
$isValid = true; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cfirstname"])) {
    $cfirstnameErr = "First name is required";
  } else {
    $cfirstname = test_input($_POST["cfirstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$cfirstname)) {
      $cfirstnameErr = "Only letters and white space allowed";
	  $isValid = false; 
    }
	if(strlen($cfirstname) < 2)
	{
		$cfirstnameErr = "Name must be at least 2 characters long";
		$isValid = false; 
	}
	
  }
  
  if (empty($_POST["clastname"])) {
    $childLastNameErr = "Last name is required";
	$isValid = false; 
  } else {
    $childLastName = test_input($_POST["clastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$childLastName)) {
      $childLastNameErr = "Only letters and white space allowed"; 
	  $isValid = false; 
    }
	if(strlen($childLastName) < 2)
	{
		$childLastNameErr = "Name must be at least 2 characters long";
		$isValid = false; 
	}
  }
  
  if (empty($_POST["parent_Fname"])) {
    $parentfnameErr = "Parent first name is required";
	$isValid = false; 
  } else {
    $parentfname = test_input($_POST["parent_Fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$parentfname)) {
      $parentfnameErr = "Only letters and white space allowed";
		$isValid = false; 	  
    }
	if(strlen($parentfname) < 2)
	{
		$parentfnameErr = "Name must be at least 2 characters long";
		$isValid = false; 
	}	
  }
  
  if (empty($_POST["parent_Lname"])) {
    $parentlnameErr = "Parent last name is required";
	$isValid = false; 
  } else {
    $parentlname = test_input($_POST["parent_Lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$parentlname)) {
      $parentlnameErr = "Only letters and white space allowed"; 
	  $isValid = false; 
    }
	if(strlen($parentlname) < 2)
	{
		$parentlnameErr = "Name must be at least 2 characters long";
		$isValid = false; 
	}
  }
  
  if (empty($_POST["date_of_birth"])) {
    $bdayErr = "Birthday is required";
	$isValid = false;
  }
  else 
		$bday = $_POST["date_of_birth"];
    
  if (empty($_POST["phone_number"])) {
    $phoneNumErr = "Phone number is required";
	$isValid = false; 
  } else {
    $phoneNum = test_input($_POST["phone_number"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("%\([0-9]{3}\)[- ]?[0-9]{3}-[0-9]{4}%",$phoneNum)) {
      $phoneNumErr = "Invalid phone number"; 
	  $isValid = false; 
    }
  }
  
  if (empty($_POST["city"])) {
    $cityErr = "City/Town is required";
	$isValid = false; 
  } else {
    $city = test_input($_POST["city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed"; 
	  $isValid = false; 
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
	$isValid = false; 
  } else {
    $address = test_input($_POST["address"]);
	if (!preg_match("/^[0-9 a-zA-Z .-]*$/",$address)) {
      $addressErr = "Invalid address"; 
	  $isValid = false; 
    }
  }
  
  if (empty($_POST["zip"])) {
    $zipErr = "Zip is required";
	$isValid = false; 
  } else {
    $zip = test_input($_POST["zip"]);
  if (!preg_match("%[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} \d{1}[A-Z]{1}\d{1}%",$zip)) {
      $zipErr = "Invalid zip"; 
	  $isValid = false; 
    }
  }

  if (!empty($_POST["allergies"])) {
    $allergies = $_POST["allergies"];
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Style sheet for the nav-bar
	<link href = "startbootstrap-small-business-gh-pages\css\small-business.css" rel = "stylesheet" type = "text/css" />-->

	<!-- Custom CSS for this page -->
	<link href = "AddPageStyle.css" rel = "stylesheet" type = "text/css" />

	<!-- Latest compiled and minified JavaScript 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

	<title>Adding a child</title>
	<style>
		.error {color: #FF0000;}
	</style>
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
	<div id="picInfo">
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
	</div>
	
	<form class="form-horizontal" style="height:47%;" method="POST" action="addChild.php">
	<div id="left">
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name = "cfirstname" class="form-control" value="<?php echo $cfirstname;?>">
			<span class="error"> <?php echo $cfirstnameErr;?></span>
		  </div>
		  <div class="form-group">
			<label>Last name</label>
			<input type="text" name = "clastname" class="form-control" value="<?php echo $childLastName;?>">
			<span class="error"> <?php echo $childLastNameErr;?></span>
		  </div>
		  <div class="form-group">
			<label>Parent's First Name</label>
			<input type="text" name = "parent_Fname" class="form-control" value="<?php echo $parentfname;?>">
			<span class="error"> <?php echo $parentfnameErr;?></span>
		  </div>
		  <div class="form-group">
			<label>Parent's Last Name</label>
			<input type="text" name = "parent_Lname" class="form-control" value="<?php echo $parentlname;?>">
			<span class="error"> <?php echo $parentlnameErr;?></span>
		  </div>
		  <div class="form-group">
			<label>Date of Birth</label>
			<input type="date" name = "date_of_birth" class="form-control" id="dateField" onkeydown="return false" value="<?php echo $bday;?>"> <!-- Channge the value of the name tag if need be -->
			<span class="error"> <?php echo $bdayErr;?></span> <!-- Channge the value of the name tag if need be -->
			<script type="text/javascript">
			/* Sets the minimum and maximum dates of birth*/
				var today = new Date();
				var minDate = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				var minYear = today.getFullYear() - 6;
				 if(dd < 10){
				        dd = '0'+ dd;
				    } 
				    if(mm < 10){
				        mm ='0'+ mm;
				    } 
				today = yyyy +'-'+ mm + '-' + dd;
				minDate = minYear +'-'+ mm + '-' + dd;
				document.getElementById("dateField").setAttribute("min", minDate);
				document.getElementById("dateField").setAttribute("max", today);
			</script>
		  </div>
	  </div>
	  <div id="right" style="margin-top:-375px;">
		  <div class="form-group">
			<label>Allergies</label>
			<textarea class="form-control" name = "allergies" rows="4" ></textarea>
		  </div>
		  <div class="form-group">
			<label>Phone Number</label>
			<input type="text" name = "phone_number" class="form-control" maxlength = "14" placeholder = "e.g.: (555) 555-5555" value="<?php echo $phoneNum;?>">
			<span class="error"> <?php echo $phoneNumErr;?></span>
		  </div>
		  <div class="form-group">
			<label>Address</label>
			<input type="text" name = "address" class="form-control" value="<?php echo $address;?>">
			<span class="error"> <?php echo $addressErr;?></span>
		  </div>
		  <div class="form-group">
			<label>City/Town</label>
			<input type="text" name = "city" class="form-control" value="<?php echo $city;?>">
			<span class="error"> <?php echo $cityErr;?></span>
		  </div>
		  <div class="form-group">
			<label>Zip</label>
			<input type="text" name = "zip" class="form-control" maxlength = "7" value="<?php echo $zip;?>">
			<span class="error"> <?php echo $zipErr;?></span>
	</div>
	  </div>
	  
</div>
	  <!---<button type="submit" class="btn btn-info" id="saveButton">Save</button> -->
	  <input type="submit" name = "submit" id="saveButton" class="btn btn-info" onclick="window.open('ParentAddPage.php')"> 
	</form>
	 

	<?php 
		if($isValid == true)
		{
			if (isset($_POST['submit'])){
				
				$conn = mysql_connect("localhost", "username", "password");
				
				//check connection 
				if (!$conn)
				{
					die("Cannot connect: " . mysql_error());	
				}
				
				mysql_select_db("myDaycare", $conn);
				
				$addChild = "INSERT INTO myChild(firstName, lastName, parent_Fname, parent_Lname, date_of_birth, allergies, phone_number, address, city, zip) 
							 VALUES ('$_POST[cfirstname]', '$_POST[clastname]', '$_POST[parent_Fname]', '$_POST[parent_Lname]',
							 '$_POST[date_of_birth]','$_POST[allergies]',  '$_POST[phone_number]', '$_POST[address]', '$_POST[city]', '$_POST[zip]')";
				
					
				mysql_query($addChild, $conn);
				
				mysql_close($conn);
			}
			
		}
		
	?>

</body>

</html>
