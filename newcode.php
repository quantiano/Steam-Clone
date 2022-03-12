<?php session_start();
include('server.php');
if(isset($_POST['newcode'])){
if(isset($_SESSION['username']) && isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == 1){

    
    $value = $_POST['value'];
    $codenum = rand(00000000,99999999);
    $dttm = Date("Y-m-d H:i:s");

    $query11 = "INSERT INTO redeem_code (code_number, amount, used_by, generated_by, generated_time) 
    VALUES('$codenum','$value','NULL','$_SESSION[userid]','$dttm')";
    mysqli_query($conn, $query11);
    
     if($query11){
         header("Location: admin.php");
        exit(0);
    }else{
        
        die(mysqli_error($conn));
    }
}

}else{
    header( "location:index.php" );
    exit(0);
}
?>