<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'portfolio';


//create connection

$conn = new mysqli($servername, $username, $password, $dbname);
//cheack connection
if($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>


