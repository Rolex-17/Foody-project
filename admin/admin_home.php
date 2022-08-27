<?php
session_start();
if (isset($_SESSION['owner_id']) || isset($_SESSION['admin_id'])) {
    //   $_SESSION['owner_id'];
    //  echo $_SESSION['admin_id'];
    require_once '../db/connect.inc.php';
    global $conn;

    if (isset($_SESSION['owner_id'])) {
        $owner_id = $_SESSION['owner_id'];
        $name = $_SESSION['owner_firstname'];
        $lname = $_SESSION['owner_lastname'];
    } else {
        $owner_id = $_SESSION['admin_id'];
        $name = $_SESSION['admin_name'];
        $lname = " ";
    }

    if (isset($_POST['dish']) && isset($_FILES['photo']) && isset($_POST['type']) && isset($_POST['category']) && isset($_POST['price'])) {
        $dish = $_POST['dish'];
       $type = $_POST['type'];
      $category = $_POST['category'];
        $price = $_POST['price'];
        

       $file_name = $_FILES['photo']['name'];
      $file_type = $_FILES['photo']['type'];
      $file_temp = $_FILES['photo']['tmp_name'];

     $file_extension = explode(".",$file_name);
     $file_extension_or = strtolower(end($file_extension)) ;
    //  $file_extension_or = strtolower($file_extension);
     $extension = array("jpeg","jpg","png");

     if (in_array($file_extension_or,$extension) == true) {
         $upload_name = $file_name;
         move_uploaded_file($file_temp,'../upload/'.$file_name);
     }

        if (!empty($dish) && !empty($upload_name) && !empty($type) && !empty($category) && !empty($price)) {
            $food_query = "INSERT INTO `foodlist`(`ownerId`, `dishname`, `dishtype`, `dishcategory`, `dishprice`,`dish_img`) VALUES ($owner_id,'$dish','$type','$category',$price,'$upload_name')";
            $food_result = mysqli_query($conn, $food_query);
             if ($food_result) {
              
             } else {
                echo mysqli_error($conn);
             }
             
        } else {
           
        }
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../css/all.css">
        <title>Document</title>
        <style>
             @media screen and (max-width:1400px),
      screen and (max-height:800px) { 
          .links-container{
              /* border: 1px solid black; */
              width: 30%;
              right: 10px;
          }
          .grid-container{
              grid-template-columns:17% 80% ;
          }
          .modal{
              width: 39%;
              height: 73%;
          }
      }
        </style>
    </head>

    <body>
        <div class="grid-container">

            <header class="header">
                <nav id="nav">
                    <div class=" nav-header">
                        <div class="head-title">
                            <h2>f<span class="color">oo</span>dy</h2>
                        </div>
                        <div class="linkwa links-container2">
                            <ul class="links">
                                <li><a href="">
                                        <!-- email -->

                                        <i class="fas fa-envelope"></i>Email
                                    </a></li>
                                <li><a href="">
                                        <i class="fas fa-comments"></i>Chat
                                        <!-- message -->

                                    </a></li>
                                <li><a href="">
                                        <i class="fas fa-check-circle"></i>Check
                                        <!-- right -->

                                    </a></li>
                                <li><a href="">
                                        <i class="fas fa-calendar-alt"></i>Date
                                        <!-- calender -->

                                    </a></li>
                            </ul>
                        </div>

                        <div class=" linkwa links-container">
                            <ul class="links">
                                <li><a href="">English</a></li>
                                <li><a href="../main/main.php">
                                        <!-- home -->
                                        <i class="fas fa-home"></i>
                                    </a></li>
                                <li><a href="#search">
                                        <!-- search -->
                                        <i class="fas fa-search"></i>
                                    </a></li>
                                <li><a href="">
                                        <!-- notification -->
                                        <i class="fas fa-bell"></i>
                                    </a></li>
                                <li>
                                <div class="nav-select">
                            <?php
                              $profile_query = "SELECT `res_img` FROM `resownwer_table` WHERE `owner_id` = $owner_id";
                              $profile_result = mysqli_query($conn,$profile_query);
                              $row = mysqli_fetch_assoc($profile_result);
                              
                             if ($row['res_img'] == '') { 
                                
                                 echo "<i class='fas fa-user-plus'></i>";
                                } else {
                                 echo "<img src='../upload/{$row['res_img']}'alt=''>"; 
                                
                             }
                             
                              
                            ?>

                            <!-- <input type="file" name="profile-img" id="profile-img" style="position: absolute;z-index: -1;opacity: 0;"> -->
                        </div>
                                        
                                    </li>
                            </ul>
                        </div>

                    </div>
                </nav>
            </header>

            <div class="sidebar">
                <div class="sidebar-head">
                    <div class="logo">

                        <h3>Admin Only</h3>

                    </div>
                    <div class="profile" ">
                        <div class="profile-select">
                            <?php
                              $profile_query = "SELECT `res_img` FROM `resownwer_table` WHERE `owner_id` = $owner_id";
                              $profile_result = mysqli_query($conn,$profile_query);

                              $row = mysqli_fetch_assoc($profile_result);
                              
                              if ($row['res_img'] == '') { 
                                 
                                  echo "<i class='fas fa-user-plus'></i>";
                                 } else {
                                  echo "<img src='../upload/{$row['res_img']}'alt=''>"; 
                                 
                              }
                              
                            ?>
                            
                            <!-- <input type="file" name="profile-img" id="profile-img" style="position: absolute;z-index: -1;opacity: 0;"> -->
                        </div>
                        <?php
                        echo "<p class='owner-name'>${name} ${lname}</p>";
                        ?>
                        
                    </div>
                    
                </div>

                <div class="option">
                    <ul>
                        <li><a href="">
                                <i class="fas fa-rupee-sign"></i>
                                Add Offer</a></li>
                        <li><a href=""><i class="fas fa-user"></i>
                                Profile</a></li>
                        <li><a href=""><i class="fas fa-plus"></i>
                                Add Item</a></li>

                        <?php
                        if (isset($_SESSION['admin_id'])) {
                        ?>
                            <li><a class="active-side side-link" onclick="users()" href=""><i class="fas fa-plus"></i>
                                    Users</a></li>
                            <li><a class="side-link"  onclick="event.preventDefault();  owner()" href=""><i class="fas fa-plus"></i>
                                    Owner</a></li>
                            <li><a class="side-link"  onclick="event.preventDefault(); food()" href=""><i class="fas fa-plus"></i>
                                    Food</a></li>
                        <?php

                        }
                        ?>

                        <li><a href=""><i class="fas fa-cog"></i>
                                Setting</a></li>
                        <li><a href="admin_logout.php"><i class="fas fa-power-off"></i>
                                Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class=" content box">
                <div class="box-contain">

                    <div class="box1">
                        <h2>List Of Foods</h2>
                        <p>All The Foods That You Have Added,Explain Us BY Our Taste</p>
                        <p class="feild" id="owner">Welcome <?php echo $name." ".$lname  ?> </p>
                    </div>

                    <div class="box2">
                        
                        <a class="m-btn btn add" href="">Add Food</a><br>
                        <p class="feild"><input type="text" name="search" id="search"><input class="btn-d srch-btn" onclick="searcho()" type="submit" value="Search"></p>
                    </div>
                </div>
                 
                <div class="main-box">
                    <table class="table" id="sam">
                        <?php

                        if (isset($_SESSION['owner_id'])) {
                            $owner_id = $_SESSION['owner_id'];

                        ?>
                            <thead>
                                <th>Id</th>
                                <th>Dish Name</th>
                                <th>Type</th>
                                <th>Dish Category</th>
                                <th>Dish Price</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </thead>
                            <tbody id="tbod">
                            
                            </tbody>
                            
                        <?php
                        } else {
                            // i will insert direct with heading

                        }
                        ?>
                    </table>


                    <div class="box3">
                        <div id="pagin" class="pagination">
                            <?php
                            if (isset($_SESSION['owner_id']) ) {
                                $user = $_SESSION['owner_id'];


                                $limit = 8;
                                $query = "SELECT * FROM `foodlist` WHERE ownerid = $user";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($result);


                                $total_row = ceil($row / $limit);
                                $i = 1;


                                while ($i <= $total_row) {

                            ?>
                                    <button class="pagi-btn" id="<?php echo $i ?>" onclick="pagin(this.id,'page')"><?php echo $i ?></button>


                            <?php
                                    $i++;
                                }
                            }
                            ?>


                        </div>
                    </div>

                </div>
            </div>

            
                        <div id="modal-box" class=" modal-bg">
                            <div class=" modal">
                                <div class="title">
                                    <h2>It's Menu Time</h2>
                                    <p>Surprise The Customer By Your Best Recipe</p>

                                </div>
                                <div id="modaldata" class="food-form">
                                    
                                        
                                <form action='admin_home.php' method='POST' enctype="multipart/form-data">
                                       <label for="Dish">Dish Name</label><br>
                                        <input type="text" name="dish" id="" ><br><br>
                                        <label for="photo">Dish Photo</label><br>
                                        <input type="file" name="photo" id="" ><br><br>
                                        <label for="type">Type</label><br>
                                        <select name="type" id="type" >
                                            <option value="1">Veg</option>
                                            <option value="2">Non-Veg</option>
                                        </select><br><br>
                                        <label for="category">Dish Category</label><br>
                                        <input type="text" name="category" id="" ><br><br>
                                        <label for="price">Price</label><br>
                                        <input type="text" name="price" id="" ><br><br><br>
                                        <input type="submit" class="form-btn" value="Submit">
                        </form>
                                </div>
                                <button class="m-btn toggle-btn" id="togg">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

            

                        <div id="edit-box" class=" modal-bg">
                            <div class=" modal">
                                <div class="title">
                                    <h2>Edit your Item</h2>


                                </div>
                                <div id="editdata" class="food-form">
                                    
                                        
                                
                                </div>
                                <button onclick="modalOff()" class=" toggle-btn" id="e-btn">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>




            <?php
            if (isset($_SESSION['owner_id'])) {
            ?>
                <script src="app.js"></script>
            <?php
            } else {
            ?>
                <script src="totalUser.js"></script>
            <?php
            }
            ?>

            <script src="modal.js"></script>

    </body>

    </html>

<?php
} else {
    header("Location:http://localhost/foody/admin_login.php");
}
?>