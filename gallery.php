<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        <div class="container" style="margin-top:5px;">
            <?php
            $counter = 0;
                foreach(glob("images/profilepictures/*.*") as $image){
                    if($counter === 0) echo "<div class='row'>";
                    
                    echo "
                        <div class='col-md-3 col-sm-6'>
                            <img src='$image' class='thumbnail img-responsive' style='border:1px solid red; width:250px; height:250px;'>
                        </div> 
                         ";
                    $counter++;
                    
                    if($counter === 4) {
                        echo "</div>";
                        $counter = 0;
                    }
                }
                ?>
        </div>
    </div>
</body>
</html>
