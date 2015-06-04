<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #contact-modal {color: black;}
        #contact-heading {margin-bottom: 20px;}
        #message {resize: none;}
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        <div class="container">
            
            <h1 id="contact-heading">Contact information</h1>
            <div id="contact-info">      
            <p>
                Dreamhack Challenge AB<br>
                Stockholms universitet, SE-106 91 Stockholm<br>
                Universitetsvägen 10 A<br>
                08-12 34 56<br>
            </p>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contact-modal" data-whatever="">Send us a message</button>

            <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="contactHeading" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanForms()"><span aria-hidden="true">&times;</span></button>
                            <h4 id="contactHeading" class="modal-title">Contact us</h4>
                        </div>
                        <div class="modal-body">
                            <form id="contact-form" role="form" method="post">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="username" class="form-control" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contact-email">Email:</label>
                                    <input type="email" id="contact-email" name="email" placeholder="example@domain.com" class="form-control" maxlength="254" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message:</label>
                                    <textarea id="message" name="message" class="form-control"></textarea>
                                </div>
                                <div id="recaptcha2"></div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="validateForm()">Send</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cleanForms()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'template/footer.php'; ?>
    </div>

</body>
    <!-- Needed to make it possible to have multiple recaptchas on one page. -->
    <script>
      var recaptcha2;
      var multipleCaptcha = function() {
        //Render the recaptcha2 on the element with ID "recaptcha2"
        recaptcha2 = grecaptcha.render('recaptcha2', {
          'sitekey' : '6LfzwQYTAAAAAGRb0kllCxB2qV3Jh-qPRcsU806x', 
          'theme' : 'light'
        });
      };
    </script>
    
    <!-- Contains functions used by the contact form validation script. -->
    <script src='scripts/error_functions.js'></script>
    
    <!-- Contains code to validate data sent with the contact form. Passes the data on to the server if the validation is passed. -->
    <script src="scripts/contact_form_validation.js"></script>
</html>


