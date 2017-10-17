<?php 

if(isset($_POST['continue'])) {
    
    
    //DATABASE LOGIN SETUP
    $db_server = "localhost";
    $db_name = "zodiac";
    $db_username = "root";
    $db_password = "password";
    
    
     //connect to database
         $conn = new mysqli($db_server, $db_username, $db_password, $db_name);


    $campus_id = $_POST["campusid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $period = $_POST["period"];

    $sql="INSERT INTO  `allusers` (  `campusid` ,  `name` , `email` , `period` ) 
    VALUES ('$campus_id','$name','$email','$period')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
}

?>