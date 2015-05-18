<?php
require_once '../init.php';
if(isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
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
        //The default hashing algorithm uses a 2-character salt. There's a better alternative to crypt() but the server is running an old version of PHP that dosn't support it.
        $ps->execute(array($username, $email, crypt($password, generateSalt(2))));
        echo "Registration successful.";
    }
    else echo "Registration failed.";
}

function generateSalt($max = 15) {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
        $i = 0;
        $salt = "";
        while ($i < $max) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
        }
        return $salt;
}