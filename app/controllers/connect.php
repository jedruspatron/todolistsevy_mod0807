<?php

$host = "db4free.net";
$username = "sevy_todo";
$password = "tuittday1105";
$dbname = "todo_sevy";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection failed' . mysqli_error($conn));
}

echo 'connected successfully';


?>