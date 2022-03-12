<?php 
include('server.php');
if(isset($_SESSION['username'])){ ?>

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

<form name="form1" method="post" action="login.php">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <center><h3 class="tittle-w3l text-center">
                <span>Your Games</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                    <?php include('errors.php'); ?>
                        <form action="" autocomplete="off">
                            <div class="form-group table-responsive">

                            <table class="table" id="customers">

                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                </tr>

                            <tbody>
                            <?php
                            $userid = $_SESSION['userid'];
                               $result_count1 = mysqli_query($conn,"SELECT * FROM `owned_game` INNER  JOIN products ON owned_game.product_id = products.product_id WHERE user_id='$userid'");
                           
                           
                               while($row1 = mysqli_fetch_array($result_count1)){
                                   ?>
                         
                                <tr>
                                    <td style="width:200px"><?php echo $row1['name']; ?></td>
                                    <td style="width:25px"><img src="./img/start.png" width="100%" height="auto"></td>
                                </tr>
                                

                                <?php
                               }
                            
                            ?>
                            </tbody>
                            </table>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>



<?php    
}else{
    header( "location:index.php" );
    exit(0);
}
?>