<?php session_start();
include ('connect.inc');
$username = "";
$result_count112 = mysqli_query($conn,"SELECT * FROM `users_has_community` WHERE commu_id = $_GET[commu_id] AND user_id = $_SESSION[userid] AND active = 'A' LIMIT 1");
$count112 = mysqli_num_rows($result_count112);

$result_count133 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[commu_id] AND active = 'A' LIMIT 1");
$count133 = mysqli_num_rows($result_count133);
if(!isset($_SESSION['userid']) OR $count112 == 0 OR $count133 == 0){
    header( "location:index.php" );
    exit(0);
}else{
$userid = $_SESSION['userid'];
$result_count = mysqli_query($conn,"SELECT * FROM `community`, `users`, `users_has_community` WHERE ((bywho = $userid AND community.commu_id = $_GET[commu_id]  AND community.active='A' AND users_has_community.user_id=$userid  AND users_has_community.active='A') OR (users.rank = 1 AND users.user_id = $userid)) LIMIT 1");
if(mysqli_num_rows ($result_count) == 1){
    $role = 'A';
}elseif(mysqli_num_rows ($result_count) == 0) {
    $role = 'U';
}
}
$result = mysqli_query($conn,"SELECT *  FROM `community` WHERE commu_id = $_GET[commu_id]");
$row11 = mysqli_fetch_array($result);

$result33 = mysqli_query($conn,"SELECT *  FROM `comment` WHERE commu_id = $_GET[commu_id]");


$result13 = mysqli_query($conn,"SELECT *  FROM `comment` WHERE commu_id = $_GET[commu_id]");
$count112 = mysqli_num_rows($result13);
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
<div class="container">
    <div class="row">
<div class="col-sm-4">
<div style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid; margin-top:10%;">
    <p>User Information</p><br>
    <?php echo "Your username : ".$_SESSION['username']; ?><br>
    <?php echo "Your are in group : " . $row11['name'] ; ?><br>
    <?php echo "Group Description : " . $row11['description']; ?><br>
    <?php if($role == 'U'){ ?>
    <a href="JavaScript:if(confirm('Leave sthis group?')==true){window.location='leavecommu.php?commu_id=<?php echo $row11['commu_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>leave</center></a>
    <?php }elseif($role == 'A'){ ?>
        <a href="JavaScript:if(confirm('Leave this group?')==true){window.location='leavecommu.php?commu_id=<?php echo $row11['commu_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>leave</center></a>
        <td><a href="editgroup.php?gid=<?php echo $row11['commu_id']; ?>" class="btn btn-warning">group configuration</a></td>
        <?php }?>
    <br><br>
</div>

</div>
<div class="col-sm-8">
    <?php if($count112 == 0){
        echo '<center><h1 style="margin-top:5%; margin-bottom:5%;">No one comment! Start your chat!</h1></center>';
    }else{ ?>
    <?php while($row112 = mysqli_fetch_array($result33)){ ?>
<?php

$result_count222 = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$row112[user_id]'");
$row44 = mysqli_fetch_array($result_count222);

    if($role == 'U'){
        
        
        ?>
         <div style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid; margin-top:5%;">
        <h4>User: <?php echo $row44['username']; ?><?php 
        if($row112['user_id'] == $userid){
            echo  "" ?><a href="JavaScript:if(confirm('Delete this comment?')==true){window.location='deletecomment.php?reid=<?php echo $_GET['commu_id'];?>&cmtid=<?php echo $row112['cmt_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>delete</center></a></h4>
        <?php }else{
            "";
        }
        ?>
        <h6><?php echo $row112['comment']; ?></h6>
        </div>

        <?php
    }elseif($role == 'A'){
        ?>
        <div style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid; margin-top:5%;">
         <h4>User: <?php echo $row44['username']; ?><a href="JavaScript:if(confirm('Delete this comment?')==true){window.location='deleteinfo.php?reid=<?php echo $_GET['commu_id'];?>&cmtid=<?php echo $row112['cmt_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>delete</center></a></h4>
        <h6><?php echo $row112['comment']; ?></h6>
        </div>
        <?php
    }
}
    }
?>
   <form name="form1" method="post" action=""  enctype="multipart/form-data">
Chat :<br><textarea name="comment" required></textarea><br>
<center><button type="submit" id="submit1" class="btn btn-primary" name="gocomment">Comment</button></center>
</form>

<?php 

if(isset($_POST['gocomment'])){
    $dttm = Date("Y-m-d H:i:s");
          $query12111 = "INSERT INTO comment (cmt_id,user_id,commu_id,comment,posted_time) 
                        VALUES('','$userid','$_GET[commu_id]','$_POST[comment]','$dttm')";
                        mysqli_query($conn, $query12111);

                        if($query12111){
                            echo "<script>";
                        echo 'window.setTimeout(function() {
                            window.location = "community_detail.php?commu_id='.$_GET['commu_id'].'  ";
                        }, 100);';
                                    echo "</script>";
                        }else{
                            echo "<script>";
                        echo 'window.setTimeout(function() {
                            window.location = "community_detail.php?commu_id='.$_GET['commu_id'].'  ";
                        }, 100);';
                                    echo "</script>";
                        }
}
?>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</body>
<?php include('script.php'); ?>
</html>