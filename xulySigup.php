<?php
if(isset($_REQUEST['submitDangky'])) {
	$hoten = $_POST['hoten'];
	$mail = $_POST['email'];
	$tk = $_POST['username'];
    $mk = $_POST['password'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laptrinhweb2";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = sprintf("INSERT INTO `users` (`username`, `password`, `email`, `fullname`) VALUES ('%s','%s', '%s', '%s');", $tk, $mk,$mail, $hoten);
	$sql1 = sprintf("INSERT INTO `user_roles` (`user_name`, `role`) VALUES ('%s','normal');",$tk);
	mysqli_query($conn, $sql1);
	//var_dump($sql);
	if ($conn->query($sql) === TRUE) {
	  //echo "<hr/>New record created successfully";
	  header("Location: login.html");
	  die();
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	mysqli_close($conn);
}
?>