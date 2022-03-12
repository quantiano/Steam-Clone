<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

// initializing variables
//$username = "";
//$email    = "";
$errors = array(); 

// connect to the database
include('connect.inc');

if(isset($_SESSION['username'])){ 

    if(isset($_GET['reid']) AND isset($_GET['cmtid']) ) {
        
        $result_count11233 = mysqli_query($conn,"SELECT * FROM `comment` WHERE commu_id = $_GET[reid] AND cmt_id = $_GET[cmtid] LIMIT 1");
        $count11233 = mysqli_num_rows($result_count11233);
        if($count11233 == 1){

            $result_count1123300 = mysqli_query($conn,"SELECT * FROM `comment` WHERE commu_id = $_GET[reid] AND cmt_id = $_GET[cmtid] LIMIT 1");
            $row333 = mysqli_fetch_array($result_count1123300);
            if($row333['user_id'] == $_SESSION['userid']){
               
                
                  $sql555 = "DELETE FROM comment WHERE cmt_id = $_GET[cmtid]";
        $query555 = mysqli_query($conn,$sql555);


                    if($query555) { 
                        echo "<script>";
                        echo"Swal.fire(
                            'Deleted Successfully!',
                            '',
                            'success'
                        )";
                        header('Refresh: 2; URL=community_detail.php?commu_id='.$_GET['reid'].'');
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
        }else{
            header('Location: index.php');    
        }
    
    }else{
        header('Location: index.php');    
    }
}else{

    header('Location: index.php');
}