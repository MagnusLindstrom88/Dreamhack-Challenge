<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #stream-heading {margin-bottom: 20px;}
        #stream-list li {
            background-color: #242424;
            border:1px solid #676461;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="content">
            <div class="container">
                <h1 id="stream-heading">Streaming</h1>
                
				<div id="content">
				<div class="container">
					
						<div class="row">
							<div class="col-md-8">
								STREAM RUTAN HÄR
							</div>
							<div class="col-md-4">
								CHATT RUTAN HÄR
							</div>
						</div>
					</div>
				</div>
				
                <ul id="stream-list" class="list-group">
                    <li class="list-group-item">
                           <li class="list-group-item">
                        	<p class="list-group-item-text">Stream Text</p>
						</li>
                    </li>
                </ul>
            </div>
        </div>
    
    <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
