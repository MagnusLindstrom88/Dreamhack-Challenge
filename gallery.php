<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        <div class="container" style="margin-top:5px;">
            <h4>Here you can browse through the profile pictures of our users.</h4>
            <?php
            $counter = 0;
                foreach(glob("images/profilepictures/*.*") as $image){
                    if($counter === 0) echo "<div class='row'>";
                    $username = $db->query("SELECT username FROM users WHERE id=" . explode(".", explode("/", $image)[2])[0])->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo "
                        <div class='col-md-3 col-sm-6'>
                            <img src='$image' class='thumbnail img-responsive' style='margin-bottom:5px;'>
                            <p style='text-align:center;'>{$username[0]['username']}</p>
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
