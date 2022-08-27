<?php
session_start();
if (isset($_SESSION['id'])) {
    require_once "../db/connect.inc.php";
    global $conn;  


if (!empty($_SESSION['shopping_cart'])) {
 $price =45.50;

 if (isset($_GET['fid']) && isset($_GET['rid'])) {
    $rid = $_GET['rid'];
   $fid = $_GET['fid'];
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="final_order.css">
    <title>Document</title>
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
               <a href="item_sessionOff.php"> <i class="fas fa-trash-alt"> Remove Item</i></a>
            </div>
        </div>
        <div class="rupees">
            <h3><i class="fas fa-percentage"> Apply Coupon</i></h3>
        </div>
    </header>

    <div class="box">
        <h2>Bill Box</h2>
        <div class="bill-box">
            <div class="bill">

            <?php
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    
            ?>
               <p><?php echo $value['item_name']." * "?><span class="cl"><?php echo $value['item_quantity']  ?></span></p>
               <?php
                }
                ?>
                <p>Delivery Partner Fee</p>
                <p>Taxes & Charges</p>
            </div>
            <div class="bill-rupee">
            <?php
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    $item_price = $value['item_price']*$value['item_quantity'];
                   $price+=$value['item_price'];
            ?>
                <p><i class="fas fa-rupee-sign"></i> <?php echo $item_price ?></p>
            
            <?php
                }
                
                ?>
                <p><i class="fas fa-rupee-sign"></i> 30</p>
                <p><i class="fas fa-rupee-sign"></i> 15.5</p>
                </div>
        </div>

        <div class="bill-box2">
            <h3>To Pay</h3>
            <h3><i class="fas fa-rupee-sign"></i> <?php echo $price  ?></h3>
        </div>
    </div>

    <div class="order">
        <a href="">Place Your Order</a>
    </div>
    
</body>
</html>
<?php
} else {
                
}
}else{
    header("Location:http://localhost/foody/");
}
?>