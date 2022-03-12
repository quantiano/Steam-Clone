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
<span>All Community</span></h3></center><br>
</center><br>
<center><a href="newcommunity.php" class="btn btn-primary">Create Community</a></center><br><br>
<div class="row">

<hr>
    
    <?php
    $result_count = mysqli_query($conn,"SELECT * FROM `community` WHERE active='A'");

    while($row = mysqli_fetch_array($result_count)){
        $query1131 = mysqli_query($conn,"SELECT * FROM users_has_community WHERE users_has_community.user_id = '$userid' AND users_has_community.commu_id=$row[commu_id]  AND users_has_community.active='A'");
        $results1131 = mysqli_num_rows($query1131);
        if($results1131 == 1){?>
           <div class="col-xs-12 col-sm-4">
        <div class="card1">
                <div class="card-content1">
                <h4 class="card-title1">
                Group Name: <?php echo $row['name'];?>
                </a>
                </h4>
                <p class="">
                Group Description: <?php echo $row['description'];?><br>
                <a style="align:right;" href="community_detail.php?commu_id=<?php echo $row['commu_id']; ?>">Visit</a>
                </p>
                </div>
        <?php echo'<center><button type="button" class="btn btn-secondary" style="margin-bottom: 5%; margin-top: -3%;" disabled>Joined</button></center></div>'; ?>
        <?php
        }elseif($results1131 == 0){
            ?>
             
        <div class="col-xs-12 col-sm-4">
        <form name="form1" method="post" action="join_commu.php">
        <div class="card1">
        <div class="card-content1">
        <h4 class="card-title1">
        Group Name: <?php echo $row['name'];?>
        </a>
        </h4>
        <p class="">
        Group Description: <?php echo $row['description']; ?><br>
        <a style="align:right;" href="community_detail.php?commu_id=<?php echo $row['commu_id']; ?>">Visit</a>
        </p>
        </div>
         <input type="hidden" id="txtPassword" name="commu_id" value='<?php $row['commu_id']?> '>
            <center><a style="
    margin-bottom: 5%;
    margin-top: -3%;
" href="join_commu.php?commu_id=<?php echo $row['commu_id'] ?>" class="btn btn-primary">Join</a></center>
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
    </div>
</div><br><br>
</div>
</div>

<?php include('footer.php'); ?>
</body>
<?php include('script.php'); ?>
</html>