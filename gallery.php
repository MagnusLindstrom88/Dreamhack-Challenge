<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/contact_head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/contact_header&navbar.php'; ?>
        <div class="container">
        <div class="row">
        </br>
            <div class='col-lg-3 col-md-4 col-xs-6 thumb'>
            <?php
                $directory = "images/";
                $images = glob($directory . "*.*");
                
                foreach($images as $image){
                    echo "
                            <img src='$image' class='img-responsive' height='40' widht='40'>
                        ";
                }?>
             </div>    
        </div>
        </div>
    </div>
    <?php require_once 'template/footer.php'; ?>
</body>
</html>
