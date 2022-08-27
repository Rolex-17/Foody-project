<?php
session_start();
$ar = array();
$count;
if (isset($_SESSION['id'])) {
   require_once "../db/connect.inc.php";
   global $conn;
   
    
   if (isset($_GET['fid']) && isset($_GET['rid'])) {
        $rid = $_GET['rid'];
       $fid = $_GET['fid'];
   } 

   if (isset($_GET['sid']) &&isset($_POST['quantity']) && isset($_POST['foodname']) && isset($_POST['price']) ) {

       $sid = $_GET['sid'];

       if (isset($_SESSION['shopping_cart'])) {
            $item_array_id = array_column($_SESSION['shopping_cart'],'item_id');
            if (!in_array($sid,$item_array_id)) {
                $count = count($_SESSION['shopping_cart']);

                $item_aray = array(
                    'item_id'=>$sid,
                    'item_quantity' =>$_POST['quantity'],
                    'item_name' =>$_POST['foodname'],
                    'item_price' =>$_POST['price']
                );
                $_SESSION['shopping_cart'][$count] = $item_aray;
                // print_r($item_aray);
            }
             else {
                echo "<h2>item already added</h2>";
            }
            

       } else {
           $item_aray = array(
               'item_id'=>$sid,
               'item_quantity' =>$_POST['quantity'],
               'item_name' =>$_POST['foodname'],
               'item_price' =>$_POST['price']
           );
           $_SESSION['shopping_cart'][0] = $item_aray;
        //    print_r($item_aray);
       }
  
   } 
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="menu_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header-box{
            z-index: 99;
            background: rgba(255,255,255,0.9);
        }
        
        @media screen and (max-width:1400px),
      screen and (max-height:800px) {
          .men a{
              left: 600px;
          }
          header{
              /* border: 1px solid black; */
              width: 60%;
          }
      }

    </style>
</head>
<body>
    <div class="top-header">
        <h1>F<span id="color">oo</span>dy</h1>
    </div>

    <header>
        
        <div class="title-header">
            <div class="title">
               <?php
               $foo_query = "SELECT * FROM `resownwer_table` WHERE owner_id=$rid ";
               $foo_result = mysqli_query($conn,$foo_query);
               
                while ($foo_row = mysqli_fetch_assoc($foo_result)) {
                    
               ?>
                <h3><?php echo$foo_row['owner_resname']   ?></h3>
                <p><?php echo$foo_row['owner_resname']   ?></p>
                <p><?php echo$foo_row['owner_address']   ?></p>
                <?php
                     }

                ?>
            </div>
            <div class="rating">
                <i class="fas fa-star">Ratings</i>
            </div>
        </div>
        <div class="cartel">

            <div class="rupees">
                <h3><i class="fas fa-clock">30 mins</i></h3>
                <h3><i class="fas fa-rupee-sign">200 off</i></h3>
            </div>
            <a href="final_order.php?fid=<?php echo $fid ?>&rid=<?php echo $rid ?>" id="menu-cartbtn" class="off-cart" id="on-cart"><i class="fas fa-shopping-cart"> </i> Go To Cart</a>
        </div>
    </header>

    <div class='header-box'>
        <nav>
          <ul class="links">
            <li><a class ="active-header" href="index.php"><i class="fas fa-home"><p>Home</p></i>  </a></li>
            <li><a href="../search.php"><i class="fas fa-search"><p>Search</p></i> </a></li>
            <li><a href="final_order.php?fid=<?php echo $fid ?>&rid=<?php echo $rid ?>" class="" id="cart-color"><i class="fas fa-shopping-cart"><p>Cart <span id="cart-log">
            <?php
             if (!empty($_SESSION['shopping_cart'])) {
                 foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    array_push($ar,$value['item_id']);
                     }
                     
                     echo sizeof($ar);
             } else {
                 echo '';
             }
                
               ?>
            </span></p></i> </a></li>
            <li><a id="account" href=""> <i class="fas fa-user"><p>Account</p></i> </a></li>
          </ul>
        </nav>
      </div>
     
    <div class="container">
        <div class="container-heading">
            <h2>Foods</h2>
        </div>
        <?php
        $li_query = "SELECT * FROM `foodlist` WHERE ownerId=$rid ";
        $li_result = mysqli_query($conn,$li_query);
        $li_totalrow = mysqli_num_rows($li_result);
          if (mysqli_num_rows($li_result) >0) {
              while ($li_row = mysqli_fetch_assoc($li_result)) {
        ?>
         <section class="box">
              <div class="box1">
                  <h3><?php echo $li_row['dishname']  ?></h3>
                  <h4><i class="fas fa-rupee-sign"><?php echo $li_row['dishprice']  ?></i></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae. Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                  <!-- <a href="" onclick="event.preventDefault(); load()">Add to cart</a> -->
                  <div class="all-btn">

                      <div class="atcart-btn">
                          <div class="atcart-text">
                          <a href="" id="<?php echo $li_row['foodid'] ?>" onclick="event.preventDefault(); load(<?php echo $li_row['foodid'] ?>)">Add to cart</a>
                          </div>
                          <div id="atc-<?php echo $li_row['foodid'] ?>"  class="atcart-sign cart-display">
                              <button onclick="decrease(<?php echo $li_row['foodid'] ?>)" class="at-btn">-</button>
                              <div id="cart-<?php echo $li_row['foodid'] ?>" class="cart"></div>
                              <button onclick="increase(<?php echo $li_row['foodid'] ?>)" class="at-btn">+</button>
                          </div>
                      </div>
                      
                      <div class="form-submit">
                          <form action="menu.php?fid=<?php echo $fid ?>&rid=<?php echo $rid ?>&sid=<?php echo $li_row['foodid']   ?>" method="POST">
                              <input type="text" name="quantity" id="quan-<?php echo $li_row['foodid'] ?>" value="1" hidden>
                              <input type="text" name="foodname" id="" value="<?php echo $li_row['dishname']  ?>" hidden>
                              <input type="text" name="price" id="" value="<?php echo $li_row['dishprice']   ?>" hidden>
                              <input id="at<?php echo $li_row['foodid'] ?>" class="cart-display" type="submit" value="Add To Cart">
                          </form>
                      </div>
                  </div>
                  </div>
              <div class="box2">
                  <img src="../images/<?php echo $li_row['dish_img']  ?>" alt="">
              </div>
         </section>
         <?php
           }
           
         } else {
             echo mysqli_error($conn);
            echo "<h3>oops!! Resturant Hasn't Added Any food yet</h3>";
        }

         ?>

         <!-- <section class="box">
            <div class="box1">
                <h3>Chicken tikka</h3>
                <h4><i class="fas fa-rupee-sign"></i></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae. Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                <a href="">Add to cart</a>
            </div>
            <div class="box2">
                <img src="../images/pexels-dana-tentis-262959.jpg" alt="">
            </div>
       </section>
       <section class="box">
        <div class="box1">
            <h3>Chicken tikka</h3>
            <h4><i class="fas fa-rupee-sign"></i></h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae. Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            <a href="">Add to cart</a>
        </div>
        <div class="box2">
            <img src="../images/pexels-engin-akyurt-1437267.jpg" alt="">
        </div>
   </section> -->
  <!-- <form action="">
      <input type="text" name="" id="">
      <input type="text" name="" id="">
      <button>
          <i class="fas fa-shopping-cart"></i>
      </button>
  </form> -->

         
</div>
<div class="men">
   <a href=""> <i class="fas fa-utensils"></i>Browse menu</a>
</div>
<div class="space">

</div>
<script src="menuload.js"></script>

</body>
</html>
<?php
} else {
   header("Location:http://localhost/foody/");
}
?>