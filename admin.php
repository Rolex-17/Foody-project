<?php
session_start();
if (isset($_SESSION['id'])) {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      echo '<h1> hiii'.$_SESSION['firstname'] .' welcomw!!!</h1>';

    ?>
    <button><a href="logout.php">Log out</a></button>
</body>
</html>

<?php
} else {
    header("Location:http://localhost/foody/admin_login.php");  
}
?>