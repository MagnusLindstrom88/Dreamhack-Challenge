<?php
require_once '../init.php';
    
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$captcha = $_POST['g-recaptcha-response'];

$from = 'noreply@hotmail.com';
$to = 'simon_palmqvist@hotmail.com';
$subject = 'Message from ' . $name;
$body ="From: $name\n E-Mail: $email\n Message:\n $message";

//Verify the captcha by sending a POST-request to Google's server.
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array('secret' => '6LfzwQYTAAAAAAkbkImDqmDj6l27DDwdXIGqtVv5', 'response' => $captcha);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$result = json_decode($result, true);

//If the verification of the captcha was successful.
if($result['success']) {
    mail($to, $subject, $body, $from);
    echo "Thank you! Your message has been received.";
}
else echo "Failed to submit, please try again.";