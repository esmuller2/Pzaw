<?php
$host = "localhost"; 
$username = "root";  
$password = "";      
$database = "egz"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}
?>
