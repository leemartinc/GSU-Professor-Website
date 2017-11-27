<?php

require __DIR__ .'/vendor/autoload.php';
use Twilio\Rest\Client;

$status="<p id='status'>Delivered</p>";

function sendSMS($body){

$sid = 'AC0813947be7bb7f07d1953b9a1425f189';
$token= '647f40575b8b697db84b67cf9c2f26cc';
$client = new Client($sid,$token);


$client->messages->create(
'+16786873967',
array(
 'from' => '+16786169362',
 'body' => $body

 )
);

}
if(isset($_POST['input'])){
	$input = $_POST['input'];
	sendSMS($input);
	echo $status;
}



 ?>