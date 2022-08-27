<?php
require '../db/connect.inc.php';
global $conn;

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['resname']) && isset($_POST['city']) && isset($_POST['addr']) && isset($_POST['desc']) && isset($_FILES['img']) && isset($_POST['uname']) && isset($_POST['pass'])) {
   
  $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $resname = $_POST['resname'];
    $city = $_POST['city'];
    $addr = $_POST['addr'];
    $desc = $_POST['desc'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
     $enc = md5($pass);
     
     $validate_email = filter_var($uname,FILTER_VALIDATE_EMAIL);

     $file_name = $_FILES['img']['name'];
     $file_type = $_FILES['img']['type'];
     $file_temp = $_FILES['img']['tmp_name'];

     $file_extension = explode(".",$file_name);
     $file_extension_or = strtolower(end($file_extension)) ;
    //  $file_extension_or = strtolower($file_extension);
     $extension = array("jpeg","jpg","png");

     if (in_array($file_extension_or,$extension) == true) {
         $upload_name = $file_name;
         move_uploaded_file($file_temp,'../upload/'.$file_name);
     }
     

    if (!empty($fname) && !empty($lname) && !empty($resname) && !empty($city) && !empty($addr) && !empty($upload_name) && !empty($uname) && !empty($enc) && $validate_email ) {
        $query = "INSERT INTO `resownwer_table` ( `owner_firstname`, `owner_lastname`, `owner_resname`, `owner_city`, `owner_address`,`owner_description`,`res_img`, `owner_userid`, `owner_password`) VALUES ('$fname','$lname','$resname','$city','$addr','$desc','$upload_name','$uname','$enc')";

        $result = mysqli_query($conn,$query);

        if ($result) {
            header("Location:http://localhost/foody/admin/");
        } else {
            echo mysqli_error($conn);
        }
        
    } else {
        echo "<script> alert('email is not valid')</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_regstyle.css">
    <link rel="stylesheet" href="../css/all.css">
    <title>Document</title>
    <style>
        .tog{
            color: red;
            position: absolute;
            right: 10px;
            top: 5px;
            font-size: 1.5rem;
        }
         @media screen and (max-width:1400px),
      screen and (max-height:800px) { 
          .log-in{
              width: 35%;
              height: 90%;
              left: 450px;
              top: 50px;
          }
      }
    </style>
</head>
<body>


<div id="mlog" class="form2">

    <div class="blur">

       <div class="log-in">
           <div class="login-header">
              <h2>Admin Only</h2>
              <a href="../main/" class="tog">
                  <i class="fas fa-times"></i>
              </a>
           </div>
           <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="fname" id="" placeholder="Firstname" required><br><br>
            <input type="text" name="lname" id="" placeholder="Lastname" required><br><br>
            <input type="text" name="resname" id="" placeholder="Resturant Name" required><br><br>
            <input type="text" name="city" id="" placeholder="City" required> <br><br>
            <input type="text" name="addr" id="" placeholder="Address" required> <br><br>
            <input type="text" name="desc" id="" placeholder="Resturant Description" required> <br><br>
            <input type="file" name="img" id="" placeholder="choose" required> <br><br>
           <input type="text" name="uname" id="" placeholder="Useremail" required><br><br>
            <input type="password" name="pass" id="" placeholder="Password" required><br><br><br>
            <input type="submit" value="submit">
            </form>
       </div>
    </div>
</div>
</body>
</html>