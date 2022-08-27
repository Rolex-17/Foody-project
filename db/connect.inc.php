<?php
$host = "localhost";
$servername ="root";
$password = "";
$database = "foody";

$conn = mysqli_connect($host,$servername,$password,$database);
if ($conn) {
    
} else {
    echo mysqli_connect_error($conn);
}



?>