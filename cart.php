<?php session_start();
include('server.php');
if(isset($_SESSION['username'])){ 

if(!isset($_SESSION['pid']) && !isset($_POST['buy'])){
    echo "<script>";
    echo"Swal.fire(
      'No item in cart, pick up something!',
      '',
      'error'
  )";
  header('Refresh: 2; URL=index.php');
            echo "</script>";
}else{
if(isset($_POST['buy'])){
$_SESSION['pid'] = $_POST['pid'];


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

      <style>
* {
  box-sizing: border-box;
  font-family: "Bai Jamjuree", sans-serif;
  font-weight: bold;
}
          </style>

<form name="form1" method="post" action="checkout.php">

    <?php 

     $result_count = mysqli_query($conn,"SELECT * FROM `products` WHERE product_id= '$_SESSION[pid]' ");

     $row = mysqli_fetch_array($result_count);

     if($row['img'] == ""){
        $img = "../project/proimg/noimg.png";
    }else{
        $img = "../project/proimg/$row[img]";
    }

    ?>

    <div class="container">
<form name="form1" method="post" action="login.php">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <center><h3 class="tittle-w3l text-center">
                <span>Cart</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                        <form action="" autocomplete="off">

                            <div class="form-group">
                            <center><font size="4%"><b>Product Detail</b></font></center><hr>
                            </div>

                            <div class="row">

                            <div class="col-sm-4">
                            <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo $img?>">
                            </div>

                            <div class="col-sm-6">
                            <div class="form-group">
                            <p>Name: <?php echo $row['name'] ?></p>
                            </div>

                            <div class="form-group">
                            <p>Price: <?php echo $row['price'] ?></p>
                            </div>
                            </div>

                            <div class="col-sm-2">
                            <button style="float:left; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" type="submit" id="submit1" class="btn btn-danger" data-callback="MakeAction" name="remove" >&#10060;</button>
                            </div>
                            </div>
                            

                            <hr><br>
                            <center><button type="submit" id="submit1" class="btn btn-success" data-callback="MakeAction" name="checkout" >Checkout</button></center><br><br>
                            <a style="text-decoration:none; float:right" href="index.php">Back to Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

<?php
}
elseif($_SESSION['pid'] != "" && isset($_POST['buy'])){
    $_SESSION['pid'] = $_POST['pid'];

    ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

      <style>
* {
  box-sizing: border-box;
  font-family: "Bai Jamjuree", sans-serif;
  font-weight: bold;
}
          </style>

<form name="form1" method="post" action="checkout.php">

    <?php 

     $result_count = mysqli_query($conn,"SELECT * FROM `products` WHERE product_id= '$_SESSION[pid]' ");

     $row = mysqli_fetch_array($result_count);

     if($row['img'] == ""){
        $img = "../project/proimg/noimg.png";
    }else{
        $img = "../project/proimg/$row[img]";
    }

    ?>

    <div class="container">
<form name="form1" method="post" action="login.php">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <center><h3 class="tittle-w3l text-center">
                <span>Cart</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                        <form action="" autocomplete="off">

                            <div class="form-group">
                            <center><font size="4%"><b>Product Detail</b></font></center><hr>
                            </div>

                            <div class="row">

                            <div class="col-sm-4">
                            <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo $img?>">
                            </div>

                            <div class="col-sm-6">
                            <div class="form-group">
                            <p>Name: <?php echo $row['name'] ?></p>
                            </div>

                            <div class="form-group">
                            <p>Price: <?php echo $row['price'] ?></p>
                            </div>
                            </div>

                            <div class="col-sm-2">
                            <button style="float:left; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" type="submit" id="submit1" class="btn btn-danger" data-callback="MakeAction" name="remove" >&#10060;</button>
                            </div>
                            </div>
                            

                            <hr><br>
                            <center><button type="submit" id="submit1" class="btn btn-success" data-callback="MakeAction" name="checkout" >Checkout</button></center><br><br>
                            <a style="text-decoration:none; float:right" href="index.php">Back to Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>


<?php

}elseif($_SESSION['pid'] != ""  && !isset($_POST['buy'])){
    $_SESSION['pid'] = $_SESSION['pid'];

    ?>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

      <style>
* {
  box-sizing: border-box;
  font-family: "Bai Jamjuree", sans-serif;
  font-weight: bold;
}
          </style>

<form name="form1" method="post" action="checkout.php">

    <?php 

     $result_count = mysqli_query($conn,"SELECT * FROM `products` WHERE product_id= '$_SESSION[pid]' ");

     $row = mysqli_fetch_array($result_count);

     if($row['img'] == ""){
        $img = "../project/proimg/noimg.png";
    }else{
        $img = "../project/proimg/$row[img]";
    }

    ?>

    <div class="container">
<form name="form1" method="post" action="login.php">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <center><h3 class="tittle-w3l text-center">
                <span>Cart</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                        <form action="" autocomplete="off">

                            <div class="form-group">
                            <center><font size="4%"><b>Product Detail</b></font></center><hr>
                            </div>

                            <div class="row">

                            <div class="col-sm-4">
                            <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo $img?>">
                            </div>

                            <div class="col-sm-6">
                            <div class="form-group">
                            <p>Name: <?php echo $row['name'] ?></p>
                            </div>

                            <div class="form-group">
                            <p>Price: <?php echo $row['price'] ?></p>
                            </div>
                            </div>

                            <div class="col-sm-2">
                            <button style="float:left; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" type="submit" id="submit1" class="btn btn-danger" data-callback="MakeAction" name="remove" >&#10060;</button>
                            </div>
                            </div>
                            

                            <hr><br>
                            <center><button type="submit" id="submit1" class="btn btn-success" data-callback="MakeAction" name="checkout" >Checkout</button></center><br><br>
                            <a style="text-decoration:none; float:right" href="index.php">Back to Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <?php
}else{
    echo "<script>";
    echo"Swal.fire(
      'No item in cart, pick up something!',
      '',
      'error'
  )";
  header('Refresh: 2; URL=index.php');
            echo "</script>";
}
}
?>
    
    
</form>

<?php   
}else{
    header( "location:login.php" );
    exit(0);
}
?>