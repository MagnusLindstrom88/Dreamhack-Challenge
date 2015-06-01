<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/contact_head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/contact_header&navbar.php'; ?>
        <div class="container">
        </br>
            <div class='row'>
            <?php
            $count=0;
                foreach(glob("images/*.*") as $image){
                    $count+=1;
                    if($count==4){
                        $count = 0;
                        echo "
                                <div class='row'></div>
                             ";
                    }
                    echo "
                            <div class='col-md-3 col-sm-6'>
                                <img src='$image' class='thumbnail img-responsive' style='border:1px solid red; width:250px; height:250px;'>
                            </div>    
                            
                        ";
                }?>
            </div>    
        </div>
    </div>
</body>
</html>
