<?php

//connect.php
$server = 'localhost';
$username   = 'root';
$password   = 'password';
$database   = 'zodiac';

$conn = new mysqli($server, $username, $password, $database);
 
if($conn->connect_error)
{
    exit('Error: could not establish database connection');
}

?>