<?php

 $url=$_POST['xml'];


$servername = "localhost";
$username = "root";
$password = "9212manutd";
$dbname = "intel";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
$sql = "INSERT INTO intel_data (url)
VALUES ('$url')";

$conn->query($sql);


?>
