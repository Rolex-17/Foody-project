<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['owner_id']);

header("Location:http://localhost/foody/main/");

?>