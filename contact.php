<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>

    <style>
        #contact-heading {margin-bottom: 20px;}
        #message-text {resize: none;}
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
                            <label for="name" class="col-sm-2 control-label">Your name:</label>
                            <input type="text" class="form-control" id="name">
                            <?php echo "<p class='text-danger'>$nameError</p>";?>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Your email:</label>
                            <input type="email" class="form-control" id="email">
                            <?php echo "<p class='text-danger'>$emailError</p>";?>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-sm-2 control-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                            <?php echo "<p class='text-danger'>$messageError</p>";?>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>

                       </div>
                     </div>
                   </div>
                 </div>
                 </form>          
              </div>
    
    <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>

<?php
      if($_POST["submit"]){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['email'];

        $from = 'Dreamhack challenge contact form';
        $to = 'simon_palmqvist@hotmail.com';
        $subject = 'Message from contact form';

        $body ="From: $name\n E-Mail: $email\n Message:\n $Message";

        if(!$_POST['name']){
          $nameError = 'Please enter your name';        
        }

        if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $emailError = 'Please enter a valid email address';
        }

        if(!$_POST['message']){
          $messageError = 'Please enter your message';
        }

        if(!$nameError && !$emailError && !$messageError){
          if(mail ( $to, $subject, $body, $from)){
            $result = '<div class="alert alert-success">Thank you! Your message has been received.</div>';
          }
          else{
            $result = '<div class="alert alert-success">There was an error sending your message. Please try again later.</div>';
          }

        }

      }

?>