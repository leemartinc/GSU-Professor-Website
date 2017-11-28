<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';


if(!empty($_FILES['uploaded_file']))
  {
    
    $file__owner = $_SESSION['user_name'];
    $path = $_SESSION['user_filepath'];
    $path = $path . basename( $_FILES['uploaded_file']['name']);
        
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        
        //insert to file DB
        $sql = "INSERT INTO files (file_name, file_by, file_date, file_location) VALUES ('" . basename( $_FILES['uploaded_file']['name']) . "', '$file__owner',CURRENT_TIMESTAMP, '$path');";
                $result = mysqli_query($conn, $sql);
                 
                if(!$result)
                {
                    //something went wrong, display the error
                    echo 'An error occured while inserting your file to DB. Please try again later. error2' . mysqli_error($conn);
                }
        //end intert
        
        echo "<script type='text/javascript'>alert('The file " .  basename( $_FILES['uploaded_file']['name']). " has been uploaded. OK will go home');window.location = '/home.php';</script>";
    } else{
        echo "<script type='text/javascript'>alert('There was an error uploading the file, please try again!');window.location = '/file-drop/main-drop.php';</script>";
    }
  
}


?>