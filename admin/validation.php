<?php
session_start();
require_once "../db/connect.inc.php";
global $conn;
// or isset($_SESSION['admin_id'])
if (isset($_SESSION['owner_id'])  ) {
    $user = $_SESSION['owner_id'];
     if (isset($_POST['val']) && isset($_POST['method']) ) {

        
       $value = $_POST['val'];
       $method = $_POST['method'];
       $i =0;
       if ($method == 'page' || $method== 'show') {
        $limit = 8;
        $offset = ($value-1)*$limit;

        $query = "SELECT*FROM `foodlist` WHERE ownerId = $user LIMIT $offset,$limit";
        $result = mysqli_query($conn,$query);
       
        $output  ='';
        if (mysqli_num_rows($result) != 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            ++$i;
           $output.= "<tr>
           <td>{$row['foodid']}</td>
           <td>{$row['dishname']}</td>
           <td>{$row['dishtype']}</td>
           <td>{$row['dishcategory']}</td>
           <td>{$row['dishprice']}</td>
           <td><button id ='{$row['foodid']}' class='ed-btn e-btn btn-d' onclick=' edit({$row['foodid']},`edit`)'>Edit</button></td>
           <td><button id ='{$row['foodid']}' class='e-btn btn-d' onclick='deleto({$row['foodid']},`delete`)'>Delete</button></td>
       </tr>";
        }
    } else {
           $output.="<div class='no-box'>
           <h3>Hey you have not added anything,Add some food</h3>
       </div>"; 
    }
        echo $output;

       } else if ($method == 'delete') {

        $query3 = "DELETE FROM `foodlist` WHERE ownerId= $user AND foodid = $value";
        $result3 = mysqli_query($conn,$query3);

        if ($result3) {

        }
       } else if($method == 'edit'){
        $edit_query = "SELECT*FROM `foodlist` WHERE foodid = $value AND ownerId = $user";
        $edit_result = mysqli_query($conn, $edit_query);

        if ($edit_result) {
            $edit_outpu = "<form action='admin_home.php 'method='post'>";

            while ($edit_row = mysqli_fetch_assoc($edit_result)) {
               $edit_outpu.="<label for='Dish'>Dish Id</label><br>
               <input type='text' name='' id='edit-id' value= '{$edit_row['foodid']}'><br><br>
                <label for='Dish'>Dish Name</label><br>
               <input type='text' name='' id='edit-name' value= '{$edit_row['dishname']}'><br><br>
               <label for='type'>Type</label>
               <select name='' id='edit-type' value='{$edit_row['dishtype']}'>
                   <option value='1'>Veg</option>
                   <option value='2'>Non-Veg</option>
               </select><br><br>
               <label for='category'>Dish Category</label><br>
               <input type='text' name='' id='edit-category' value='{$edit_row['dishcategory']}'><br><br>
               <label for='price'>Price</label><br>
               <input type='text' name='' class='' id='edit-price' value='{$edit_row['dishprice']}'><br><br><br>
               
               <input onclick='event.preventDefault(); update()' type='submit' class='form-btn' value='Submit'>  ";
            }
            $edit_outpu.="</form>";
         }
         //ed-btn btn-d
         echo $edit_outpu;

      } elseif ($method == 'search') {
        $search_query = "SELECT*FROM `foodlist` WHERE ownerId = $user AND dishname LIKE '%$value%'";
        $search_result = mysqli_query($conn, $search_query);

        if (mysqli_num_rows($search_result) > 0) {
            $i =0;
        $output  ='';
        while ($row = mysqli_fetch_assoc($search_result)) {
            ++$i;
           $output.= "<tr>
           <td>{$i}</td>
           <td>{$row['dishname']}</td>
           <td>{$row['dishtype']}</td>
           <td>{$row['dishcategory']}</td>
           <td>{$row['dishprice']}</td>
           <td><button id ='{$row['foodid']}' class='ed-btn e-btn btn-d' onclick=' edit({$row['foodid']},`edit`)'>Edit</button></td>
           <td><button id ='{$row['foodid']}' class='e-btn btn-d' onclick='deleto({$row['foodid']},`delete`)'>Delete</button></td>
       </tr>";
        }
        echo $output;
        } else {
            echo "<h3>Ooops!! Nothing Found </h3>";
        }
        
      }

    } else if(isset($_POST['id']) &&isset($_POST['name']) && isset($_POST['type']) && isset($_POST['category']) && isset($_POST['price'])){
        echo $id = $_POST['id'];
       echo $name = $_POST['name'];
       echo $type = $_POST['type'];
       echo $category = $_POST['category'];
       echo $price = $_POST['price'];
       
       $update_query = "UPDATE `foodlist` SET `dishname`='{$name}',`dishtype`='{$type}',`dishcategory`='{$category}',`dishprice`='{$price}' WHERE foodid = $id AND ownerId = $user";
       $update_result = mysqli_query($conn, $update_query);

       if ($update_result) {
           
       } else {
           echo mysqli_error($conn);
       }
       

     }


} else {
    header("Location:http://localhost/foody/admin/");
}
