<?php 
error_reporting(0);
session_start();
include('server.php');
if(isset($_SESSION['username'])){ 

    if(isset($_GET['gid'])){

        $result_count1121 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[gid] AND bywho = $_SESSION[userid] AND active = 'A' LIMIT 1");
        $count1121 = mysqli_num_rows($result_count1121);

    }elseif(isset($_GET['dgid'])){
        $result_count112 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[dgid] AND bywho = $_SESSION[userid] AND active = 'A' LIMIT 1");
        $count112 = mysqli_num_rows($result_count112);

    }elseif(isset($_GET['reid'])){
        $result_count11233 = mysqli_query($conn,"SELECT * FROM `community` WHERE commu_id = $_GET[reid] AND bywho = $_SESSION[userid] AND active = 'A' LIMIT 1");
        $count11233 = mysqli_num_rows($result_count11233);
    }


    if($count112 == 1 OR $count1121 == 1 OR $count11233 == 1 OR $_SESSION['userlevel'] == 1){

        if(isset($_GET['dgid'])){ //remove group member

            $sql112 = "UPDATE community SET active = 'I'  WHERE commu_id = '".$_GET['dgid']."'  ";
                        $query112 = mysqli_query($conn,$sql112);


        if($query112) { 
              echo "<script>";
              echo"Swal.fire(
                'Deleted Successfully!',
                '',
                'success'
            )";
            header('Refresh: 2; URL=community.php');
                      echo "</script>";
 
            }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=community.php');
                echo "</script>";

        }  
    }

       elseif(isset($_GET['gid'])){ //remove group member


         $sql334 = "UPDATE users_has_community SET active = 'I'  WHERE user_id = '".$_GET['userid']."' AND commu_id = '".$_GET['gid']."'  ";
                        $query = mysqli_query($conn,$sql334);


        if($query) { 
              echo "<script>";
              echo"Swal.fire(
                'Kick Successfully!',
                '',
                'success'
            )";
            header('Refresh: 2; URL=community.php');
                      echo "</script>";
 

        }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=community.php');
                echo "</script>";

        }  
    
    }elseif(isset($_GET['reid'])){ //remove comment


         $sql555 = "DELETE FROM comment WHERE cmt_id = $_GET[cmtid]";
        $query555 = mysqli_query($conn,$sql555);


        if($query555) { 
              echo "<script>";
              echo"Swal.fire(
                'Deleted Comment Successfully!',
                '',
                'success'
            )";
            header('Refresh: 1; URL=community_detail.php?commu_id='.$_GET['reid'].' ');
                      echo "</script>";

        }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
      header('Refresh: 2; URL=community_detail.php?commu_id='.$_GET['reid'].'');
                echo "</script>";

        }
      
    
    }elseif(isset($_GET['codeid'])){ //remove comment


         $sql666 = "DELETE FROM redeem_code WHERE code_number = $_GET[codeid]";
        $query666 = mysqli_query($conn,$sql666);


        if($query666) { 
              echo "<script>";
              echo"Swal.fire(
                'Deleted Code Successfully!',
                '',
                'success'
            )";
            header('Refresh: 1; URL=admin.php ');
                      echo "</script>";

        }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
       header('Refresh: 1; URL=admin.php ');
                echo "</script>";

        }

    }elseif(isset($_GET['productid'])){ //remove comment


         $sql888 = "DELETE FROM products WHERE product_id = $_GET[productid]";
        $query888 = mysqli_query($conn,$sql888);


        if($query888) { 
              echo "<script>";
              echo"Swal.fire(
                'Deleted Product Successfully!',
                '',
                'success'
            )";
            header('Refresh: 1; URL=admin.php ');
                      echo "</script>";

        }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
       header('Refresh: 1; URL=admin.php ');
                echo "</script>";

        }

    }elseif(isset($_GET['userid'])){ //remove comment


         $sql111 = "DELETE FROM users WHERE user_id = $_GET[userid]";
        $query111 = mysqli_query($conn,$sql111);


        if($query111) { 
              echo "<script>";
              echo"Swal.fire(
                'Deleted User Successfully!',
                '',
                'success'
            )";
            header('Refresh: 1; URL=admin.php ');
                      echo "</script>";

        }else{
          echo "<script>";
        echo"Swal.fire(
          'Failed!',
          '',
          'error'
      )";
       header('Refresh: 1; URL=admin.php ');
                echo "</script>";

        }
    }

     }else{
        header( "location:community.php" );
    exit(0);
    }   

    ?>

    
<?php 
    }else{
        header( "location:community.php" );
    exit(0);
    }   
?>