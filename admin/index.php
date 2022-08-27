<?php
session_start();
if (isset($_SESSION['owner_id']) or isset($_SESSION['admin_id'])) {
    header("Location:http://localhost/foody/admin/admin_home.php");
} else {

require_once '../db/prepare_connect.php';
global $conn;


    if (isset($_POST['uname']) && isset($_POST['pass'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $enc = md5($pass);
        if (!empty($uname) && !empty($enc)) {
            $sql = $conn->prepare("SELECT * FROM `resownwer_table` WHERE `owner_userid` = ? AND `owner_password` = ? ");
            $sql->bind_param("ss",$uname,$enc);
            $sql->execute();

            $admin_log_result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            if (count($admin_log_result) >0) {
                // print_r($admin_log_result);
                session_start();
                $_SESSION['owner_id'] = $admin_log_result[0]['owner_id'];
                $_SESSION['owner_firstname'] = $admin_log_result[0]['owner_firstname'];
                $_SESSION['owner_lastname'] = $admin_log_result[0]['owner_lastname'];
                $_SESSION['owner_userid'] = $admin_log_result[0]['owner_userid'];
                header("Location:http://localhost/foody/admin/admin_home.php");
            } else {
                $orginal_query = $conn->prepare("SELECT * FROM `admin` WHERE `admin_name` = ? AND `admin_password` = ?");
                $orginal_query->bind_param("ss",$uname,$pass);

                $orginal_query->execute();
                $orginal_result = $orginal_query->get_result()->fetch_all(MYSQLI_ASSOC);

                if (count($orginal_result) > 0) {
                  
                    session_start();
                    $_SESSION['admin_id'] = $orginal_result[0]['admin_id'];
                    $_SESSION['admin_name'] = $orginal_result[0]['admin_name'];
                    header("Location:http://localhost/foody/admin/admin_home.php");
                } else {
                    header("Location:http://localhost/foody/admin/");
                }
                
                // print_r($orginal_result);

            }
            
        } else {
         echo "please fill the all";
        } 


    }

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="admin_login_style.css">
    <title>Document</title>
    <style>
         @media screen and (max-width:1400px),
      screen and (max-height:800px) { 
          .log-in{
              width: 35%;
              height: 47%;
              left: 450px;
          }
      }
    </style>
</head>
<body>

<div id= "mlog" class="form2">

    <!-- <img src="images/salad.jpg" alt=""> -->
    <div class="blur">

        <div class="log-in">
            <div class="login-header">
                <h2>Admin Only</h2>
              
            </div>
            
            <form  action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post">
                <input class="modal" type="text" name="uname" id="uname" placeholder="Username" required><br><br>
                <input class="modal" type="password" name="pass" id="pass" placeholder="Enter Your Password" required><br><br><br>
                <input type="submit" value="Submit">
            </form>
            <div class="box">
    
                <a href="">Forgot Your Password?</a>
                <a href="admin_reg.php">Register As Admin</a>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<?php
 }
?>