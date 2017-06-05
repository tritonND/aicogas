<?php
// Simple SMS send function
function sendSMS($key, $to, $message, $originator) {
    $URL = "https://smstube.ng/api/sms/send?key=" . $key . "&to=" . $to;
    $URL .= "&text=" . urlencode( $message ) . '&from=' . urlencode( $originator );
    $fp = fopen( $URL, 'r' );
    return fread( $fp, 1024 );
}
// Example of use
$response = sendSMS( '2fca4bd432a422', '08105474433', 'Testing the smstube api for sending sms and finding how to use it properly', 'tritons.org' );
echo $response;
?>

