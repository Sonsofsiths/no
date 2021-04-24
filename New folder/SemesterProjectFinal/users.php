 <div id="friends">
    <?php
      $login = new Login();
      $user_data = $login->check_login($_SESSION['sharespace_id']);
    ?>
    
    <br>
    <?php echo $friend_row['username'];?>
 </div>
