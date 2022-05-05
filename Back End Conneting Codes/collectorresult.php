<!DOCTYPE html>
<html>
<head>
<title>Details of Wastes to be Collected</title>
<style>
table {
border-collapse: 1px solid;
width: 100%;
color: black;
font-family: serif;
font-size: 25px;
text-align: left;
}
th {
background-color: violet;
color: black;
}
tr:nth-child(even) 
</style>
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>Phone Number</th>
<th>Type of Wastes</th>
<th>Another types of throwaways</th>
<th>Approximate Weights</th>
<th>Type of Service</th>
<th>Location</th>
</tr>
<?php
   $conn = mysqli_connect("localhost", "root", "", 'waste management');
// Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
   $sql = "SELECT Name, Phone_Number, Type_of_Waste, Another_Waste, Approx_Weight, Type_of_Service, Location FROM user";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
// output data of each row
   while($row = $result->fetch_assoc()) {
   echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Phone_Number"] . "</td><td>"
. $row["Type_of_Waste"]. "</td><td>" . $row["Another_Waste"]. "</td><td>" .$row["Approx_Weight"]. "</td><td>" . $row["Type_of_Service"]. "</td><td>" . $row["Location"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>