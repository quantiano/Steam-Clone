<?php session_start();
include('server.php');
if(isset($_SESSION['username']) && isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == 1){ ?>

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
        <div class="row justify-content-center align-items-center;" style="height:100vh; margin-top:100px; margin-bottom: 100px;">
            <div class="col-10">
                <center><h3 class="tittle-w3l text-center">
                <span>Admin</span></h3></center><br>
                <div class="card">
                    <div class="card-body" style="overflow: scroll;">
                    <?php include('errors.php'); ?>

                            <div class="form-group">
                            <label for="uname"><b>All Users</b></label>

                            <table class="table">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Firstname</th>
                                    <th scope="col">Lastname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Rank</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            <?php
                            $result_count = mysqli_query($conn,"SELECT * FROM `users`");

                            while($row = mysqli_fetch_array($result_count)){
                                
                                if($row['rank'] == 1){
                                    $role = 'Admin';
                                }else{
                                    $role = 'User';
                                }
                                ?>
                            
                               
                                <tr>
                                    <td><?php echo $row['user_id'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['firstname'] ?></td>
                                    <td><?php echo $row['surname'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['country'] ?></td>
                                    <td><?php echo $row['balance'] ?></td>
                                    <td><?php echo $row['level'] ?></td>
                                    <td><?php echo $role ?></td>
                                    <td><a href="editprofile.php?uid=<?php echo $row['user_id']; ?>" class="btn btn-warning">edit</a></td>
                                    <td><a href="JavaScript:if(confirm('Delete this user?')==true){window.location='deleteinfo.php?userid=<?php echo $row['user_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>delete</center></a></td>
                                </tr>
                                

                                <?php
                            }
                            ?>
                            </table>
                            </div>  
                            <a style="text-decoration:none; float:right" href="index.php">back to Home</a>

                    </div>
                </div><br><br>


                <div class="card">
                    <div class="card-body" style="overflow: scroll;">
                    <?php include('errors.php'); ?>

                            <div class="form-group">
                            <label for="uname"><b>All Groups</b></label>

                            <table class="table">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">By</th>
                                    <th scope="col">Max Member</th>
                                    <th scope="col">Created When</th>
                                    <th scope="col">Active</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            <?php
                            $result_count = mysqli_query($conn,"SELECT * FROM `community`");
                            
                            while($row = mysqli_fetch_array($result_count)){
                                
                                $result_count1 = mysqli_query($conn,"SELECT username FROM `users` WHERE $row[bywho] = user_id");
                                $row1 = mysqli_fetch_array($result_count1);
                                ?>
                            
                               
                                <tr>
                                    <td><?php echo $row['commu_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row1['username'] ?></td>
                                    <td><?php echo $row['max_mem'] ?></td>
                                    <td><?php echo $row['created_time'] ?></td>
                                    <td><?php echo $row['active'] ?></td>
                                    <td><a href="community_detail.php?commu_id=<?php echo $row['commu_id']; ?>" class="btn btn-success">view</a></td>
                                    <td><a href="editgroup.php?gid=<?php echo $row['commu_id']; ?>" class="btn btn-warning">edit</a></td>
                                    <td><a href="JavaScript:if(confirm('Delete this group?')==true){window.location='deleteinfo.php?dgid=<?php echo $row['commu_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>delete</center></a></td>
                                </tr>
                                

                                <?php
                            }
                            ?>
                            </table>
                            </div>  
                            <a style="text-decoration:none; float:right" href="index.php">back to Home</a>

                    </div>
                </div><br><br>


                 <div class="card">
                    <div class="card-body" style="overflow: scroll;">
                    <?php include('errors.php'); ?>
                            <div class="form-group">
                            <label for="uname"><b>All Products</b></label>

                            <table class="table">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Game Rate (ESRB)</th>
                                    <th scope="col">Developer</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Added Date</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            <?php
                            $result_count32 = mysqli_query($conn,"SELECT * FROM `products`");
                            
                            while($row33 = mysqli_fetch_array($result_count32)){
                                
                                $result_count21 = mysqli_query($conn,"SELECT username FROM `users` WHERE $row33[publisher] = user_id");
                                $row21 = mysqli_fetch_array($result_count21);
                                ?>
                            
                               
                                <tr>
                                    <td><?php echo $row33['product_id'] ?></td>
                                    <td><?php echo $row33['name'] ?></td>
                                    <td><?php echo $row33['detail'] ?></td>
                                    <td><?php echo $row33['price'] ?></td>
                                    <td><?php echo $row33['rate'] ?></td>
                                    <td><?php echo $row33['developer'] ?></td>
                                    <td><?php echo $row21['username'] ?></td>
                                    <td><?php echo $row33['website'] ?></td>
                                    <td><?php echo $row33['date'] ?></td>
                                    <td><a href="product_detail.php?product_id=<?php echo $row33['product_id']; ?>" class="btn btn-success">view</a></td>
                                    <td><a href="editproduct.php?pid=<?php echo $row33['product_id']; ?>" class="btn btn-warning">edit</a></td>
                                    <td><a href="JavaScript:if(confirm('Delete this product?')==true){window.location='deleteinfo.php?productid=<?php echo $row33['product_id'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>delete</center></a></td>
                                </tr>
                            
                                

                                <?php
                            }
                            ?>
                            </table>
                            </div>  
                            <a style="text-decoration:none; float:right" href="index.php">back to Home</a>

                    </div>
                </div><br><br>


                  <div class="card">
                    <div class="card-body" style="overflow: scroll;">
                    <?php include('errors.php'); ?>
                        <form name="form111" method="post" action="newcode.php" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="uname"><b>All Code</b></label>

                            <table class="table">
                                <tr>
                                    <th scope="col">Code Number</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Used By</th>
                                    <th scope="col">Generated_by</th>
                                    <th scope="col">Generated_time</th>
                                    <th scope="col"></th>
                                </tr>
                            <?php
                            $result_count = mysqli_query($conn,"SELECT * FROM `redeem_code`");

                            while($row11 = mysqli_fetch_array($result_count)){
                                
                                $result_count212 = mysqli_query($conn,"SELECT username FROM `users` WHERE $row11[used_by] = user_id");
                                $row212 = mysqli_fetch_array($result_count212);

                                $result_count21 = mysqli_query($conn,"SELECT username FROM `users` WHERE $row11[generated_by] = user_id");
                                $row22 = mysqli_fetch_array($result_count21);
                                
                                if($row11['used_by'] == 0){
                                    $idd = "not used";
                                }else{
                                    $idd = $row212['username'];
                                }
                                ?>
                                
                                <tr>
                                    <td><?php echo $row11['code_number'] ?></td>
                                    <td><?php echo $row11['amount'] ?></td>
                                    <td><?php echo $idd ?></td>
                                    <td><?php echo $row22['username'] ?></td>
                                    <td><?php echo $row11['generated_time'] ?></td>
                                    <td><a href="JavaScript:if(confirm('Delete this code?')==true){window.location='deleteinfo.php?codeid=<?php echo $row11['code_number'];?>';}" id="deletearticle" class="pull-right btn btn-danger"><center>delete</center></a></td>
                                </tr>
                                

                                <?php
                            }
                            ?>
                            </table>
                            </div>  
                            <input width="48" height="48" class="form-control" width="50%" type="number" min="100" max="100000" placeholder="input value for this redeem code" name="value" required>
                            <br><center><button type="submit" name="newcode" class="btn btn-success">Generate a new code</button></center>
                            <a style="text-decoration:none; float:right" href="index.php">back to Home</a>
                        </form>
                    </div>

                       
                </div><br><br>

        
            </div>
        </div>


<?php    
}else{
    header( "location:index.php" );
    exit(0);
}
?>