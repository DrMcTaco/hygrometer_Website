<?php

$con = mysqli_connect('localhost','monitor','password','moisture');
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"moisture");
$sql="SELECT unix_timestamp(timestamp) * 1000, moisture1, moisture2, moisture3 FROM moistureData ORDER BY timeStamp DESC LIMIT 10";
$result = mysqli_query($con,$sql);
$rows = array('Moisture1' => array(), "Moisture2" => array(), 'Moisture3' => array());
while($row = mysqli_fetch_array($result)){
	array_push($rows['Moisture1'], array($row['unix_timestamp(timestamp) * 1000'], $row['moisture1']));
	array_push($rows['Moisture2'], array($row['unix_timestamp(timestamp) * 1000'], $row['moisture2']));
	array_push($rows['Moisture3'], array($row['unix_timestamp(timestamp) * 1000'], $row['moisture3']));
}

echo (json_encode($rows));
mysqli_close($con);
?>