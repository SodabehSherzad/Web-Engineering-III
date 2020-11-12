<?php
	
	if(!isset($_GET['id'])) {
		header('location: read.php');
		die();
	}

	$id = (int) $_GET['id'];
	require_once "include/connection.php";
	$sql = "DELETE FROM student WHERE id = $id LIMIT 1";
	//die($sql);
	
	$result = mysqli_query($link, $sql);

    if($result) {
    	header("location: read.php");
    	die;
    	echo "Student deleted successfully.<br>";
    } else {
    	echo "Invalid query. " . mysqli_error($link);
    	echo "<br>Original Query: " . $sql;
    }

?>