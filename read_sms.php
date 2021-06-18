<?php
require_once 'env.php';
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = $_ENV['TWILIO_ACCOUNT_SID'];
$auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = $_ENV['TWILIO_PHONE_NUMBER'];

$twilio = new Client($account_sid, $auth_token);
$messages = $twilio->messages->read([], 20); 

foreach($messages as $record) {
    print($record->from . "\n");
}