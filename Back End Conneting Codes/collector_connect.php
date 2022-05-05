<?php
	$uname = $_POST['uname'];
	$phone = $_POST['phone'];
	$waste = $_POST['waste'];
	$quantityofwaste = $_POST['quantityofwaste'];
	$reward = $_POST['reward'];

	// Database connection
	$conn = new mysqli('localhost','root','','waste management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into collector(Name, Phone_Number, Type_of_Waste, Quantity_in_kg, Reward) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $uname, $phone, $waste, $quantityofwaste, $reward);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your response has been recorded...";
		$stmt->close();
		$conn->close();
	}
?>