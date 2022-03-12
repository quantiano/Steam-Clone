<?php session_start();
include('connect.inc');
include('server.php');
if(isset($_SESSION['username'])){ ?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<div class="container">
<form name="form1" method="post" action="addfund.php">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <center><h3 class="tittle-w3l text-center">
                <span>Add Fund</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                    <?php include('errors.php'); ?>
                        <form action="" autocomplete="off">
                            <div class="form-group">
                            <label for="uname"><b>Gift Card Number</b></label><br>
                            <input type="number" class="form-control" placeholder="gift card number" name="cardnum" required>
                            <input type="hidden" name = "user_id" value="<?php echo $_SESSION['userid']?>">
                            </div><br>
                            <center><button type="submit" id="submit1" data-callback="MakeAction" name="redeem_card" class="btn btn-primary">Redeem</button></center><br>
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
    header( "location:login.php" );
    exit(0);
}
?>