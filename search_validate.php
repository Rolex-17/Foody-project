<?php
session_start();
if (isset($_SESSION['id'])) {
    require_once 'db/connect.inc.php';
    $conn;

if (isset($_POST['value'])) {
     $search = $_POST['value'];
     $output="";
     
     $search_query = "SELECT `owner_id`,`foodid`,`owner_resname`, `dishname`,`owner_address`,`dish_img`,`owner_description` FROM `resownwer_table`  JOIN `foodlist` ON ownerId = owner_id WHERE owner_resname  LIKE '%{$search}%' OR dishname LIKE '%{$search}%'";
     $search_res = mysqli_query($conn,$search_query);
      
     if (mysqli_num_rows($search_res) >0) {
        //  $all = mysqli_fetch_all($search_res,MYSQLI_ASSOC);
        //  print_r($all);
       
        while ($search_row = mysqli_fetch_assoc($search_res)) {
            $output.="<div class='search-result'>
            <a class='food-ta' href='http://localhost/foody/main/menu.php?rid={$search_row['owner_id']}&fid={$search_row['foodid']}'>
             <article class='article-main'>
                  <div class='article-img'>
                  <img src='images/{$search_row['dish_img']}' alt='' class='article-recipe'>
                  </div>
                <div class='article-body'>
                <h3 class='article-heading'>{$search_row['owner_resname']} </h3>
                <p class='loc'><i class='fas fa-map-marker-alt'></i> {$search_row['owner_address']}</p>
                <p>{$search_row['owner_description']}</p>
              </div>
              </article>
              </a>
            </div>";
        }
        echo $output;
     } else{
       $output.= "<h3 class='no'>Ooops!! Not Found</h3>";
       echo $output;
     }
     
 } 
}else{

 }

?>