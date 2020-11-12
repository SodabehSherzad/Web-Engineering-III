<?php
require_once "include/connection.php";

if (isset($_POST['btnEdit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];
    $sql = "UPDATE student SET firstName = '$fname', lastName = '$lname', gender = '$gender' WHERE id = $id";

    //die($sql);
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("location: read.php");
        die;
        echo "Student Updated successfully.<br>";
    } else {
        echo "Invalid query. " . mysqli_error($link);
        echo "<br>Original Query: " . $sql;
    }
}

$fn = $ln = $gender = "";
if (!isset($_GET['id'])) {
    header('location: read.php');
    die();
}

$id = (int) $_GET['id'];

if (isset($_GET['id'])) {
    $std = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM student WHERE id = $id LIMIT 1"));
    $fn = $std['firstName'];
    $ln = $std['lastName'];
    $g = $std['gender'];

}

// if(!isset($id)){
//     header("Location: index.php");
//     die;
// }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="edit.php?id=<?= $id; ?>" method="post">
	<h1>Edit</h1>
	<label>First Name: </label>
	<input type="text" name="fname" value="<?=$fn?>"><br><br>
	<label>Last Name: </label>
	<input type="text" name="lname" value="<?=$ln?>"><br><br>
	<select name="gender">
		<option value="m" <?php echo ($g == "m") ? "selected" : "" ?>>Male</option>
		<option value="f" <?php echo ($g == "f") ? "selected" : "" ?>>Female</option>
	</select><br><br>
	<input type="hidden" name="id" value="<?=$id;?>">
	<input type="submit" value="submit" name="btnEdit">
	</form>
</body>
</html>