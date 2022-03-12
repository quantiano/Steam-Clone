<?php session_start();
include('server.php');
include('connect.inc');
if(!isset($_SESSION['username'])){ 
    header( "location:login.php" );
}else{ ?>
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

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

<div class="container" style="margin-top:200px; margin-bottom: 200px;">
<form name="form1" method="post" action="newcommunity.php" enctype="multipart/form-data">
<div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <center><h3 class="tittle-w3l text-center">
                <span>Create Community</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                    <?php include('errors.php'); ?>
                        <form action="" autocomplete="off">
                            <div class="form-group">
                            <label for="uname"><b>Community Name</b></label>
                            <input type="text" id="txtUsername" placeholder="your community name" class="form-control" name="name" required><br>
                            </div>

                            <div class="form-group">
                            <label for="psw"><b>Community Description</b></label>
                            <input type="text" id="txtUsername" placeholder="your community description" class="form-control" name="description" required><br>
                            </div>

                            <label for="psw"><b>Max Member</b></label>
                            <select id="maxmem" name="maxmem">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            </select>
                            </div>
                           <center><button type="submit" id="submit1" data-callback="MakeAction" name="creategroup" value="addproducts" class="btn btn-primary">Create</button></center>
                        <a href="index.php">Back</a></form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
<?php
}
if(isset($_POST['creategroup'])){

$dttm = Date("Y-m-d H:i:s");
$commu_id = rand(000000000,999999999);

           $sql6 = "INSERT ignore INTO community (commu_id,name,description,bywho,max_mem,created_time,active) 
        VALUES ('".$commu_id."','".$_POST["name"]."','".$_POST["description"]."','".$_SESSION['userid']."','".$_POST["maxmem"]."', '".$dttm."','A')";
            // execute query
            $query111 = mysqli_query($conn, $sql6);

             $sql7 = "INSERT ignore INTO users_has_community (id,user_id,commu_id,active) 
        VALUES ('','".$_SESSION['userid']."','".$commu_id."','A')";
            // execute query
            $query117 = mysqli_query($conn, $sql7);


            if ($query111 && $query117)
            {
              echo "<script>";
              echo"Swal.fire(
                'Created successfully!',
                '',
                'success'
            )";
                      echo "</script>";
                      ?>

              <script>
              setTimeout(function(){
                 window.location.href = 'index.php';
              }, 3000);
           </script>
           <?php
            }
            else{
              echo "<script>";
              echo"Swal.fire(
                  'Error!',
                  'Contact Admin',
                  'error'
              )";
              echo "</script>";
              ?>
    
                <script>
                setTimeout(function(){
                   window.location.href = 'index.php';
                }, 3000);
             </script>
      <?php
            }
?>


<?php
}
