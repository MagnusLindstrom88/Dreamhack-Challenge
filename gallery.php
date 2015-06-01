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
                            <div class='col-lg-4 col-sm-6 col-xs-12'>
                                <img src='$image' class='thumbnail img-responsive' style='width:inherit;'>
                            </div
                        ";
                }?>
        </div>
        </div>
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>