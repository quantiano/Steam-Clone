<?php session_start();
include ('connect.inc');
$username = "";
if(!isset($_SESSION['userid'])){
   header( "location:login.php" );
}else{
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
    $query1131 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[commu_id] AND active='A' LIMIT 1");
 $results1131 = mysqli_num_rows($query1131);
        if($results1131 == 0){
              echo "<script>";
        echo"Swal.fire(
          'Not a valid community!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=community.php');
                echo "</script>";
        }else{
$userid = $_SESSION['userid'];
 $query113 = mysqli_query($conn,"SELECT * FROM `community`, `users_has_community` WHERE users_has_community.commu_id = $_GET[commu_id] AND community.commu_id = $_GET[commu_id] AND users_has_community.user_id='$userid' AND community.active='A' AND users_has_community.active='A' LIMIT 1");
 $results113 = mysqli_num_rows($query113);
        if($results113 == 1){

      //
              
                         $sql334 = "UPDATE users_has_community SET active = 'I'  WHERE user_id = '".$_SESSION['userid']."' AND commu_id = '".$_GET['commu_id']."' ";
                        $query634 = mysqli_query($conn,$sql334);

                    if($query634){
                        echo "<script>";
                        echo"Swal.fire(
                        'Leave Successfully!',
                        '',
                        'success'
                    )";
                    header('Refresh: 2; URL=community.php');
                                echo "</script>";
                    }else{
                        die(mysqli_error($conn));
                    }
        }else{

   echo "<script>";
        echo"Swal.fire(
          'Not belong to this community!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=community.php');
                echo "</script>";

    }
}

    
}
?>