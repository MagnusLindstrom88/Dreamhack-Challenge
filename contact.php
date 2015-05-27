<?php
      require_once 'scripts/init.php';

      if(isset($_SESSION['username']))
        $name = $_SESSION['username'];

      
      if($_POST["submit"]){
        $error = 0;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $captcha = $_POST['g-recaptcha'];

        $from = 'Dreamhack challenge contact form';
        $to = 'simon_palmqvist@hotmail.com';
        $subject = 'Message from ' . $name;

        $body ="From: $name\n E-Mail: $email\n Message:\n $message";

        if(empty($name)){
          $nameError = 'Please enter your name';        
          $error = 1;
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
          $emailError = 'Please enter a valid email address';
          $error = 1;
        }

        if(empty($message)){
          $messageError = 'Please enter your message';
          $error = 1;
        }

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
        $captchaResult = file_get_contents($url, false, $context);
        $captchaResult = json_decode($result, true);

        if(!$nameError && !$emailError && !$messageError && $captchaResult['success']){
          if(mail ( $to, $subject, $body, $from)){
            $result = '<div class="alert alert-success">Thank you! Your message has been received.</div>';
          }
          else{
            $result = '<div class="alert alert-danger">There was an error sending your message. Please try again later.</div>';
          }

        }
               

      }

      //if($error == 1){
      //    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      //    <script type="text/javascript"> $('#formModal').modal('show');</script>
      //  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>

    <style>
        #contact-heading {margin-bottom: 20px;}
        #message-text {resize: none;}
        #formModalLabel {color: #000;}
        label {color: #000;}   
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="content">

            <div class="container">
                <h1 id="contact-heading">Contact information</h1>
                
                <form role="form" method="post" action="contact.php">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal" data-whatever="">Send us a message</button>
                
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="formModalLabel">Contact us</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="name" class="control-label">Your name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="<?php if($name) { echo $name; }?>">
                            <?php echo "<p class='text-danger'>$nameError</p>";?>
                          </div>
                          <div class="form-group">
                            <label for="email" class="control-label">Your email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                            <?php echo "<p class='text-danger'>$emailError</p>";?>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                            <?php echo "<p class='text-danger'>$messageError</p>";?>
                          </div>
                          <div class="g-recaptcha" data-sitekey="6LfzwQYTAAAAAGRb0kllCxB2qV3Jh-qPRcsU806x"></div>
                        </form>
                      </div>
                      <div class="form-group">
                          <div class = "col-sm-10 col-sm-offset-2">
                            <?php echo $result; ?>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" id="submit" name="submit" value="Send message" class="btn btn-primary">
                       </div>                       
                      </div>
                  </div>                          
                </div>
                </form>
    
    <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>

