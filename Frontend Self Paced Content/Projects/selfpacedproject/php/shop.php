<?php
include 'dbconnection.php';
//$myProductObjectList = new stdClass();
$ProductArray =[];
$category_id_value = 301;
//SELECT * FROM `product_details` WHERE `category_id`
$query = "SELECT * FROM `product_details` where category_id=\"$category_id_value\"";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $index=0;
    while ($row = mysqli_fetch_array($result)) {
        $myProductObjectList = new stdClass();
        $myProductObjectList->product_id =$row["product_id"];
        $myProductObjectList->category_id =$row["category_id"];
        $myProductObjectList->product_name = $row["product_name"];
        $myProductObjectList->product_desc = $row["product_desc"];
        $myProductObjectList->product_discount_price = $row["product_discount_price"];
        $myProductObjectList->product_price = $row["product_price"];
        $myProductObjectList->product_img = $row["product_img"];
        array_push($ProductArray, $myProductObjectList);
        $index++;
    }
    //$productJSON = json_encode($row = mysqli_fetch_array($result));
    
}
$productJSON = json_encode($ProductArray);
echo $productJSON;
?>