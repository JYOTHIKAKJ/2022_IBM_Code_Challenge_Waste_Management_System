<!DOCTYPE html>
<html>
<head>
<title>Details of available Waste</title>
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
<th>Quantity in kg</th>
<th>Reward</th>
</tr>
<?php
   $conn = mysqli_connect("localhost", "root", "", 'waste management');
// Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
   $sql = "SELECT Name, Phone_Number, Type_of_Waste, Quantity_in_kg, Reward FROM collector";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
// output data of each row
   while($row = $result->fetch_assoc()) {
   echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Phone_Number"] . "</td><td>"
. $row["Type_of_Waste"]. "</td><td>" . $row["Quantity_in_kg"]. "</td><td>" .$row["Reward"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>