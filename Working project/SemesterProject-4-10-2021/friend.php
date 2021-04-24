<?php

session_start();

include('classes/connect.php');
include('classes/user.php');
if (isset($_SESSION['sharespace_id']) && is_numeric($_SESSION['sharespace_id'])) {
    if (isset($_REQUEST['friend_id']) && $_REQUEST['friend_id'] != '') {
        $friend_id = $_REQUEST['friend_id'];
        $user_id = $_SESSION['sharespace_id'];
        $user = new User();
        $user->add_friend($user_id,$friend_id);
        header('location:profilepage.php?id=' . $friend_id);
    } else {
        header('location:profilepage.php');
    }
} else {
    header("Location: login.php");
    die;
}