<?php
	require_once "include/connection.php";
	$sql = "SELECT * FROM student";
	$students = mysqli_query($link, $sql);

	$output = "";
    
    	while($student = mysqli_fetch_assoc($students)) {
    		$id = htmlentities($student['id']);
    		$fn = htmlentities($student['firstName']);
    		$ln = htmlentities($student['lastName']);
    		$gender = htmlentities($student['gender']);
    		$output .= "<tr>
							<td>$id</td>
							<td>$fn</td>
							<td>$ln</td>
							<td>$gender</td>
							<td><a href='delete.php?id=$id'>Delete</a> | <a href='edit.php?id=$id'>Edit</a></td>
						</tr>";
    	}

    // } else {
    // 	echo "Invalid query. " . mysqli_error($link);
    // }
?>

<!DOCTYPE html>
<html>
<head>
	<title>List Students</title>
	<style type="text/css">
		table {
			width: 50%;
			margin: 100px auto;
			text-align: center;
		}
	</style>
</head>
<body>
<h1><a href="create.php">Create</a></h1>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
			echo $output;
		?>
	</tbody>
</table>
</body>
</html>