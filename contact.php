<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>

    <style>
        #contact-heading {margin-bottom: 20px;}
        #message-text {resize: none;}
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
                            <input type="text" class="form-control" id="name">
                          </div>
                          <div class="form-group">
                            <label for="email" class="control-label">Your email:</label>
                            <input type="email" class="form-control" id="email">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
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
