<?php
session_start();

if(isset($_POST['login'])) {
    
    
$usererror='0';
$connectionerror='0';

if(empty($_POST['campusid']) || 
   empty($_POST['password'])){
    $usererror='1';
}

$campus_id=$_POST['campusid']; 
$password=$_POST['password']; 

if($usererror == '0'){
    // SSH Host 
    $ssh_host='snowball.cs.gsu.edu'; 
    // SSH Port 
    $ssh_port=22; 
    // SSH Username 
    $ssh_user=$campus_id; 
    // SSH Private Key Passphrase (null == no passphrase) 
    $ssh_pass=$password;
    // SSH Connection 
    $connection=ssh2_connect($ssh_host,$ssh_port);
    
    
    
    
    //DATABASE LOGIN SETUP
    $db_server = "localhost";
    $db_name = "zodiac";
    $db_username = "root";
    $db_password = "password";
    
    
    //DATABASE STUFF
     $db_check = $_POST['campusid'];
    
    
  
    
    //CHECK IF CONNECTION SUCCESSFULL
    if(ssh2_auth_password($connection,$ssh_user,$ssh_pass)){
        $connectionerror = '0';
        
    }
    
	else{    
        $connectionerror = '1';
    }
    
    
    //DATABASE ACCESS CHECK
	 if($connectionerror == '0'){
         //connect to database
         $conn = new mysqli($db_server, $db_username, $db_password, $db_name);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                echo "<script type='text/javascript'>alert('NOT connected to zodiac');</script>";
                } 
         else{
             
             
$result = $conn->query("SELECT * FROM allusers WHERE campusid = '$campus_id'");
if ($result->num_rows == 0)
    {
        header ( 'Location: firstlogin.html' );
    }
else
    {
    
    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['userid'];
                        $_SESSION['user_name']  = $row['name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }
    
    
        header( 'Location: home.php' );
    }

             
            //echo "<script type='text/javascript'>alert('connected to zodiac');</script>";
            //if first time logining in
            //create user in database
             
//            if (searchDB($campusid)){
                 //header('Location: home.html');
//            }
//             else{
//                 //show modal
             
             //temp display message
                
                 
//             }
             
             
             
         }

         //redirect to NEW PAGE AND GRANTED ACCESS TO FEATURES-move inside db conditional
        
         //header('Location: home.html');  
     }
    else{
        //ERROR MESSAGE TO BROWSER ABOUT CONNECTION
        echo "<script type='text/javascript'>alert('was not able to connect to GSU snowball server. Please try again later');</script>";
        header( 'Location: index.html' );
    }
}
 
else{
    //ERROR MESSAGE TO BROWSER ABOUT CREDENTIALS
    echo "<script type='text/javascript'>alert('Incorrect username or password ');</script>";  }
    
}

?>


