<?php
$hostname = "localhost";
$servername = "root";
$password = "";
$database = "foody";

$conn = new mysqli($hostname,$servername,$password,$database);

if ($conn) {
    
} else {
    echo mysqli_error($conn);
}


?>