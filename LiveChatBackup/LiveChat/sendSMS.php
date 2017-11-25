<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

                             // Passing `true` enables exceptions
function sendSMS($message){
    $mail = new PHPMailer(true); 

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'qifanguo@gmail.com';                 // SMTP username
    $mail->Password = 'qifanerB123.';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('house941217@gmail.com', 'qifan');
    $mail->addAddress('6786873967@mms.cricketwireless.net', 'Qifan');     // Add a recipient



                                     // Set email format to HTML
    $mail->Subject = '';
    $mail->Body    = $message;
 

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
}

if(isset($_POST['input'])){
$input = $_POST['input'];
echo $input;
sendSMS($input);



}
