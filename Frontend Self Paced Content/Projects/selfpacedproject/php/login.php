<?php
include 'dbconnection.php';
$isUserExist =false;
//if(isset($_POST["signup"])){
if (isset($_POST["email"])) {
  $email_value = $_POST["email"];
}
if (isset($_POST["password"])) {
  $password_value = $_POST["password"];
}
$query = "SELECT * FROM `customer_details` where email=\"$email_value\"";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  $isUserExist=true;
  //echo $isUserExist;
}
else {
  $isUserExist=false;
  //echo $isUserExist;
}
//}
echo $isUserExist;

?>