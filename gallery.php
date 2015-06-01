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
            <div class='col-lg-3 col-sm-6 col-xs-12'>
            <?php
                $directory = "images/";
                $images = glob($directory . "*.png");
                
                foreach($images as $image){
                    echo "
                            <img src='$image' class='thumbnail img-responsive'>
                        ";
                }?>
            </div>
        </div>
        </div>
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
