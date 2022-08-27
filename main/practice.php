<?php
include "../db/connect.inc.php";
global $conn;

$query = "SELECT * FROM `resownwer_table`";
$result = mysqli_query($conn,$query);
$i=0;
$all = mysqli_fetch_all($result,MYSQLI_ASSOC);

print_r($all);
// echo $all[0]['dishtype'];
$output="<section class='section section1'>
<article class='article-main'>
  <div class='article-img'><img src='../images/alex-munsell-Yr4n8O_3UPc-unsplash.jpg' alt='' class='article-recipe'></div>";
while ($i < 4) {
    $output.="<div class='article-body'>
    <h3 class='article-heading'>{$all[0]['owner_resname']} </h3>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
      corporis minima itaque deserunt necessitatibus! Lorem ipsum dolor, sit amet fugit d</p>
      <p>{$all[0]['owner_address']}</p>
  </div>";
  $i++;
}
$output.="</article>";
echo $output;

?>