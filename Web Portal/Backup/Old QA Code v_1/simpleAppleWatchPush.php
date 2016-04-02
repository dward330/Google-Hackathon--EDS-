<?php 
$deviceToken = '20f723669b3e758965b71f486a8434466442d3b01653dd728b16daa7bc2dd920'; 
$passphrase = '123456'; 
$message = 'Pinacle Notification to oper001!_ Test'; 
$ctx = stream_context_create(); 
stream_context_set_option($ctx, 'ssl', 'local_cert', 'PinaclePushDev.pem'); 
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase); 
$fp = stream_socket_client( 
        'ssl://gateway.sandbox.push.apple.com:2195', $err, 
        $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); 

if (!$fp) 
        exit("Failed to connect: $err $errstr" . PHP_EOL); 

echo 'Connected to APNS'. PHP_EOL; 

$body['aps'] = array( 
        'alert' => $message, 
        'badge' => 50, 
        'sound' => 'default' 
        ); 

$payload = json_encode($body); 
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload; 
$result = fwrite($fp, $msg, strlen($msg)); 

if (!$result) 
        echo 'Message not delivered' . PHP_EOL; 
else 
        echo 'Message successfully delivered' . PHP_EOL; 

// Close the connection to the server 
fclose($fp); 
?>