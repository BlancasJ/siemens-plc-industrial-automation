<?php
$servername = "localhost";

// REPLACE with your Database name
$dbname = "DB_NAME";
// REPLACE with Database user
$username = "DB_USERNAME";
// REPLACE with Database user password
$password = "DB_PASSWORD";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page.
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $sensor = $location = $value1 = $value2 = $value3 = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key == $api_key_value) {
        $memory0 = test_input($_GET["memory0"]);
        $mamory1 = test_input($_GET["mamory1"]);
        $mamory2 = test_input($_GET["mamory2"]);
        $memory3 = test_input($_GET["memory3"]);
        $memory4 = test_input($_GET["memory4"]);
        $sensor1 = test_input($_GET["sensor1"]);
        $sensor2 = test_input($_GET["sensor2"]);
        $sensor3 = test_input($_GET["sensor3"]);
        $sensor4 = test_input($_GET["sensor4"]);
        $sensor5 = test_input($_GET["sensor5"]);
        $counter = test_input($_GET["counter"]);
        $xpost = test_input($_GET["xpost"]);
        $ypost = test_input($_GET["ypost"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO SensorData (memory0, mamory1, mamory2, memory3, memory4,sensor1,sensor2,sensor3,sensor4,sensor5,counter,xpost,ypost)
        VALUES ('" . $memory0 . "', '" . $mamory1 . "', '" . $mamory2 . "', '" . $memory3 . "', '" . $memory4 . "','" . $sensor1 . "', '" . $sensor2 . "', '" . $sensor3 . "', '" . $sensor4 . "', '" . $sensor5 . "','" . $counter . "', '" . $xpost . "', '" . $ypost . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>