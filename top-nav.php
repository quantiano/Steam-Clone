<?php 
session_start();
include('connect.inc');
if(isset($_SESSION['username'])){
$yourname = $_SESSION['username'];
}else{
    $yourname = "";
}
$sql22 = "SELECT * FROM users WHERE username='$yourname'";
$query22 = mysqli_query($conn,$sql22);
$row = mysqli_fetch_array($query22);

$yourmoney = $row['balance'];
?>
<div id="navbar" class="sticky" style="z-index:9999;">
<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="index">Store</a>
    </div>
    <div class="nav">
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list" style="z-index: 9999;width: inherit;">
        <li>
        <a href="index.php" class=""><i class="fa fa-bullhorn" aria-hidden="true"></i> Home</a>
        </li>
        <li>
        <a href="index.php#userinfo" class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Your Games</a>
        </li>
        <li>
        <a href="addfund.php" class=""><i class="fa fa-book" aria-hidden="true"></i></i> Add Fund</a>
        </li>
        <?php if (isset($_SESSION['username'])==true) {

                              if(isset($_SESSION['pid']) && $_SESSION['pid'] != ""){
                                $item = "1";
                              }else{
                                $item = "0";
                              }
                              
                               echo'<li>';
                               echo' <a href="index.php#userinfo" role="button" style="text-decoration:none;" class="">'.'<i class="fa fa-user" aria-hidden="true"></i>'." Profile". '</a>';
                               echo'</li>';
                               echo'<li>';
                               echo'<a href="#/">Profile</a>';
                               echo'<ul class="nav-dropdown">';
                               echo'<li>';
                               echo'<a href="addfund.php">'.'<i class="fa fa-money">'.'</i>'."  $".number_format($yourmoney,2).'</a>';
                               echo'</li>';
                               echo'<li>';
                               echo'<a href="editprofile.php?uid='.$_SESSION['userid'].'">'.'<i class="fa fa-user">'.'</i>'.'  Edit Info'.'</a>';
                               echo'</li>';
                               echo'</ul>';
                               echo'<li>';
                                echo'<li>';
                               echo'<a href="community.php">'.'<i class="fa fa-group">'.'</i>'.'  Community'.'</a>';
                               echo'</li>';
                               echo'<li>';
                               echo'<a href="cart.php">';
                               echo'<span class="fa-stack fa-2x has-badge" data-count='.$item.'>';
                               echo'<i class="fa fa-circle fa-stack-2x fa-inverse-red"></i>';
                               echo'<i style="" class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>';
                               echo'</span>';
                               echo'</a>';
                               echo'</li>';
                               echo'</li>';
                               echo'<li>';
                               echo '<a href="logout.php" role="button" style="text-decoration:none;" class="">'.'<i class="fa fa-sign-out" aria-hidden="true"></i>'. " Logout" . '</a>';
                               echo'</li>';
                  }else{
                    echo'<li>';
                    echo '<a href="login.php" role="button" style="text-decoration:none;" class="">'.'<i class="fa fa-sign-in" aria-hidden="true"></i>'.' Login'. '</a>';
                    echo'</li>';
                    echo'<li>';    
                    echo '<a href="register.php" role="button" style="text-decoration:none;" class="">'.'<i class="fa fa-registered" aria-hidden="true"></i>'. " Register" . '</a>';
                    echo'</li>';
                  }?>
        </div>
  </div>
</section>
                </div>
