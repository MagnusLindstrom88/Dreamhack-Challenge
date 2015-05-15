<?php
echo "before require.<br>";
require_once '../init.php';
echo "after require, before function.<br>";
if(isset($_POST['email'])) {
    echo "start of function.<br>";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    echo "after saving POST data<br>";
    $captcha = $_POST['g-recaptcha-response'];
    
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
        //Insert into database with a prepared statement in order eliminate any risk of SQL injection.
        $ps = $db->prepare('INSERT INTO users(username, email, password) VALUES (?, ?, ?)');
        $ps->execute(array($username, $email, $password));
        echo "Registration successful.";
    }
    else echo "Registration failed.";
}
