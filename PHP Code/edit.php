<!DOCTYPE>
<html>
<!-- Let's Make this edit and add page -->
<head>
	


<title>Edit a child's profile</title>
</head>

<body class="container"> 
	<div id = "picture">
		<img src="profile.png" alt="picture"class="img-thumbnail" style="width:250px;height:250px;">
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
	
	<form class="form-horizontal" method="POST" action="edit.php">
	<div id="left">
	
	<div class="form-group">
			<label>Child ID</label>
			<input type="text" name = "cid" class="form-control" readonly="readonly"  value = "<?php echo $_GET['id']?>">
		  </div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name = "cfirstname" class="form-control" value = "<?php echo $_GET['firstName']?>">
		  </div>
		  <div class="form-group">
			<label>Last name</label>
			<input type="text" name = "clastname" class="form-control" value = "<?php echo $_GET['lastName']?>">
		  </div>
		  <div class="form-group">
			<label>Parent's First Name</label>
			<input type="text" name = "parent_Fname" class="form-control" value = "<?php echo $_GET['parent_Fname']?>">
		  </div>
		  <div class="form-group">
			<label>Parent's Last Name</label>
			<input type="text" name = "parent_Lname" class="form-control" value = "<?php echo $_GET['parent_Lname'];?>">
		  </div>
	  </div>
	  <div id="right">
		  <div class="form-group">
			<label>Allergies</label>
			<textarea class="form-control" name = "allergies" rows="4" placeholder = ""<?php echo $_GET['allergies']?>"" ></textarea>
		  </div>
		  <div class="form-group">
			<label>Phone Number</label>
			<input type="text" name = "phone_number" class="form-control" value = "<?php echo $_GET['phone_number']?>">
		  </div>
		  <div class="form-group">
			<label>Address</label>
			<input type="text" name = "address" class="form-control" value = "<?php echo $_GET['address']?>" >
		  </div>
		  <div class="form-group">
			<label>City/Town</label>
			<input type="text" name = "city" class="form-control" value = "<?php echo $_GET['city']?>">
		  </div>
		  <div class="form-group">
			<label>Zip</label>
			<input type="text" name = "zip" class="form-control" value = "<?php echo $_GET['zip']?>">
		  </div>
	  </div>
	  <input type="submit" name = "edit" class="form-control" > 
	 <!--- <button type="submit" class="btn btn-info" id="saveButton">Save</button> -->
	</form>
	
	<?php
	include('values.php');
	
	$conn = mysql_connect("localhost", "username", "password");
	
	//check connection 
	if (!$conn)
	{
		die("Cannot connect: " . mysql_error());	
	}
	
	mysql_select_db("myDaycare", $conn);

	
	if (isset($_POST['edit']))
	{
		$update = "UPDATE myChild set firstName = '$_POST[cfirstname]', lastName = '$_POST[clastname]', parent_Fname = '$_POST[parent_Fname]',
					      parent_Lname = '$_POST[parent_Lname]', allergies = '$_POST[allergies]', phone_number = '$_POST[phone_number]',
					      address = '$_POST[address]', city = '$_POST[city]',zip = '$_POST[zip]' where id = '$_POST[cid]'";
		mysql_query($update, $conn);
	};
	
	
	mysql_close($conn);
	
	
	?>
</body>
</html>
