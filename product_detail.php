<?php 
session_start();
error_reporting(0);
include ('connect.inc');
$username = "";
if(!isset($_SESSION['userid'])){
    $userid = "";
}else{
$userid = $_SESSION['userid'];
}
if($_GET['product_id'] == NULL){
    header('Location: index.php');
}
$_SESSION['pid1'] = $_GET['product_id'];
$query00 = mysqli_query($conn,"SELECT * FROM products WHERE product_id = $_GET[product_id]");
$results000 = mysqli_num_rows($query00);
if($results000 == 0){
    header('Location: index.php');
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<style>
    input[type="number"], input[type="text"], input[type="email"], select {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
</style>
<body>

<?php include('top-nav.php'); ?>

<!-- Header -->
<?php include('header.php');?>

<!-- First Grid -->
<div class="container"><br><br>
<center><h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
<span>Game Detail</span></h3></center><br>
<div class="row">

<hr>
    
    <?php
        
        $_SESSION['pid1'] = $_GET['product_id'];
        $query113 = mysqli_query($conn,"SELECT * FROM products WHERE product_id = $_GET[product_id]");
        $row = mysqli_fetch_array($query113);
        if($row['img'] == ""){
            $img = "../project/proimg/noimg.png";
        }else{
            $img = "../project/proimg/$row[img]";
        }
        $query1113 = mysqli_query($conn,"SELECT username FROM users WHERE user_id = $row[publisher]");
        $row11 = mysqli_fetch_array($query1113);
        ?>
             
        <div class="col-xs-12">
        <form name="form1" method="post" action="cart.php">
            <center><img style="width: 50%; height: auto; object-fit: cover; transition: all .25s ease;" src='<?php echo $img;?>'><br><br><br>
            <br><p style="text-align: left; width:50%;">
                <span class="badge badge-primary">Name:</span><?php echo " ".$row['name']; ?><br>
                <span class="badge badge-primary">Description:</span><?php echo " ".$row['detail']; ?><br>
                <span class="badge badge-primary">Price :</span><?php echo " "."$".number_format($row['price'],2); ?><br>
                <span class="badge badge-primary">Developer:</span><?php echo " ".$row['developer']; ?><br>
                <span class="badge badge-primary">Publisher:</span><?php echo " ".$row11['username']; ?><br>
                <a class="badge badge-success" href='https://<?php echo $row['website']; ?>'>Visit!</a><br>
            </p>
        </center>
        <input type="hidden" id="txtPassword" name="pid" value='<?php echo $_SESSION['pid1']?> '><br>
        <?php 
         $query113 = mysqli_query($conn,"SELECT * FROM owned_game WHERE user_id ='$userid' AND product_id = $row[product_id] LIMIT 1");
        $results113 = mysqli_num_rows($query113);
        if($results113 == 1){
            echo'<center><button type="button" class="btn btn-secondary" style="margin-bottom: 5%; margin-top: -3%;" disabled>Owned</button></center></div>';
        }else{?>
            <center><button type="submit" id="submit1" class="btn btn-primary" data-callback="MakeAction" name="buy" value="Login">Buy</button></center>
        <?php }?>
        </form>
        </div>
            
        </div>


        </div>
    
<br><hr><br>
<div class="container" id="userinfo">
<div class="row" style="margin-bottom:5%">
<div class="col-sm-12">
   <center><p style='font-size:1.5em'>Game Rating</p></center>
   <?php include('rate.php'); ?>
</div>
</div>


    </div>
</div><br><br>
</div>
</div>

<?php include('footer.php'); ?>
</body>
<?php include('script.php'); } ?>
</html>