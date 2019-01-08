<?php
require_once './connect.php';
echo "<br>";
$newTask = $_GET['name'];


$sql = "INSERT INTO tasks(name) VALUES('$newTask')";
$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo 'new user added successfully';
} else {
	echo 'error' .$sql. "<br>". mysqli_error($conn);
}

mysqli_close($conn);

?>