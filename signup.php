<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password']) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
	if (mysqli_query($conn, $sql)) {
		echo "Registration successful";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>
