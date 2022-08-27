<?php
session_start();
if (isset($_SESSION['id'])) {
   require_once "../db/connect.inc.php";
   global $conn;
   $user = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>

    

    <style>
     

      @media screen and (max-width:1400px),
      screen and (max-height:800px) { 
          
           .nav-container{
             /* border: 1px solid red; */
             width: 800px;
             position: absolute;
             left: 280px;
           }
          .slider-btn{
             width: 60%;
             margin-left: 9em;
          }
          .secondery-links{
             /* border: 1px solid rgb(255, 0, 157); */
             height: 20%;
          }
          .offer-heading{
            margin: 0 .3rem;
          }
          .section{
            height: 32%;
            /* border: 1px solid red; */
           
          }
          .food-type h4{
            margin-bottom: .5rem;
          }
          .article-main{
            /* border: 1px solid black; */
            height: 80%;
          }
          
          .article-recipe{
            height: 180px;
          }

          .brand-slider{
            height: 36%;
            /* border: 1px solid red; */
          }
          .popular-brands{
            /* border: 1px solid black; */
            height: 60%;
            overflow: auto;
          }
          .popular-brands li{
            /* border: 1px solid red; */
            width: 140px;
            height: 110px;
            margin: .5rem 1rem;
          }
          .brand-image{
            width: 100%;
            height: 80%;
            
          }
          header{
            border: 1px solid blue;
          }
          .links{
            /* border: 1px solid red; */
            width: 40%;
            margin: 0.5em 0;
            margin-left: 15em;
          }
          /* .slide-side{
            width: 280px;
            left: 775px;
            top: -800px;
            /* transform: translateX(-100%); */
          /* }  */
          /* .slide-show{
            transform: translateX(110%);
          } */
    
}
    </style>
  </head>
  <body>
   
    <div class="navbar">
      <div class="nav-container">

        <div class="logo">
          <h2>F<span class="color">OO</span>DY</h2>
          <p>food that you never forget</p>
        </div>
        <ul>
          <li><a class="active" href="main.php">home</a></li>
          <li><a  href="../search.php">search</a></li>
          <li><a  href="../logout.php">log out</a></li>
        </ul>
      </div> 
      </div>
      <script src="activeLink.js"></script>

      <header>
        <nav>
          <ul class="links">
            <li><a class ="coco-link active-header" id="1" href="index.php" onclick="sho(1)"><i class="fas fa-home"><p>Home</p></i>  </a></li>
            <li><a class="coco-link" id="2" href="../search.php" ><i class="fas fa-search"><p>Search</p></i> </a></li> 
            <li><a class="coco-link" href="" id="3" ><i class="fas fa-shopping-cart"><p>Cart</p></i> </a></li>
            <li><a class="coco-link" id="account" href="" >
              <?php
               $user_query = "SELECT `user_img` FROM `user_table` WHERE `user_id` = $user ";
               $user_res = mysqli_query($conn,$user_query);
               $user_row = mysqli_fetch_assoc($user_res);

               if (mysqli_num_rows($user_res) == 0) {
                   echo "<i class='fas fa-user'><p>Account</p></i>";
               } else {
                   echo "<img src='../upload/{$user_row['user_img']}' alt=''>";
               }
               
              ?>
             </a></li>
          </ul>
        </nav>
      </header>
      

     

    <div class="whole-box">
      
      <main class="main-box">
        <div class="container">
          <!-- <div class="auto-slider">
            <h2>Auto</h2>
          </div> -->
          <div class="slider-container">
            <div class="slider">
              <img class="slider-img" src="../images/foodiesfeed.jpg" alt="" />
            </div>
            <div class="slider">
              <img class="slider-img" src="../images/chowmin.jpg" alt="" />
            </div>
            <div class="slider">
              <img class="slider-img" src="../images/kabab.jpg" alt="" />
            </div>
            <div class="slider">
              <img class="slider-img"" src="../images/tasty2.jpg" alt="" />
            </div>
          </div>

          <div class="slider-btn" >
            <button class="btn prev-btn"><i href="" class="fas fa-angle-double-left"></i></button>

            <div class="radio-btns">
              <input checked class="radio" type="radio" name="" id="1" />
              <input class="radio"  type="radio" name="" id="2" />
              <input class="radio"  type="radio" name="" id="3" />
              <input class="radio"  type="radio" name="" id="4" />
            </div>
            <button class="btn next-btn"><i href="" class="fas fa-angle-double-right"></i></button>
          </div>

          <div class="secondery-links">
            <ul>
              <li><a href=""><i class="fas fa-seedling"><p>veg only</p></i>
              </a></li>
              <li><a href=""><i class="fas fa-drumstick-bite"><p>non veg</p></i>
              </a></li>
              <li><a href=""><i class="fab fa-get-pocket"><p>pocket friendly</p></i>
              </a></li>
              <li><a href=""><i class="fas fa-medal"><p>top rated</p></i>
              </a></li>
              <li><a href=""><i class="fas fa-crown"><p>premium</p></i>
              </a></li>
              <li><a href=""><i class="fas fa-house-damage"><p>newly launch</p></i>
              </a></li>
              <li><a href=""><i class="fas fa-trophy"><p>best seller</p></i>
              </a></li>
              <li><a href=""><i class="fas fa-box-open"><p>mealbox</p></i>
              </a></li>
            </ul>
          </div>

        </div>
          
          
        <aside class="sidebar">
          <div class="trending-heading"><h3>Trending Foods</h3></div>
          <div class="trending-box">
            <div class="trending-title"> Lorem ipsum dolor sit amet</div>
            <div class="trending-img"><img src="../images/alex-munsell-Yr4n8O_3UPc-unsplash.jpg" alt=""></div>
          </div>

          <div class="trending-box">
            <div class="trending-title"> Lorem ipsum dolor sit amet</div>
            <div class="trending-img"><img src="../images/amirali-mirhashemian-ZSukCSw5VV4-unsplash.jpg" alt=""></div>
          </div>

          <div class="trending-box">
            <div class="trending-title"> Lorem ipsum dolor sit amet</div>
            <div class="trending-img"><img src="../images/monika-grabkowska-_y6A9bhILkM-unsplash.jpg" alt=""></div>
          </div>
          <div class="trending-box">
            <div class="trending-title"> Lorem ipsum dolor sit amet</div>
            <div class="trending-img"><img src="../images/vd-photography-TGLfKvgzyAQ-unsplash.jpg" alt=""></div>
          </div>
          <div class="trending-box">
            <div class="trending-title"> Lorem ipsum dolor sit amet</div>
            <div class="trending-img"><img src="../images/pexels-marvin-ozz-2474658.jpg" alt=""></div>
          </div>
        </aside>
      </main>

       <!-- <div class="secondery-links">
        <ul>
          <li><a href=""><i class="fas fa-seedling"><p>veg only</p></i>
          </a></li>
          <li><a href=""><i class="fas fa-drumstick-bite"><p>non veg</p></i>
          </a></li>
          <li><a href=""><i class="fab fa-get-pocket"><p>pocket friendly</p></i>
          </a></li>
          <li><a href=""><i class="fas fa-medal"><p>top rated</p></i>
          </a></li>
          <li><a href=""><i class="fas fa-crown"><p>premium</p></i>
          </a></li>
          <li><a href=""><i class="fas fa-house-damage"><p>newly launch</p></i>
          </a></li>
          <li><a href=""><i class="fas fa-trophy"><p>best seller</p></i>
          </a></li>
          <li><a href=""><i class="fas fa-box-open"><p>mealbox</p></i>
          </a></li>
        </ul>
      </div>
     -->
     <div class="offer-parent">
       <div class="offers-heading">
        <h2>offers</h2>
      </div>
        <div class="offers-container">
          
          <div class="offers-box"><img src="../images/offer1jpg.jpg" alt="" class="offers"></div>
          <div class="offers-box"><img src="../images/offer2jpg.jpg" alt="" class="offers"></div>
          <div class="offers-box"><img src="../images/offer3jpg.jpg" alt="" class="offers"></div>
         
          <div class="offers-box"><img src="../images/offer4jpg.jpg" alt="" class="offers"></div>
          <div class="offers-box"><img src="../images/offer5jpg.jpg" alt="" class="offers"></div>
           
          <div class="offers-box"><img src="../images/offer6jpg.jpg" alt="" class="offers"></div>
          <div class="offers-box"><img src="../images/offer8jpg.jpg" alt="" class="offers"></div>
          <div class="offers-box"><img src="../images/offer9jpg.jpg" alt="" class="offers"></div>
        </div>
     </div>

     <div class="food-type">
       <h4>all resturant</h4>
     </div>

     <?php
        $query = "SELECT * FROM `resownwer_table` LEFT JOIN `foodlist` ON owner_id = ownerId ORDER BY `owner_id` ASC";
        $result = mysqli_query($conn,$query);
        
        $a=1;
        $s=0;
        $all = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        // print_r($all);
        // echo $all[0]['dish_img'];
        while ($a <=2) {
          $i=1;
        $output="<section class='section section1'>";
        while ($i <= 2) {
          
            $output.="<a class='food-ta' href='http://localhost/foody/main/menu.php?rid={$all[$s]['owner_id']}&fid={$all[$s]['foodid']}'> <article class='article-main'>
              <div class='article-img'><img src='../upload/{$all[$s]['res_img']}' alt='' class='article-recipe'></div>
            <div class='article-body'>
            <h3 class='article-heading'>{$all[$s]['owner_resname']} </h3>
            <p class='loc'><i class='fas fa-map-marker-alt'></i> {$all[$s]['owner_address']}</p>
            <p>{$all[$s]['owner_description']}</p>
          </div>
          
          </article>
          </a>";
          $i++;
          $s++;
         
        }
        $output.="</section>";
        echo $output;
        $a++;
        }

      ?>
      
<!--
      <section class="section section1">
        <article class="article-main">
          <div class="article-img"><img src="../images/alex-munsell-Yr4n8O_3UPc-unsplash.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus! Lorem ipsum dolor, sit amet fugit d</p>
              
          </div>
        </article>

        <article class="article-main">
          <div class="article-img"><img src="../images/pexels-ahmad-no-more-7592749.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus!Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>
      </section>
 
      <section class="section section2">
        
        <article class="article-main">
          <div class="article-img"><img src="../images/pexels-engin-akyurt-1437267.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus!Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>

        
        <article class="article-main">
          <div class="article-img"><img src="../images/amirali-mirhashemian-ZSukCSw5VV4-unsplash.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibusLorem ipsum dolor, sit amet fugit d!</p>
           
          </div>
        </article>
      </section> 
       -->

      <div class="brand-slider">
        <h2 class="brand-title">Popular Brands</h2>
        <div class="popular-brands">
          <ul>
            <li><a href=""><img class="brand-image" src="../images/8cc11a5339c7d07aa34a74427c63c8cf.webp" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/1753-768x591.png" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/images.png" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/good-food-logo-template_79169-17.jpg" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/logo-concepts7.jpg" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/unnamed.png" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/burger-sandwich-logo-design-for-brand-label-food-vector-35029953.jpg" alt=""><p>eggly</p></a></li>
          </ul>
        </div>
      </div>

      <div class="food-type">
        <h4>premium</h4>
      </div>
      <?php
        $query = "SELECT * FROM `resownwer_table` LEFT JOIN `foodlist` ON owner_id = ownerId ORDER BY `owner_id` ASC";
        $result = mysqli_query($conn,$query);
        
        $a=1;
        $s=0;
        $all = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        // print_r($all);
        // echo $all[0]['dish_img'];
        while ($a <=2) {
          $i=1;
        $output="<section class='section section1'>";
        while ($i <= 2) {
          
            $output.="<a class='food-ta' href='http://localhost/foody/main/menu.php?rid={$all[$s]['owner_id']}&fid={$all[$s]['foodid']}'> <article class='article-main'>
              <div class='article-img'><img src='../images/{$all[$s]['dish_img']}' alt='' class='article-recipe'></div>
            <div class='article-body'>
            <h3 class='article-heading'>{$all[$s]['owner_resname']} </h3>
            <p class='loc'><i class='fas fa-map-marker-alt'></i> {$all[$s]['owner_address']}</p>
            <p>{$all[$s]['owner_description']}</p>
          </div>
          
          </article>
          </a>";
          $i++;
          $s++;
         
        }
        $output.="</section>";
        echo $output;
        $a++;
        }

      ?>
      <!--
      <section class="section section1">
        <article class="article-main">
          <div class="article-img"><img src="../images/alex-munsell-Yr4n8O_3UPc-unsplash.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus! Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>

        <article class="article-main">
          <div class="article-img"><img src="../images/pexels-ahmad-no-more-7592749.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus!Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>
      </section>

      <section class="section section2">
        
        <article class="article-main">
          <div class="article-img"><img src="../images/pexels-engin-akyurt-1437267.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus!Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>

        <article class="article-main">
          <div class="article-img"><img src="../images/amirali-mirhashemian-ZSukCSw5VV4-unsplash.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibusLorem ipsum dolor, sit amet fugit d!</p>
           
          </div>
        </article>
      </section> 
      -->
      <div class="brand-slider">
        <h2 class="brand-title">People's Choice</h2>
        <div class="popular-brands">
          <ul>
            <li><a href=""><img class="brand-image" src="../images/8cc11a5339c7d07aa34a74427c63c8cf.webp" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/1753-768x591.png" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/images.png" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/good-food-logo-template_79169-17.jpg" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/logo-concepts7.jpg" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/unnamed.png" alt=""><p>eggly</p></a></li>
            <li><a href=""><img class="brand-image" src="../images/burger-sandwich-logo-design-for-brand-label-food-vector-35029953.jpg" alt=""><p>eggly</p></a></li>
          </ul>
        </div>
      </div>

      <div class="food-type">
        <h4>veg/nonveg</h4>
      </div>

      <?php
       $query = "SELECT * FROM `foodlist` LEFT JOIN `food_type` ON dishtype = id ORDER BY `foodid` DESC";
       $result = mysqli_query($conn,$query);
       
       $a=1;
       $s=0;
       $all = mysqli_fetch_all($result,MYSQLI_ASSOC);
       
       // print_r($all);
       // echo $all[0]['dishtype'];
       while ($a <=2) {
         $i=1;
       $output="<section class='section section1'>";
       while ($i <= 2) {
           $output.="
           <a class='food-ta' href='http://localhost/foody/main/menu.php?rid={$all[$s]['ownerId']}&fid={$all[$s]['foodid']}'> <article class='article-main'>
             <div class='article-img'><img src='../images/{$all[$s]['dish_img']}' alt='' class='article-recipe'></div>
           <div class='article-body'>
           <h3 class='article-heading'>{$all[$s]['dishname']} </h3>
           <p class='loc'>{$all[$s]['dishcategory']},{$all[$s]['type']}</p>
           <p class='rupee'><i class='fas fa-rupee-sign'></i> {$all[$s]['dishprice']}</p>
         </div>
         </article>
         </a>";
         $i++;
         $s++;
        
       }
       $output.="</section>";
       echo $output;
       $a++;
       }

      ?>
      <!--
      <section class="section section1">
        <article class="article-main">
          <div class="article-img"><img src="../images/alex-munsell-Yr4n8O_3UPc-unsplash.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus! Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>

        <article class="article-main">
          <div class="article-img"><img src="../images/pexels-ahmad-no-more-7592749.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus!Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>
      </section>

      <section class="section section2">
        
        <article class="article-main">
          <div class="article-img"><img src="../images/pexels-engin-akyurt-1437267.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibus!Lorem ipsum dolor, sit amet fugit d</p>
          </div>
        </article>

        <article class="article-main">
          <div class="article-img"><img src="../images/amirali-mirhashemian-ZSukCSw5VV4-unsplash.jpg" alt="" class="article-recipe"></div>
          <div class="article-body">
            <h3 class="article-heading">Lorem ipsum dolor sit amet consectetur </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              corporis minima itaque deserunt necessitatibusLorem ipsum dolor, sit amet fugit d!</p>
           
          </div>
        </article>
      </section> 
-->
      <div class="space">

      </div>
      
    </div>

    <div id="slide" class="slide-side">
      <div class="slideside-container">
        <div class="slideside-header">
         <h2>F<span class="color">OO</span>DY</h2>
          <i class="fas fa-shopping-cart"></i>
        </div>

        

        <div class="slideside-profile">
        <?php
               $user_query = "SELECT `user_img`,`user_fullname`,`user_email` FROM `user_table` WHERE `user_id` = $user ";
               $user_res = mysqli_query($conn,$user_query);
               $user_row = mysqli_fetch_assoc($user_res);

               
               ?>
          <a href="">
          <div class="profile-photo">
            <?php
            if (mysqli_num_rows($user_res) == 0) {

            ?>
              <i class="fas fa-user"></i>
              <?php
            } else {
              echo "<img src='../upload/{$user_row['user_img']}' alt=''>";
          }
              ?>
            </div>
          </a>
          
          <p id="username" style="text-transform: capitalize;"><?php echo $user_row['user_fullname']  ?></p>
          <p id="useremail " ><?php echo $user_row['user_email']  ?></p>
        </div>

        <div class="slideside-box">
          <ul>
            <li><a href="">About Us <i class="fas fa-angle-double-right"></i></a></li>
            <li><a href="../admin/">Admin <i class="fas fa-angle-double-right"></i></a></li>
            <li><a href="">Our Plans <i class="fas fa-angle-double-right"></i></a></li>
            <li><a href="">Setting <i class="fas fa-angle-double-right"></i></a></li>
          </ul>
        </div>

        <div class="slideside-footer">
          <a class="slideside-logo" href="">
            <i class="fas fa-power-off"></i>
            log out
          </a>
          
        </div>
        <!-- <script src="slideshow.js"></script> -->
      </div>
      <script src="car.js"></script>
    </div>
    <script>
      var ac = document.getElementById('account');
      var slideShow = document.getElementById('slide');
       ac.addEventListener('click',function (e){
       
         e.preventDefault();
         console.log(screen.width);
         if (screen.width <= 1400 || screen.height <= 800 ) {
            console.log(screen.width);
            if (slideShow.classList.contains('slide-show')) {
              slideShow.classList.remove('slide-show');
            } else {
            slideShow.classList.add('.slide-show');
              }
          } else {
            if (slideShow.classList.contains('show-slideside')) {
              slideShow.classList.remove('show-slideside');
            } else {
            slideShow.classList.add('.show-slideside');
              }
          }
       })

        // function showSlide(){
        //   
        //   console.log('hi')
        //  
        // }
      </script>
  </body>
</html>


<?php
} else {
   header("Location:http://localhost/foody/");
}
?>