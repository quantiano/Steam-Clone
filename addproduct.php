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
<form name="form1" method="post" action="addproduct.php" enctype="multipart/form-data">
<div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <center><h3 class="tittle-w3l text-center">
                <span>Add Product</span></h3></center><br>
                <div class="card">
                    <div class="card-body">
                    <?php include('errors.php'); ?>
                        <form action="" autocomplete="off">
                            <div class="form-group">
                            <label for="uname"><b>name</b></label>
                            <input type="text" id="txtUsername" placeholder="your product name" class="form-control" name="name" required><br>
                            </div>

                               <div class="file-upload-wrapper" data-text="เลือกไฟล์รูปโปรไฟล์">
                             <div class="form-group">
                            <label for="uname"><b>picture</b></label>
                            <input onchange="readURL(this);"  style="box-sizing: border-box;" id="productpic" type="file" class="file-upload-field1" name="image111"><br>
                            </div>
                            </div>

                            <div class="boxpic" style="width:200px; height:auto;">    
                                <img id="blah" width="200px" height="auto" src="#" alt="your image" />
                            </div>

                            <div class="form-group">
                            <label for="psw"><b>detail</b></label>
                            <input type="text" id="txtUsername" placeholder="your product detail" class="form-control" name="detail" required><br>
                            </div>

                            <div class="form-group">
                            <label for="psw"><b>price</b></label>
                            <input type="number" id="txtUsername" placeholder="your product price" class="form-control" name="price" required><br>
                            </div>

                            <div class="form-group">
                            <label for="psw"><b>rate</b></label><br>
                            <input type="radio" id="html"style="vertical-align: middle" name="gamerate" value="C [Early Childhood]">
                             <label for="html">C [Early Childhood]</label><br>

                         <input type="radio" id="css" style="vertical-align: middle" name="gamerate" value="E [Everyone]">
                            <label for="css">E [Everyone]</label><br>

                         <input type="radio" id="javascript" style="vertical-align: middle" name="gamerate" value="E 10+ [Everyone 10+]">
                         <label for="javascript">E 10+ [Everyone 10+]</label><br>

                            <input type="radio" id="javascript" style="vertical-align: middle" name="gamerate" value="T [Teen]">
                              <label for="javascript">T [Teen]</label><br>

                            <input type="radio" id="javascript" style="vertical-align: middle" name="gamerate" value="M [Mature 17+]">
                              <label for="javascript">M [Mature 17+]</label><br>

                            <input type="radio" id="javascript" style="vertical-align: middle" name="gamerate" value="A [Adult Only 18+]">
                              <label for="javascript">A [Adult Only 18+]</label><br><br>

                            <div class="form-group">
                            <label for="psw"><b>Developer</b></label>
                            <input type="text" id="txtUsername" placeholder="your product developer" class="form-control" name="developer" required><br>
                            </div>

                            <div class="form-group">
                            <label for="psw"><b>Website</b></label>
                            <input type="text" id="txtUsername" placeholder="your product website" class="form-control" name="website" required><br>
                            </div>

                            </div>
                           <center><button type="submit" id="submit1" data-callback="MakeAction" name="addproduct" value="addproducts" class="btn btn-primary">Add Product</button></center>
                        <a href="index.php">Back</a></form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
<?php
}
if(isset($_POST['addproduct'])){

    $productname = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $rate = $_POST['gamerate'];
    $developer = $_POST['developer'];
    $publisher = $_SESSION['username'];
    $dttm = Date("Y-m-d H:i:s");
    // Get image name
            $image = $_FILES['image111']['name'];
            $date = date("d-m-Y"); //กำหนดวันที่และเวลา

            //เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
            $remove_these = array(
                ' ',
                '`',
                '"',
                '\'',
                '\\',
                '/',
                '_'
            );
            $newname = str_replace($remove_these, '', $_FILES['image111']['name']);

            //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = time() . '-' . $newname;
            $path_link = "proimg/" . $newname;

           $sql6 = "INSERT ignore INTO products (product_id, name, img, detail, price, rate, developer, publisher, website, date) 
        VALUES ('','".$_POST["name"]."','".$newname."','".$_POST["detail"]."','".$_POST["price"]."', '".$_POST["gamerate"]."',
        '".$_POST["developer"]."','".$_SESSION['userid']."','".$_POST["website"]."', '".$dttm."')";
            // execute query
            $query111 = mysqli_query($conn, $sql6);

            move_uploaded_file($_FILES['image111']['tmp_name'], $path_link); //upload

            if ($query111)
            {
              echo "<script>";
              echo"Swal.fire(
                'Product added successfully!',
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
