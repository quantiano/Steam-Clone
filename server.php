<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

// initializing variables
//$username = "";
//$email    = "";
$errors = array(); 

// connect to the database
include('connect.inc');
date_default_timezone_set('Asia/Bangkok');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username1 = mysqli_real_escape_string($conn, $_POST['username']);
  $email1 = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['conpassword']);
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $paymentcard = mysqli_real_escape_string($conn, $_POST['payment']);
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  

  $dttm = Date("Y-m-d H:i:s");

  $username = strtolower($username1);
  $email = strtolower($email1);
	
  if (empty($username1)) { array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspFill username"); }
  if (empty($email)) { array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspFill email"); }
  if (empty($password_1)) { array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspFill password"); }
  if ($password_1 != $password_2) {
    array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspPassword and confirm password does not match");
  }
	
	//ตรวจสอบว่าอีเมลนี้ใช้สมัครไปแล้วหรือยัง
  $user_check_query = "SELECT username,email FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] == $username) {  
      array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspมีคนใช้ชื่อผู้ใช้นี้แล้ว");
    }

    if ($user['email'] == $email) {
      array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspมีคนใช้อีเมล์นี้แล้ว");
    }
  }


  $id = rand(111111111,999999999);
  $check = true;
  while($check){
  $user_check_query11 = "SELECT id FROM users LIMIT 1";
  $result11 = mysqli_query($conn, $user_check_query11);
  $user11 = mysqli_fetch_assoc($result11);
  if($user11){
      $id = rand(111111111,999999999);
      $check = true;
  }else{
      $check = false;
  }
}

  if (count($errors) == 0) {
    //$password = password_hash($password_1,PASSWORD_DEFAULT);
    $query = "INSERT INTO users (user_id,username,password,firstname, surname, email, phone, payment_card, country, balance, level, rank, joined_time) 
          VALUES('$id','$username','$password_1','$firstname', '$lastname', '$email', '$phone', '$paymentcard', '$country', '0', '1' ,'0' ,'$dttm')";
    mysqli_query($conn, $query);

    if($query){

    // ตั้ง session //

    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $id;
    $_SESSION['pid'] = "";
    $_SESSION['userlevel'] = 0;

    echo "<script>";
        echo"Swal.fire(
          'Registered Successful!',
          '',
          'success'
      )";
      header('Refresh: 2; URL=index.php');
                echo "</script>";
}
}
}
// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username11 = mysqli_real_escape_string($conn, $_POST['username']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password']);

  $username1 = strtolower($username11);

  if (empty($username11)) {
    array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspกรุณากรอกอีเมล์ผู้ใช้");
  }
  if (empty($password1)) {
    array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspกรุณากรอกรหัสผ่าน");
  }


  if (count($errors) == 0) {
    //$password = password_hash($password1,PASSWORD_DEFAULT);
    $dttm = Date("Y-m-d H:i:s");

    $query11 = "SELECT username,email,level,user_id,balance,rank FROM users WHERE username='$username1' AND password='$password1'";
    $results11 = mysqli_query($conn, $query11);
    $timenow = date("Y-m-d G:i:s");

    if (mysqli_num_rows($results11) == 1) {

      $row = mysqli_fetch_array($results11);

      $username = $row['username'];

      if($row['rank'] == 1){
          $_SESSION['rank'] = 'A';
      }else{
          $_SESSION['rank'] = 'U';
      }

      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $row['user_id'];
      $_SESSION['pid'] = "";
      $_SESSION['userlevel'] = $row['rank'];

      echo "<script>";
        echo"Swal.fire(
          'Login Successful!',
          '',
          'success'
      )";
      header('Refresh: 2; URL=index.php');
                echo "</script>";
    }else{
        array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspERROR");
    }
    }else{

        array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspIncorrect username or password");

    }
  }

  if (isset($_POST['redeem_card'])) {

    if (empty($_POST['cardnum'])) {
        array_push($errors, "&nbsp&nbsp&nbsp&nbsp&nbspFill your card number");
    }

    $redeem1 = mysqli_real_escape_string($conn, $_POST['cardnum']);
    $redeem = strtolower($redeem1);

    if (count($errors) == 0) {
    
        $query1122 = "SELECT * FROM redeem_code WHERE code_number='$redeem' AND used_by = '0' ";
        $results1122 = mysqli_query($conn, $query1122);

        $dttm = Date("Y-m-d H:i:s");
    
        if (mysqli_num_rows($results1122) == 1) {
            $used = 1;
            $sql333 = "UPDATE redeem_code SET used_by = '".$_POST['user_id']."' WHERE code_number = '".$redeem."' ";
        $query633 = mysqli_query($conn,$sql333);

        $get11 = $results1122->fetch_assoc();

        $query112 = "SELECT balance FROM users WHERE user_id = '$_SESSION[userid]' ";
        $results112 = mysqli_query($conn, $query112);
        $row633 = mysqli_fetch_array($results112);
        
        $newbalance = $row633['balance']+$get11['amount'];

        $sql334 = "UPDATE users SET balance = '".$newbalance."'  WHERE user_id = '".$_POST['user_id']."' ";
        $query634 = mysqli_query($conn,$sql334);
            if($query633 AND $query634) { 
              echo "<script>";
              echo"Swal.fire(
                'Redeemed Successful!',
                '',
                'success'
            )";
            header('Refresh: 2; URL=index.php');
                      echo "</script>";
 
            }

        }else{
          echo "<script>";
        echo"Swal.fire(
          'Incorrect or used card number!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=addfund.php');
                echo "</script>";

        }    
    }
}


if (isset($_POST['remove_user_admin'])) {

}

if(isset($_POST['ratego2'])){
    $dttm = Date("Y-m-d H:i:s");
    $query3343 = "INSERT INTO rate (rid,user_id,product_id,rate,rate_date) 
          VALUES('', '$_POST[user12]', '$_POST[pid12]', '$_POST[ratescore]', '$dttm')";
    $query322 = mysqli_query($conn, $query3343);
    if($query322){
         echo "<script>";
              echo"Swal.fire(
                'Rated Successful!',
                '',
                'success'
            )";
            header('Refresh: 2; URL=index.php');
                      echo "</script>";
    }else{
         echo "<script>";
        echo"Swal.fire(
          'Already rated this game!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=index.php');
                echo "</script>";
    }
}
?>



  <?php 
        
        if(isset($_POST['updateu'])){ //remove group member

            $sql112 = "UPDATE users SET password = '".$_POST['password']."',
                        firstname = '".$_POST['firstname']."',  
                        surname = '".$_POST['lastname']."',
                        email = '".$_POST['email']."',
                        phone = '".$_POST['phone']."',
                        payment_card = '".$_POST['payment']."',
                        country = '".$_POST['country']."'
                        WHERE username = '".$_SESSION['username']."'  ";
                        $query112 = mysqli_query($conn,$sql112);


        if($query112) { 
              echo "<script>";
              echo"Swal.fire(
                'Update Successfully!',
                '',
                'success'
            )";
            header('Refresh: 1; URL=editprofile.php');
                      echo "</script>";
 
            }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
      header('Refresh: 1; URL=editprofile.php');
                echo "</script>";

        }  
    }
        
        ?>



                         <?php 
        
        if(isset($_POST['updatea']) AND $_SESSION['userlevel'] == 1 ){ //remove group member 

            $sql1121 = "UPDATE users SET password = '".$_POST['password']."',
                        firstname = '".$_POST['firstname']."',  
                        surname = '".$_POST['lastname']."',
                        email = '".$_POST['email']."',
                        phone = '".$_POST['phone']."',
                        payment_card = '".$_POST['payment']."',
                        country = '".$_POST['country']."',
                        balance = '".$_POST['balance']."' 
                        WHERE user_id = '".$_POST['uid']."'  ";
                        $query1121 = mysqli_query($conn,$sql1121);


        if($query1121) { 
              echo "<script>";
              echo"Swal.fire(
                'Update Successfully!',
                '',
                'success'
            )";
            header('Refresh: 1; URL=editprofile.php?uid='.$_POST['uid'].'');
                      echo "</script>";
 
            }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed! Admin',
          '',
          'error'
      )";
      header('Refresh: 1; URL=editprofile.php');
                echo "</script>";

        }  
    }
        
        ?>




