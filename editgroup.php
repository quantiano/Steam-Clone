<?php session_start();
include('server.php');
if(isset($_SESSION['username'])){ 
    
     $result_count112 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[gid] AND bywho = $_SESSION[userid] AND active = 'A' LIMIT 1");
        $count112 = mysqli_num_rows($result_count112);

    if($count112 == 1 OR $_SESSION['userlevel'] == 1){

       $result_count11 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[gid] AND active = 'A'");
        $row11 = mysqli_fetch_array($result_count11);

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
      <style>
* {
  box-sizing: border-box;
  font-family: "Bai Jamjuree", sans-serif;
  font-weight: bold;
}
          </style>
        <div class="row justify-content-center align-items-center;" style="height:100vh; margin-top:100px; margin-bottom: 100px;">
            <div class="col-10">
                <center><h3 class="tittle-w3l text-center">
                     <form name="form1" method="post" action=""  enctype="multipart/form-data">
                <span>Group Configuration of Group <?php echo $row11['name']; ?></span></h3></center><br>
                <div class="card">
                    <div class="card-body" style="overflow: scroll;">
                    <?php include('errors.php'); ?>
                            <div class="form-group">
                                <label for="uname"><b>Group Description</b></label><br>
                                <textarea name="description" rows="4" cols="50"><?php echo $row11['description'] ?></textarea><br>
                                <center><button type="submit" id="submit1" class="btn btn-primary" name="updes">Update</button></center><br><br>
                                <a href="JavaScript:if(confirm('Delete this community?')==true){window.location='deleteinfo.php?dgid=<?php echo $_GET['gid']?>';}" id="deletearticle" class="pull-center btn btn-danger"><center>Delete this community</center></a><br>
                            <label for="uname"><b>All Members</b></label>

                            <table class="table">
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col"></th>
                                </tr>
                            <?php
                            $result_count33 = mysqli_query($conn,"SELECT * FROM `users_has_community`,`users` WHERE commu_id = $_GET[gid] AND active = 'A' AND users.user_id = users_has_community.user_id");

                            while($row33 = mysqli_fetch_array($result_count33)){
                                
                                ?>
                            
                               
                                <tr>
                                    <td><?php echo $row33['username'] ?></td>
                                    <td><a href="JavaScript:if(confirm('Delete this user?')==true){window.location='deleteinfo.php?gid=<?php echo $_GET['gid']?>&userid=<?php echo $row33['user_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>Kick</center></a></td>
                                </tr>
                                

                                <?php
                            }
                            ?>
                            </table>
                            </div>  
                            <a style="text-decoration:none; float:right" href="community_detail.php?commu_id=<?php echo $_GET['gid'] ?>">back</a>
                        </form>
                    </div>
        
                </div><br><br>
             <?php
 if (isset($_POST['updes'])) {
    $sql3341 = "UPDATE community SET description = '".$_POST['description']."'  WHERE commu_id = '".$_GET['gid']."'  ";
                        $query1 = mysqli_query($conn,$sql3341);


        if($query1) { 
              echo "<script>";
              echo"Swal.fire(
                'Updated Successful!',
                '',
                'success'
            )";
            header("Location: community_detail.php?commu_id=".$_GET['gid']." ");
                      echo "</script>";
 
    
        }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
      header('Refresh: 0; URL=community.php');
                echo "</script>";

        } 
    }

?>                
            

<?php 
    }else{
        header( "location:community.php" );
    exit(0);
    }   
}else{
    header( "location:index.php" );
    exit(0);
}
?>
          </head>
          <body>
    
</body>
</html>