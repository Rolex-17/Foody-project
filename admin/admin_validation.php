<?php
session_start();
// echo "hii";
if (isset($_SESSION['admin_id'])) {
    $user = $_SESSION['admin_id'];
    require_once "../db/connect.inc.php";
    global $conn;

    // echo "hii";

    if (isset($_POST['v']) && isset($_POST['m']) && isset($_POST['table'])) {
        $value = $_POST['v'];
        $method = $_POST['m'];
        $table = $_POST['table'];
       

        $limit = 8;
        $offset =($value-1)*$limit ;

        if ($method == 'user' ) {
            $user_query = "SELECT*FROM `user_table` LIMIT $offset,$limit";
            $user_result = mysqli_query($conn,$user_query);

            if (mysqli_num_rows($user_result) >0) {
               $user_table= " <thead>
                <th>Id</th>
                <th>first Name</th>
                <th>last name</th>
                <th>user email</th>
                <th>user password</th>
                <th>Edit</th>
                <th>Delete</th>
               </thead> 
                <tbody>";
                while($user_row = mysqli_fetch_assoc($user_result)){
                    $user_table.="<tr>
                    <td>{$user_row['user_id']}</td>
                    <td>{$user_row['user_fullname']}</td>
                    <td>{$user_row['user_username']}</td>
                    <td>{$user_row['user_email']}</td>
                    <td>{$user_row['user_password']}</td>
                    <td><button id ='{$user_row['user_id']}' class='ed-btn e-btn btn-d' onclick='edit({$user_row['user_id']},`edit`,`{$method}`)'>Edit</button></td>
                    <td><button id ='{$user_row['user_id']}' class='e-btn btn-d' onclick='deleto({$user_row['user_id']},`delete`,`{$method}`)'>Delete</button></td>
                </tr>";
                }
                $user_table.="</tbody>";

                
            } 
            echo $user_table;
    
        } 
   
        elseif ($method == 'resowner') {

            $owner_query = "SELECT*FROM `resownwer_table` LIMIT $offset,$limit";
            $owner_result = mysqli_query($conn,$owner_query);

            if (mysqli_num_rows($owner_result) >0) {
                $admin_table= " <thead>
                <th>Id</th>
                <th>first Name</th>
                <th>last name</th>
                <th>res name</th>
                <th>city</th>
                <th>owner email</th>
                <th>owner password</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody> ";
                while($admin_row = mysqli_fetch_assoc($owner_result)){
                    $admin_table.="<tr>
                    <td>{$admin_row['owner_id']}</td>
                    <td>{$admin_row['owner_firstname']}</td>
                    <td>{$admin_row['owner_lastname']}</td>
                    <td>{$admin_row['owner_resname']}</td>
                    <td>{$admin_row['owner_city']}</td>
                    <td>{$admin_row['owner_userid']}</td>
                    <td>{$admin_row['owner_password']}</td>
                    <td><button id ='{$admin_row['owner_id']}' class='ed-btn e-btn btn-d' onclick='edit({$admin_row['owner_id']},`edit`,`{$method}`)'>Edit</button></td>
                    <td><button id ='{$admin_row['owner_id']}' class='e-btn btn-d' onclick='deleto({$admin_row['owner_id']},`delete`,`{$method}`)'>Delete</button></td>
                </tr>";
                }
                $admin_table.="</tbody>";
            } else {
                echo mysqli_error($conn);
            }
            echo $admin_table;

        } elseif ($method == 'delete') {

            if ( $table == 'resowner') {
                $query3 = "DELETE FROM `resownwer_table` WHERE  `owner_id` = $value";
                $result3 = mysqli_query($conn,$query3);
        
                if ($result3) {
        
                }
                   
            } elseif ($table == 'user') {
                $query3 = "DELETE FROM `user_table` WHERE `user_id` = $value";
                $result3 = mysqli_query($conn,$query3);
        
                if ($result3) {
        
                }
            } else {
                $query3 = "DELETE FROM `foodlist` WHERE `foodid` = $value";
                $result3 = mysqli_query($conn,$query3);
        
                if ($result3) {
        
                }
            }
            


        // } elseif () {
            
        }
        else {
            $food_query = "SELECT*FROM `foodlist` LIMIT $offset,$limit";
            $food_result = mysqli_query($conn,$food_query);

            if (mysqli_num_rows($food_result) >0) {
                $food_table= " <thead>
                <th>Id</th>
                <th>owner</th>
                <th>dish name</th>
                <th>type</th>
                <th>category</th>
                <th>price</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody> ";
                while($food_row = mysqli_fetch_assoc($food_result)){
                    $food_table.="<tr>
                    <td>{$food_row['foodid']}</td>
                    <td>{$food_row['ownerId']}</td>
                    <td>{$food_row['dishname']}</td>
                    <td>{$food_row['dishtype']}</td>
                    <td>{$food_row['dishcategory']}</td>
                    <td>{$food_row['dishprice']}</td>
                    <td><button id ='{$food_row['foodid']}' class='ed-btn e-btn btn-d' onclick='edit({$food_row['foodid']},`edit`,`{$method}`)'>Edit</button></td>
                    <td><button id ='{$food_row['foodid']}' class='e-btn btn-d' onclick='deleto({$food_row['foodid']},`delete`,`{$method}`)'>Delete</button></td>
                </tr>";
                }
                $food_table.="</tbody>";
            }  
            echo $food_table;
        }
    } 
}


?>