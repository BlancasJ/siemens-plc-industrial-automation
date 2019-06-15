<?php
$conn = mysqli_connect("localhost", "DB_USERNAME", "DB_PASSWORD", "DB_NAME");
$result = mysqli_query($conn, "SELECT * FROM SensorData");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();

?>