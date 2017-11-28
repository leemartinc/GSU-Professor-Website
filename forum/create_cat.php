<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';


if($_SERVER['REQUEST_METHOD'] != 'POST') {
    
     //the form hasn't been posted yet, display it
    echo "<form method='post' action=''>
        Category name: <input type='text' name='cat_name' /><br>
        Category description: <textarea class='textareaforum' name='cat_description' /></textarea><br>
        <input type='submit' value='Add category' />
     </form>";
    
    
}
    else{
        
$usererror='0';


if(empty($_POST['cat_name']) || 
   empty($_POST['cat_description'])){
    $usererror='1';
}

    $name=$_POST['cat_name']; 
    $description=$_POST['cat_description']; 
    
    
if($usererror == '0'){
     
    //add to DB
             $sql = "INSERT INTO `categories` (`cat_name`, `cat_description`) VALUES ('$name', '$description');";
             
    if(mysqli_query($conn, $sql)){
    
        echo 'New category successfully added.';
        header ( 'Location: /forum/forum.php' );
    
    } else{ 
    
    }                        
     
}

 
else{
    //ERROR MESSAGE TO BROWSER ABOUT CREDENTIALS -- USER ERROR
    echo "<script type='text/javascript'>alert('wrong credentials');</script>";}
}




include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>