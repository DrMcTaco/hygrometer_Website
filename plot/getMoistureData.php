<!DOCTYPE html>
<html>
<head>
<style>
table {
width: 90%;
border-collapse: collapse;
}

table, td, th {
border: 1px solid black;
padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

$con = mysqli_connect('localhost','monitor','password','moisture');
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"moisture");
$sql="SELECT * FROM moistureData ORDER BY timeStamp DESC LIMIT 10";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Timestamp</th>
<th>Moisture 1</th>
<th>Moisture 2</th>
<th>Moisture 3</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row[0] . "</td>";
echo "<td>" . $row[1] . "</td>";
echo "<td>" . $row[2] . "</td>";
echo "<td>" . $row[3] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
