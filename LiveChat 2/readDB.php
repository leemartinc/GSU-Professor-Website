<?php 

require("sql_env.php");



$db = new mysqli($db_host,$db_user,$db_password,$db_name);
if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$query="SELECT * FROM inboundMessage ORDER BY id ASC";
//execute query
if ($db->real_query($query)) {
    //If the query was successful
    $res = $db->use_result();
    $body = '';

    while ($row = $res->fetch_assoc()) {
        $body=$row["input"];
        }
        echo "$body";
        mysql_query( "TRUNCATE TABLE inboundMessage" );


}else{
    //If the query was NOT successful
    echo "An error occured";
    echo $db->errno;
}

$db->close();


?>