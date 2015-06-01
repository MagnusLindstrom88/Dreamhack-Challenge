<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #faq-heading {margin-bottom: 20px;}
        #faq-list li {
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
                <h1 id="faq-heading">Frequently Asked Questions</h1>
                
                <ul id="faq-list" class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">What is Dreamhack Challenge?</h4>
                        <p class="list-group-item-text">Dreamhack Challenge is a meeting place for anyone who is interested in gaming and e-sports where you can follow the event and interact, compete and bet with others.</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">How do I login?</h4>
                        <p class="list-group-item-text">In order to login you have to be registered, you can register either by creating an account on Dreamhack Challenge or by registering with your Facebook account.</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">How does the betting work?</h4>
                        <p class="list-group-item-text">When signed in you simply click on the game that your interested in, on the page of each respective supported game the matches to be played will appear. Simply click on the bet-button on the team you believe is going to win to place your bet.</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">What are your supported games?</h4>
                        <p class="list-group-item-text">The three biggest ones on the Dreamhack event, that is Dota 2, Counterstrike:Global offensive and Starcraft 2.</p>
                    </li>
                    
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">I am under 18, can I still bet?</h4>
                        <p class="list-group-item-text">Yes! Since there is no money involved in the betting you can be under 18 and still bet.</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Do you stream the matches?</h4>
                        <p class="list-group-item-text">Yes we do. Open up the page of a supported game and click on the stream-button on the navbar to open up the stream.</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">How do I change my user information or profile picture?</h4>
                        <p class="list-group-item-text">When signed in, you simply click on the my pages-button on the navbar to edit your personal information.</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Is Dreamhack Challenge created by Dreamhack officially?</h4>
                        <p class="list-group-item-text">No, Dreamhack Challange is an independent meeting place created by students from The Department of Computer and Systems Sciences (DSV) at Stockholm University.</p>
                    </li>
                </ul>
            </div>
        </div>
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
