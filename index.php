<?php session_start();
include ('connect.inc');
$username = "";
if(!isset($_SESSION['userid'])){
    $userid = "";
}else{
$userid = $_SESSION['userid'];
}
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
<body>

<?php include('top-nav.php'); ?>

<!-- Header -->
<?php include('header.php');?>

<!-- First Grid -->
<div class="container"><br><br>
<center><h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
<span>All Games in Store</span></h3></center><br>
<center><a class="btn btn-success" href="addproduct.php">Add Product</a>
<?php
if(isset($_SESSION['rank'])){
if($_SESSION['rank'] == 'A'){
    ?>
    <a href="admin.php" class="btn btn-danger">Admin Page</a>
    <?php
}
}
?>
</center><br>
<div class="row">

<hr>
    
    <?php
    $result_count = mysqli_query($conn,"SELECT * FROM `products`");

    while($row = mysqli_fetch_array($result_count)){
        $_SESSION['pid1'] = $row['product_id'];
        if($row['img'] == ""){
            $img = "../project/proimg/noimg.png";
        }else{
            $img = "../project/proimg/$row[img]";
        }
        $query113 = mysqli_query($conn,"SELECT * FROM owned_game WHERE user_id ='$userid' AND product_id = $row[product_id] LIMIT 1");
        $results113 = mysqli_num_rows($query113);
        if($results113 == 1){?>
           <div class="col-xs-12 col-sm-4">
        <div class="card1">
        <a class="img-card1">
        <img style="width: 100%; height: 200px; object-fit: cover; transition: all .25s ease;" src='<?php echo $img;?>'>
        </a>
                <div class="card-content1">
                <h4 class="card-title1">
                Name: <?php echo $row['name'];?>
                </a>
                </h4>
                <p class="">
                Price: <?php echo "$".number_format($row['price'],2);?><br>
                <a style="align:right;" href="product_detail.php?product_id=<?php echo $row['product_id']; ?>">More Detail</a>
                </p>
                </div>
        <?php echo'<center><button type="button" class="btn btn-secondary" style="margin-bottom: 5%; margin-top: -3%;" disabled>Owned</button></center></div>'; ?>
        <?php
        }else{
            ?>
             
        <div class="col-xs-12 col-sm-4">
        <form name="form1" method="post" action="cart.php">
        <div class="card1">
        <a class="img-card1">
        <img style="width: 100%; height: 200px; object-fit: cover; transition: all .25s ease;" src='<?php echo $img;?>'>
        </a>
        <div class="card-content1">
        <h4 class="card-title1">
        Name: <?php echo $row['name'];?>
        </a>
        </h4>
        <p class="">
        Price : <?php echo "$".number_format($row['price'],2); ?><br>
        <a style="align:right;" href="product_detail.php?product_id=<?php echo $row['product_id']; ?>">More Detail</a>
        </p>
        </div>
        <input type="hidden" id="txtPassword" name="pid" value='<?php echo $_SESSION['pid1']?> '><br>
            <center><button type="submit" id="submit1" class="btn btn-primary" style="margin-bottom: 5%; margin-top: -10%;" data-callback="MakeAction" name="buy" value="Login">Buy</button></center>
            </form>
        </div>


        <?php
        }
        

        ?>
        </div>
        
        <?php
    }
    ?>
    </div>
    </div>

<?php
if(!isset($_SESSION['username'])){
 //nothing
}else{

    $username = $_SESSION['username'];

    $query11 = "SELECT * FROM users WHERE username='$username'";
    $results11 = mysqli_query($conn, $query11);

    if (mysqli_num_rows($results11) == 1) {

      $row = mysqli_fetch_array($results11);
      $money = $row['balance'];
    }

?>
<br><hr><br>
<div class="container" id="userinfo">
<div class="row" style="margin-bottom:5%">
<div class="col-sm-4">
    <div style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid;">
    <p>User Information</p><br>
    <?php echo "Welcome back! ".$row['username']; ?><br>
    <?php echo "Your balance: ".$money; ?><br><a href="addfund.php">Add Fund</a><br>
    <br><br>
</div>
</div>

     <div class="col-sm-8" style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid;">

    <?php include('own_games.php'); ?>

    <br><br><br>
   
    <?php include('your_group.php'); ?>

    <?php
} //if have session
    ?>
    </div>
</div><br><br>
</div>
</div>

<?php include('footer.php'); ?>
</body>
<?php include('script.php'); ?>
</html>