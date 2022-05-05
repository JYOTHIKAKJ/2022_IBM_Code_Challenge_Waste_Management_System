<?php
    $uname = $_POST['uname'];
    $number = $_POST['number'];
	$waste = $_POST['waste'];
	$waste1 = $_POST['waste1'];
	$service = $_POST['service'];
	$location = $_POST['location'];
	$weights =$_POST['weights'];

	// Database connection
	$conn = new mysqli('localhost','root','','waste management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user(Name, Phone_Number, Type_of_Waste, Another_Waste, Approx_Weight, Type_of_Service, Location) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $uname, $number, $waste, $waste1, $weights, $service, $location);
		$execval = $stmt->execute();
		echo $execval;
		echo "You have been successfully added for wastage...";
		$stmt->close();
		$conn->close();
	}
?>