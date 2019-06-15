<?php

/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id10006836_plc";
// REPLACE with Database user
$username = "id10006836_upyplc";
// REPLACE with Database user password
$password = "DB_PASSWORD";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $sensor = $location = $value1 = $value2 = $value3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $sensor = test_input($_POST["sensor"]);
        $location = test_input($_POST["location"]);
        $value1 = test_input($_POST["value1"]);
        $value2 = test_input($_POST["value2"]);
        $value3 = test_input($_POST["value3"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO SensorData (sensor, location, value1, value2, value3)
        VALUES ('" . $sensor . "', '" . $location . "', '" . $value1 . "', '" . $value2 . "', '" . $value3 . "')";
        
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

//Next lines to create HTML webpage and visuals


$Write="
    
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    
    table, th, td {
    border: 1px solid black;
    }
    </style>
    </head>
    <body>
    
    <h2>Current PLC status at Universidad Politecnica de Yucatan</h2>
    
    
    <table style=width:75%>
      <tr> 
        <th> </th> 
        <th>Temperature (°C)    </th> 
        <th>Humidity (%)        </th> 
        <th>Pressure (hPa)      </th> 
        <th>UV index            </th>
        <th>Wind speed (Km/h)   </th> 
        <th>Battery (%)        </th> 
        <th>Date/Time           </th>
      </tr>
      <tr> 
        <td>Current</td> 
        <td>$sensor</td> 
        <td>$location</td> 
        <td>$value1</td> 
        <td>$value2</td>
        <td>$value3</td> 
        <td>$value4</td>
        <td> </td>
      </tr>
      </table>
      </body>
      
        <body>
      <p>Yellow: Optic sensor</p>
      <p>Red: Inductive sensor</p>
      <p>Blue: Capacitive sensor</p>
      <p>Pink: Optic sensor</p>
      <p>Green: Proximity sensor</p>

     
     <link rel='stylesheet' type='text/css' href='conveyor.css'>
        
        <div class='machine'>
        <div class='sensors'></div>
        <div class='package'></div>
        <div class='belt'>  
          <div class='gear'></div>
          <div class='gear right'></div>
          <div class='TheseAreTheBreaks'></div>
          <div class='TheseAreTheBreaks_Again'></div>
        </div>
        </div>
     
    </body>
    <a href=http://www.upy.edu.mx target=_blank>Visit us Universidad Politecnica de Yucatan</a>  
      
    </html>
    
      ";
      
//$Write="<p>Temperature : " . $sensor . " Celcius </p>". "<p>Humidity : " . $location . " % </p>";
file_put_contents('currentstatePLCUPY.html',$Write);


$Write="
    
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    
    table, th, td {
    border: 1px solid black;
    }
    </style>
    </head>
    <body>
    
    <h2>Current PLC status at Universidad Politecnica de Yucatan</h2>
    
    
    <table style=width:75%>
      <tr> 
        <th> </th> 
        <th>Temperature (°C)    </th> 
        <th>Humidity (%)        </th> 
        <th>Pressure (hPa)      </th> 
        <th>UV index            </th>
        <th>Wind speed (Km/h)   </th> 
        <th>Battery (%)        </th> 
        <th>Date/Time           </th>
      </tr>
      <tr> 
        <td>Current</td> 
        <td>$sensor</td> 
        <td>$location</td> 
        <td>$value1</td> 
        <td>$value2</td>
        <td>$value3</td> 
        <td>$value4</td>
        <td> </td>
      </tr>
      </table>
      </body>
      
      <p>  </p>
      <p>Yellow: </p>
      <p>Red: </p>
      <p>Blue: </p>
      <p>Pink: </p>
      <p>Green: </p>

     
     <link rel='stylesheet' type='text/css' href='conveyor.css'>
        
        <div class='machine'>
        <div class='sensors'></div>
        <div class='package'></div>
        <div class='belt'>  
          <div class='gear'></div>
          <div class='gear right'></div>
          <div class='TheseAreTheBreaks'></div>
          <div class='TheseAreTheBreaks_Again'></div>
        </div>
        </div>
        
     <p>h </p>
    
    <a href=http://www.upy.edu.mx target=_blank>Visit us Universidad Politecnica de Yucatan</a>  
      
    </html>
    
      ";
      
//$Write="<p>Temperature : " . $sensor . " Celcius </p>". "<p>Humidity : " . $location . " % </p>";
file_put_contents('example2.html',$Write);
