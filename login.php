<?php

if(isset($_POST['login'])) {
    
    session_start();
    
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
    
    
    function searchDB($search){
        
        $query = "SELECT * FROM `allusers` WHERE `campusid`='$search'";
        $result = mysql_query($query) or die (mysql_error());
        if($result) {    
            return true;
        }
   else
     { 
       return false;  
     }
        
    }
  
    
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

             
            $result = $conn->query("SELECT id FROM zodiac WHERE campusid = '$campus_id'");
if ($result->num_rows == 0)

    {
            //header('Location: firstTime.html')
        header('Location: home.html');
    
    }
else
    {
        //login true...db exists
        //header('Location: home.html');
    //session active
//                $_SESSION['valid'] = true;
//                $_SESSION['timeout'] = time();
//                $_SESSION['username'] = $campus_id;
        
    
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
        echo "<script type='text/javascript'>alert('was not able to connect to GSU snowball server');</script>";
    }
}
 
else{
    //ERROR MESSAGE TO BROWSER ABOUT CREDENTIALS
    echo "<script type='text/javascript'>alert('wrong credentials');</script>";}
}

?>


