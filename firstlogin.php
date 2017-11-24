<?php
session_start();

if(isset($_POST['continue'])) {
    
    
    
$usererror='0';
$connectionerror='0';

if(empty($_POST['campusid']) || 
   empty($_POST['password'])){
    $usererror='1';
}

    $campus_id=$_POST['campusid']; 
    $password=$_POST['password']; 
    $name=$_POST['name'];
    $email=$_POST['email'];
    $class=$_POST['class'];
    $number=$_POST['number'];
    $carrier=$_POST['carrier'];
    
    $filepath = "/home/ubuntu/gsu/" . $class . "/" . $campus_id;
    $filepathclass = "/home/ubuntu/gsu/" . $class;

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

             
    //add to DB
             $sql = "INSERT INTO `allusers` (`user_level`, `campusid` , `name` , `email`, `period` , `filelocation` , `chat` , `insession` , `datevetted`, `number`, `carrier`) VALUES ('0', '$campus_id', '$name', '$email', '$class', '$filepath','NULL', '0' , CURRENT_TIMESTAMP, '$number', '$carrier');";
             
if(mysqli_query($conn, $sql)){
    
    
    if(is_dir($filepathclass)){
         mkdir($filepath);
    }
    else{
        mkdir($filepathclass, 0777, true);
        mkdir($filepath, 0777, true);
    }
    
    $result = $conn->query("SELECT * FROM allusers WHERE campusid = '$campus_id'");
        //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['userid'];
                        $_SESSION['user_name']  = $row['name'];
                        $_SESSION['user_level'] = $row['user_level'];
                        $_SESSION['user_number']  = $row['number'];
                        $_SESSION['user_carrier'] = $row['carrier'];
                    }
    
    header('Location: home.php');
    
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}                        
             ///////////////////////////  
             //make upload folder for student
            
            
             
             //start the session and login
           //  $_SESSION['valid'] = true;
//                $_SESSION['timeout'] = time();
          //  $_SESSION['username'] = $campus_id;
             
            // header('Location: home.html');
             
             //conditional to check if it was added -- if yes, go home
             
         }

     }
    else{
        //ERROR MESSAGE TO BROWSER ABOUT CONNECTION
        echo "<script type='text/javascript'>alert('was not able to connect to GSU snowball server');</script>";
    }
}
 
else{
    //ERROR MESSAGE TO BROWSER ABOUT CREDENTIALS -- USER ERROR
    echo "<script type='text/javascript'>alert('wrong credentials');</script>";}
}

?>


