<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';


if(!empty($_FILES['uploaded_file']))
  {
    if(!is_dir($_SESSION['user_filepath'])){
    
    mkdir($_SESSION['user_filepath'], 0700, true);
        echo "<script type='text/javascript'>alert('You didnt have space to save your file but we have created one now. Please go back and try again.');window.location = '/file-drop/main-drop.php';</script>";
    }
    else{
    $path = $_SESSION['user_filepath'];
    $path = $path . basename( $_FILES['uploaded_file']['name']);
        
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        
        echo "<script type='text/javascript'>alert('The file " .  basename( $_FILES['uploaded_file']['name']). " has been uploaded. OK will go home');window.location = '/home.php';</script>";
    } else{
        echo "<script type='text/javascript'>alert('There was an error uploading the file, please try again!');window.location = '/file-drop/main-drop.php';</script>";
    }
  }
}


?>