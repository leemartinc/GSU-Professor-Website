<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';


if($_SERVER['REQUEST_METHOD'] != 'POST') {
    
    ?>

    <form method='post' action=''>
        Category name: <input type='text' name='event_title' />
        Category description: <textarea name='event_description' />
        <input type='submit' value='Add category' />
     </form>
    
    <?php
    
    
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