<?php
session_start();

include('classes/connect.php');
include('classes/login2.php');
include('classes/user.php');
include('classes/post.php');

//check login
$login = new Login();
$user_data = $login->check_login($_SESSION['sharespace_id']);

$request_id=$id=isset($_REQUEST['id'])?$_REQUEST['id']:0;
if($request_id==0 || $request_id==''){
  if(isset($_SESSION['sharespace_id']) && is_numeric($_SESSION['sharespace_id'])){
  $id = $_SESSION['sharespace_id'];
  }
}else{
    
}
//post code
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $post = new Post();
  
  $result = $post->create_post($id,$_POST);//posts is an array with rows of posts
  //if nothing goes wrong
  if($result == ""){
    header("Location: profilepage.php");
    die;
  }
  //if there is an error
  else{
    echo "The following errors occured: ";
    echo $result;
  }
}
//collect posts
$post = new Post();

$id = $_SESSION['sharespace_id'];

$posts = $post->get_posts($id);
//collect friends
$user = new User();

$id = $_SESSION['sharespace_id'];

$friends = $user->get_friends($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="profilepage.css">
  <script defer src="profilepage.js"></script>
</head>
<body>
<div id='bar'> 
 <div id="in-bar" style="margin: auto;width: 800px;font-size:20px;">
    <img src="Bailey_Logo_1.jpg" alt="Sharespace Logo" width="50" height="50">
    <h1>ShareSpace</h1>&nbsp &nbsp &nbsp
    <input type="text" id="search" placeholder="Search here">
      <?php if (!isset($_REQUEST['id'])) { ?>
    <a href="logout.php"><span style = "color: black;float: right; margin: 10px;">Logout</span></a>
     <?php } ?>
  </div>
</div>
<div id="pictures">
<?php
  $image = "";
  if(file_exists($user_data['profile_image'])){
    $image = $user_data['profile_image'];
  }
   $image2 = "";
   if(file_exists($user_data['cover_image'])){
    $image2 = $user_data['cover_image'];
   }
  ?>
  <div style="text-align:center;">  
    <img id = "cover_pic" src = "<?php echo $image2?>" style="width:100%;">
    <img id="profile_pic" src = "<?php echo $image?>">
    <br>
    <a href="changeImage.php"> <button>Change Profile Image</button></a>
    <br>
    <a href="changeCoverImage.php"> <button>Change Cover Image</button></a>
  </div>
</div>
    <?php if (isset($_REQUEST['id'])) {
        $user_id = $_SESSION['sharespace_id'];
        $is_friend = $user-> get_friends($user_id,$request_id);
        ?>
            <?php if($is_friend): ?>
            <a href="unfriend.php?friend_id=<?= $request_id ?>"><button>Remove as friend</button></a>
            <?php else : ?>
            <a href="friend.php?friend_id=<?= $request_id ?>"><button>Add as Friend</button></a>
            <?php endif;?>
    <?php } ?>
<div id='main'>
<div id='side'>
<button type="button" class="collapsible">Online</button>
<div class="content">
  <p><?php
  if($friends){
    foreach($friends as $friend_row){
      include("users.php");
    }
  }?></p>
</div>
<button type="button" class="collapsible">About</button>
<div class="content">
  <p>To be added at a later date...</p>
</div>
</div>
<div id='posts'>
  <h1><?php echo $user_data['username'] ?></h1>
  <div style="border: solid black; padding: 10px; min-height: 400px;">
  <form method="post">
    <textarea name="post_text" placeholder="What's on your mind?"></textarea>
    </div>
    <input id="post_button" type = "submit" value="Post">
  </form>
  <h1>Posts</h1>
   <!--posts display here-->
   <?php
  if($posts){
    foreach($posts as $row){
      $user = new User();
      $row_user = $user-> get_user($row['userid']);
      include("posts.php");
    }
  }
  ?>
</div>
</div>
</body>
</html>