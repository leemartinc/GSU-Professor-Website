<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
 
if (!empty($_FILES)) {
    
        
        $file__owner = $_SESSION['user_name'];
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = $_SESSION['user_filepath']; //4
     
    $targetFile =  $targetPath . $_FILES['file']['name'];  //5
 
    $result = move_uploaded_file($tempFile,$targetFile); //6
        
         if($result) {
        
        //insert to file DB
        $sql = "INSERT INTO files (file_name, file_by, file_date, file_location) VALUES ('" . $_FILES['file']['name'] . "', '$file__owner',CURRENT_TIMESTAMP, '$targetFile');";
                $result = mysqli_query($conn, $sql);
                 
                if(!$result)
                {
                    //something went wrong, display the error
                    echo 'An error occured while inserting your file to DB. Please try again later. error2' . mysqli_error($conn);
                }
        //end intert
        
        echo "<script type='text/javascript'>alert('The file " .  basename( $_FILES['uploaded_file']['name']). " has been uploaded. OK will go home');window.location = '/home.php';</script>";
    }
   
}
?> 