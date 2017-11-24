<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';


if($_SERVER['REQUEST_METHOD'] != 'POST') {
    
    ?>

    <form method="post" action=''>
        Event Info: <input type="text" name="event_title" /><br>
        Event Date: <input type="date" name="event_date" /><br>
        <input type="submit" value="Add Event">
     </form>

    <?php
    
    
}
    else{
        
$usererror='0';


if(empty($_POST['event_title']) || 
   empty($_POST['event_date'])){
    $usererror='1';
}

    $name=$_POST['event_title']; 
    $date=$_POST['event_date']; 
    
    
if($usererror == '0'){
     
    //add to DB
             $sql = "INSERT INTO `events` (`title`, `date`, `created`, `modified`, `status`) VALUES
('" . $name . "', '" . $date . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1);";
             
    if(mysqli_query($conn, $sql)){
    
        echo 'New event successfully added.';
      
// the message
$msg = "New event added by professor\n\nEvent: " . $name . " ";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
        
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();        

// send email
mail("mobeel5356@gmail.com","My subject",$msg,$headers);

        header ( 'Location: /calendar/calendar.php' );
    
    } else{ 
    echo 'An error occured while inserting your data. Please try again later. error1' . mysqli_error($conn);
    }                        
     
}

 
else{
    //ERROR MESSAGE TO BROWSER ABOUT CREDENTIALS -- USER ERROR
    echo "<script type='text/javascript'>alert('Only an instructor or admin can add a category');</script>";}
}




include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>