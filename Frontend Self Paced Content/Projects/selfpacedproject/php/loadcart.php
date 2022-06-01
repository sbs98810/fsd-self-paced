<?php
include 'dbconnection.php';
$myCartItem = new stdClass();
if (isset($_POST["cardId"])) {
    $cartID = intval($_POST['cardId']);
}
$select_cart_sql_query = "SELECT * FROM `cart_item_details` WHERE `cart_id`=\"$cartID\"";
$result = mysqli_query($conn, $select_cart_sql_query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $myCartItem->cart_id = $row["cart_id"];
        $myCartItem->product_name_1 = $row["product_name_1"];
        $myCartItem->product_price_1 = $row["product_price_1"];
        $myCartItem->product_name_2 = $row["product_name_2"];
        $myCartItem->product_price_2 = $row["product_price_2"];
        $myCartItem->product_name_3 = $row["product_name_3"];
        $myCartItem->product_price_3 = $row["product_price_3"];
        $myCartItem->date_of_order = $row["date_of_order"];
    }
}
/*else {
   echo "No Cart information available.Try Again" ;
}*/

$cartJSON = json_encode($myCartItem);
echo $cartJSON;
?>
