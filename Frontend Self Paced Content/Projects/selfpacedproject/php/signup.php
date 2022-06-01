<?php
include 'dbconnection.php';
$flag=false;
//if(isset($_POST["signup"])){
    if(isset($_POST["fname"])){
      $firstname_value = $_POST["fname"];
    }
    if(isset($_POST["lname"])){
      $lastname_value = $_POST["lname"];
    }
    if(isset($_POST["mobile"])){
      $mobile_value = $_POST["mobile"];
    }
    if(isset($_POST["email"])){
      $email_value = $_POST["email"];
    }
    if(isset($_POST["password"])){
      $password_value = $_POST["password"];
    }
    $customer_id_value = rand(1000,1999);
    $query = "SELECT * FROM `customer_details` where email=\"$email_value\"";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
      //echo '<script>alert("Already User In !!")</script>';
    }else{
      //echo '<script>alert("else part")</script>';
      $insert_query = "INSERT INTO `customer_details` (customer_id,first_name, last_name, mobile, email,password_value) VALUES (\"$customer_id_value\",\"$firstname_value\",\"$lastname_value\",\"$mobile_value\",\"$email_value\",\"$password_value\")";
      $inserted_result = mysqli_query($conn,$insert_query);
      if($inserted_result === TRUE){
        //echo "User Signup Successful !!";
        //echo '<script>alert("User Signup Successful !!")</script>';
        $flag= true;
      }else{
        //echo "Error in creating record. Try Again!!";
        $flag=false;
      }
    }
  //}

  echo json_encode($flag);
?>