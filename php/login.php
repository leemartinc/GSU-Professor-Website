<?php 

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
    
    //CHECK IF CONNECTION SUCCESSFULL
    if(ssh2_auth_password($connection,$ssh_user,$ssh_pass)){
        $connectionerror = '0';
        
    }
    
	else{    
        $connectionerror = '1';
    }
    
    
    //DATABASE ACCESS CHECK
	 if($connectionerror == '0'){
         
         //redirect to NEW PAGE AND GRANTED ACCESS TO FEATURES
         echo "<script type='text/javascript'>alert('connected to GSU snowball server and ready to connect to database');</script>";
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


