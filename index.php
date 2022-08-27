<?php
require_once 'db/prepare_connect.php';
require_once 'db/connect.inc.php';
global $conn;

if (isset($_SESSION['id'])) {
    echo "you are already log in";
} else {
    if (isset($_POST['uname']) && isset($_POST['pass'])) {
        $uname = strtolower($_POST['uname']);
        $pass = strtolower($_POST['pass']);
        $enc = md5($pass);
        if (!empty($uname) && !empty($enc)) {

            $sql = $conn->prepare("SELECT*FROM `user_table` WHERE `user_username`= ? AND `user_password`= ? ");
            $sql->bind_param("ss",$uname,$enc);
            $sql->execute();
            $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            // echo $result[0]['user_username'];
            // exit;

            if ($result) {
                if (count($result)>0) {

                    session_start();
                    $_SESSION['id'] = $result[0]['user_id'];
                    $_SESSION['firstname'] = $result[0]['user_firstname'];
                     $_SESSION['lastname'] = $result[0]['user_lastname'];
                    
                    header("Location:http://localhost/foody/main/");
                } else {
                    // echo "usrname and password is invalid";
                    
                }
            } else {
                echo "<script> alert('invalid password & id')</script>";

            }
        } else {
        }
    }

    if (isset($_POST['mfname']) && isset($_POST['muname']) && isset($_POST['memail']) && isset($_POST['mpass']) && isset($_POST['mcpass']) && isset($_FILES['mphoto'])) {
        $fulln =strtolower( $_POST['mfname']);
        $uname = strtolower($_POST['muname']);
        $email = $_POST['memail'];
        $pass = $_POST['mpass'];
        $cpass = $_POST['mcpass'];
        
        $pass_enc = md5($pass);
        $cpass_enc = md5($cpass);

        $validate_email = filter_var($email,FILTER_VALIDATE_EMAIL);
       
       $file_name = $_FILES['mphoto']['name'];
      $file_type = $_FILES['mphoto']['type'];
      $file_temp = $_FILES['mphoto']['tmp_name'];

     $file_extension = explode(".",$file_name);
     $file_extension_or = strtolower(end($file_extension)) ;
    //  $file_extension_or = strtolower($file_extension);
     $extension = array("jpeg","jpg","png");

     if (in_array($file_extension_or,$extension) == true) {
         $upload_name = $file_name;
         move_uploaded_file($file_temp,'upload/'.$file_name);
     }

     $an_query = "SELECT * FROM `user_table` WHERE `user_email` = '$email' OR `user_username` = '$uname'";
     $an_result = mysqli_query($conn,$an_query);
     $an_row = mysqli_num_rows($an_result);

     if (!empty($fulln) && !empty($uname) && !empty($email) && !empty($pass) && !empty($cpass) && !empty($file_name)) {
          if (($pass_enc == $cpass_enc)  ) {
              if ( $validate_email ) {
                  if (($an_row ==0)) {
                      $reg_query = "INSERT INTO `user_table`(`user_fullname`, `user_username`, `user_email`, `user_password`, `user_img`) VALUES ('$fulln','$uname','$email','$pass_enc','$upload_name')";
                      $reg_result = mysqli_query($conn,$reg_query);
        
                      if ($reg_result) {
                        header("Location:http://localhost/foody/");
                    } else {
                        echo "<script> alert('please fill all the feilds')</script>";
                    }
                      
                  } else {
                    echo "<script> alert('the user is already exist with same useremail & userid')</script>";
                  }
                  
                  
              } else {
                echo "<script> alert('the email is not valid')</script>";
              }
            
          } else {
            echo "<script> alert('password has not matched')</script>";
          }
         
     }
        
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="user-login-style.css">
        <title>Document</title>
    </head>

    <body>
    

        <div class="container">
            <div class="logo">
                <img src="images/index.png" alt="" style="width: 100%;height: 100%;">
            </div>

            <div class="log-form">
                <div class="header">

                    <h2 id="log"><a  id="link1" class='login acti' href="">Log in</a></h2>
                    <h2 id="sign"><a id="link2" class='login' href="">Sign Up</a></h2>
                    
                </div>
                <div id="modal-sign" class="modal-form">
                    <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post" enctype="multipart/form-data">
                        <input type="text" class="modal" name="mfname" id="mfname" placeholder="fullname" required><br><br>
                       
                        <input type="text" class="modal" name="muname" id="muname" placeholder="Username" required><br><br>
                        <input type="email" class="modal" name="memail" id="memail" placeholder="Enter Your Email" required><br><br>
                        <input type="password" class="modal" name="mpass" id="mpass" placeholder="Enter Your Password" require><br><br>
                        <input type="password" class="modal" name="mcpass" id="mcpass" placeholder="Confirm Password" require><br><br>
                        <input type="file" class="modal" name="mphoto" id="mlname" placeholder="Lastname" required hidden>
                         <label for="mlname" style="cursor: pointer;">Upload Image</label><br><br><br>
                        <input type="submit" class="modal-btn" value="Submit"><br><br>
                    </form>

                </div>

                <div id= "mlog" class="form2">
                    <form  action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post">
                        <input type="text" name="uname" id="uname" placeholder="Username" required><br><br>
                        <input type="password" name="pass" id="pass" placeholder="Enter Your Password" require><br><br><br>
                        <input type="submit" value="Submit">
                    </form>
                    <a href="">Forgot Your Password?</a>
                </div>
            </div>
            

        </div>
        
        <script src="login.js"></script>
    </body>

    </html>
<?php
}
?>