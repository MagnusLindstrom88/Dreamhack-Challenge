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
            <?php
                $directory = "images/";
                $images = glob($directory . "*.*");
                
                foreach($images as $image){
                    echo "
                            <div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                                <img src='$image' class='img-responsive'>
                            </div
                        ";
                }?>
        </div>
        </div>
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
