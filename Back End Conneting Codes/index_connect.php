<?php
	$name = $_POST['name'];
	$usertype = $_POST['usertype'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$number = $_POST['number'];
    $password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','waste management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(Name, Type_of_User, Address, Mail_id, Phone_Number, Password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $name, $usertype, $address, $email, $number, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>