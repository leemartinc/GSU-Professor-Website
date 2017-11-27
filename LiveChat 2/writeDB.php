
<?php

//SQL method

require("sql_env.php");


$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

if(isset($_POST['Body'])){
    
    $input = $_POST['Body'];
    $myfile = fopen("data.txt","w");
    fwrite($myfile,"$input");
    fclose($myfile);
    $query="INSERT INTO inboundMessage(input) VALUES ('$input')";
if ($db->real_query($query)) {

    //If the query was successful
    echo "Wrote message to db";
}else{
    //If the query was NOT successful
    echo "An error occurred";
    echo $db->error;
}




$db->close();



}



/* SEE method
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
session_start();

if(isset($_POST['Body'])){
    $myfile = fopen("data.txt","w");
        $input = $_POST['Body'];
        fwrite($myfile,"$input");
        fclose($myfile);
        echo "data: something \n";
        echo "data: $input\n\n";
        ob_flush();
        flush();

    }
*/



/*
 Long Polling method
  $myfile = fopen("data.txt","w") or die("unable to open");
     if(isset($_POST['Body'])){
        $input = $_POST['Body'];
        fwrite($myfile,"$input");
        fclose($myfile);
        touch("data.txt");
        
    }
    */
?>






