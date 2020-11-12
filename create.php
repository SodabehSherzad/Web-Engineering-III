<?php

	$fn = "";
	$ln = ""; 
	$gender = "";
	if(isset($_POST['btnCreate'])) {

		$fn = $_POST['fname'];
		$ln = $_POST['lname'];
		$gender = $_POST['gender'];

		require_once "include/connection.php";
		$sql = "INSERT INTO student(id, firstName, lastName, gender) VALUES(null, '$fn', '$ln', '$gender')";
		$result = mysqli_query($link, $sql);
		if($result) {
	    	echo "Student created successfully.<br>";
	    } else {
	    	echo "Invalid query. " . mysqli_error($link);
	    	echo "<br>Original Query: " . $sql;
	    }
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1><a href="read.php">Read</a></h1>
<form action="create.php" method="post">
	<h1>Contact Us</h1>
	<label>First Name: </label>
	<input type="text" name="fname"><br><br>
	<label>Last Name: </label>
	<input type="text" name="lname"><br><br>
	<select name="gender">
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select><br><br>
	<input type="submit" value="submit" name="btnCreate">
</form>
</body>
</html>