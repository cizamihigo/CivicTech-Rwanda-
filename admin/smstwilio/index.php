<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC9b5ce8fe8c78e5b68d621874e115b797"; 
$token  = "12f31a65b03d88d9d95908d42d7166de"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+250780726524", // to 
                           array(  
                               "messagingServiceSid" => "MG9b9fbb0b55e42816871b9caa5c227df7",      
                               "body" => "\nCivicTech Rwanda.~\n Estimated user, A new project have been Added And hope it require your attention.. \n Sincerly." 
                           ) 
                  ); 
 
//print($message->sid);

header("Location: ../index.php ");