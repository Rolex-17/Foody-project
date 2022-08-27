<?php
session_start();
if (isset($_SESSION['id'])) {
  // if (isset($_POST['search'])) {
  //   echo $search = $_POST['value'];
  // } else {
  // }


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="search_style.css">
    <title>Document</title>

    <style>
      @media screen and (max-width:1400px),
     screen and (max-height:800px) {
      input[type="text"]{
        width: 80%;
      }
      #btn{
        right: 250px;
      }
      .search-box .fas{
        position: absolute;
        left: 880px;
      }

}
    </style>
  </head>

  <body>
    <div class="top-header">
      <h1>F<span id="color">oo</span>dy</h1>
    </div>

    <header>
      <nav>
        <ul class="links">
          <li><a href="./main/"><i class="fas fa-home">
                <p>Home</p>
              </i> </a></li>
          <li><a class="active-header" href="search.php"><i class="fas fa-search">
                <p>Search</p>
              </i> </a></li>
          <li><a href=""><i class="fas fa-shopping-cart">
                <p>Cart</p>
              </i> </a></li>
          <li><a id="account" href=""> <i class="fas fa-user">
                <p>Account</p>
              </i> </a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <div class="search-box">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

          <input type="text" name="search" id="search" onkeyup="show()" placeholder="Search food and resturant here">
          <input id="btn" type="submit" value="search">
          <i class="fas fa-search"></i>
        </form>
      </div>

      <div class="res">
        <h2>Result</h2>
      </div>

      <div id="result">

      </div>

      <!-- <div class="search-result">
        <a class='food-ta' href='http://localhost/foody/main/menu.php'> <article class='article-main'>
              <div class='article-img'><img src='images/index.png' alt='' class='article-recipe'></div>
            <div class='article-body'>
            <h3 class='article-heading'>habitute </h3>
            <p class='loc'><i class='fas fa-map-marker-alt'></i> shibam</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
          </div>
        </div>
        <div class="search-result">
        <a class='food-ta' href='http://localhost/foody/main/menu.php'> <article class='article-main'>
              <div class='article-img'><img src='images/index.png' alt='' class='article-recipe'></div>
            <div class='article-body'>
            <h3 class='article-heading'>habitute </h3>
            <p class='loc'><i class='fas fa-map-marker-alt'></i> shibam</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
          </div>
        </div>
        <div class="search-result">
        <a class='food-ta' href='http://localhost/foody/main/menu.php'> <article class='article-main'>
              <div class='article-img'><img src='images/index.png' alt='' class='article-recipe'></div>
            <div class='article-body'>
            <h3 class='article-heading'>habitute </h3>
            <p class='loc'><i class='fas fa-map-marker-alt'></i> shibam</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
          </div>
        </div> -->

      <div id="brand-off" class="brand-slider">
        <h2 class="brand-title">Popular Cuisines</h2>
        <div class="popular-brands">
          <ul>
            <li><a href=""><img class="brand-image" src="images/tandoori-chicken-tikka.jpg" alt="">
                <p>Starter</p>
              </a></li>
            <li><a href=""><img class="brand-image" src="images/instant-pot-tikka-masala-recipe-4589222-final-5c8feea2c9e77c0001eb1c8e.jpg" alt="">
                <p>Main </p>
              </a></li>
            <li><a href=""><img class="brand-image" src="images/rasgulla-indian-dessert.jpg" alt="">
                <p>Desert</p>
              </a></li>
            <li><a href=""><img class="brand-image" src="images/1_InlgltnGNwj7W93dJ_oQ_g.jpeg" alt="">
                <p>South Indian</p>
              </a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    <script src="search.js"></script>
  </body>

  </html>



<?php
} else {
}


?>