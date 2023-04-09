<?php
session_start();

// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		$_SESSION['username'] = $username;
		header("Location: user_profile.php");
	} else {
		echo "Invalid username or password";
	}
}

mysqli_close($conn);
?>
