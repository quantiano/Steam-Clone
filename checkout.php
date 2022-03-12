<?php
session_start();
include('server.php');
include('connect.inc');
if(isset($_SESSION['username'])){ 

if (isset($_POST['remove'])) {
unset($_SESSION['pid']);
header( "location:index.php" );
    exit(0);
}elseif(isset($_POST['checkout'])){

    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
      <link href="https://fonts.googleapis.com/css?family=Spicy+Rice" rel="stylesheet">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/styles.css">
    <title>Checkout</title>
</head>
<body>
    
</body>
</html>

    <?php

    $result_count = mysqli_query($conn,"SELECT * FROM `products` WHERE product_id= '$_SESSION[pid]' ");

    $row = mysqli_fetch_array($result_count);
    
    $result_count1 = mysqli_query($conn,"SELECT * FROM `users` WHERE user_id= '$_SESSION[userid]' ");
    $row1 = mysqli_fetch_array($result_count1);

    $result_count12 = mysqli_query($conn,"SELECT * FROM `owned_game` WHERE user_id= '$_SESSION[userid]' AND product_id = '$_SESSION[pid]'");

    if($row1['balance'] < $row['price']){
        echo "<script>";
        echo"Swal.fire(
          'Not enough balance!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=addfund.php');
                echo "</script>";
              
    }elseif(mysqli_num_rows($result_count12) == 1){
        echo "<script>";
        echo"Swal.fire(
          'You already owned this!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=index.php');
                echo "</script>";
    unset($_SESSION['pid']);
    }
    else{

        date_default_timezone_set('Asia/Bangkok');

    $newbalance = $row1['balance']-$row['price'];

    $sql334 = "UPDATE users SET balance = '".$newbalance."'  WHERE user_id = '".$_SESSION['userid']."' ";
    $query634 = mysqli_query($conn,$sql334);

    $dttm = Date("Y-m-d H:i:s");
    $price = $row['price'];
    $userid = $_SESSION['userid'];
    $pid = $row['product_id'];

    $query211 = "INSERT INTO owned_game (ref,user_id,product_id,price,by_method,when_date) 
    VALUES('','$userid','$pid','$price','card','$dttm')";
    mysqli_query($conn, $query211);

    if($query211){
        echo "<script>";
        echo"Swal.fire(
          'Purchased Successful!',
          '',
          'success'
      )";
      header('Refresh: 2; URL=index.php');
                echo "</script>";
                unset($_SESSION['pid']);
    }else{
        die(mysqli_error($conn));
    }


    } 
}else{
    header( "location:index.php" );
    exit(0);
}
}else{
    header( "location:login.php" );
    exit(0);
}
?>