
<?php 
session_start();
include('server.php');
$result_count0 = mysqli_query($conn,"SELECT * FROM owned_game WHERE owned_game.user_id = $_SESSION[userid] AND owned_game.product_id = $_GET[product_id]");




if(!isset($_SESSION['userid'])){
    echo '<h1>Login to buy or rate this game</h1>';
    ?>
</div>
    <?php
}else{
if(mysqli_num_rows($result_count0) == 0){
    ?>
 <h1>You don't own this game</h1>
</div>
<?php
}else{
    
$result_count2 = mysqli_query($conn,"SELECT * FROM rate,users WHERE product_id = $_GET[product_id] AND rate.user_id = $_SESSION[userid]");

if(mysqli_num_rows($result_count2) == 0){
    ?>

  <div style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid;">
    <center><p>Rate this game! you haven't rate yet</p></center>
    <form name="form1" method="post" action="server.php">
    
    <center> <select name="ratescore">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    </select><br><br>
    <input type="hidden" name="user12" value='<?php echo $_SESSION['userid']?> '>
    <input type="hidden" name="pid12" value='<?php echo $_GET['product_id']?> '>
        <button type="submit" id="submit1" class="btn btn-primary" name="ratego2">Rate</button>
    
    </center>
    </form>
</div>

<?php
}else{
?>
<h1>You have already rated this game</h1>
<?php
}

?>
</div>
<?php
}
}
?>





</div><br><br>
<?php

$result_count1 = mysqli_query($conn,"SELECT * FROM rate,users WHERE product_id = $_GET[product_id] AND rate.user_id = users.user_id");
while($row1 = mysqli_fetch_array($result_count1)){
    ?>
<div style="background-color: #F5F5F5; padding:5% ;border-width: 2px; border-style: solid;">
    <?php echo 'User '. '<span class="badge badge-primary">'.$row1['username'] .'</span>'.' Rated this game '."<span class='badge badge-primary'>".$row1['rate'].'</span>';?>
</div><br>
<?php
    }
    ?>
    <br><br>

   


