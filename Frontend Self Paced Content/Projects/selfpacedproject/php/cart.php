<?php
include 'dbconnection.php';
$isCartAdded = false;
if(isset($_POST["cart"])){
    $cart = $_POST['cart'];
    $cartProductNameList = array_column($cart, 'productName');
    $cartProductPriceList = array_column($cart, 'productPrice');
}
$cart_id = rand(100, 999);
$cart_insert_sql = "INSERT INTO `cart_item_details`(`cart_id`, `product_name_1`, `product_price_1`, `product_name_2`, `product_price_2`, `product_name_3`, `product_price_3`) VALUES (\"$cart_id\",\"$cartProductNameList[0]\",\"$cartProductPriceList[0]\",\"$cartProductNameList[1]\",\"$cartProductPriceList[1]\",\"$cartProductNameList[2]\",\"$cartProductPriceList[2]\")";
$inserted_cart_result = mysqli_query($conn,$cart_insert_sql);
if($inserted_cart_result === TRUE){
  $isCartAdded= true;
}else{
  $isCartAdded=false;
}
echo json_encode($cart_id);
?>