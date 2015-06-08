<?php
require_once 'init.php';

//Check if the user has betted on this match.
if(isset($_SESSION['id'])) {
    $match = $db->prepare("SELECT * FROM matches WHERE ongoing=1 AND game=?");
    $match->execute(array($_GET['game']));
    $match = $match->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($match) === 1) {
        $teams = $db->prepare("SELECT * FROM teams WHERE id=? OR id=?");
        $teams->execute(array($match[0]['team0'], $match[0]['team1']));
        $teams = $teams->fetchAll(PDO::FETCH_ASSOC);
        
        $bet = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=?");
        $bet->execute(array($_SESSION['id'], $match[0]['id']));
        $bet = $bet->fetchAll(PDO::FETCH_ASSOC);
        if(count($bet) === 1) {
            if($bet[0]['team_id'] === $teams[0]['id']) echo $teams[0]['abbreviation'];
            else if($bet[0]['team_id'] === $teams[1]['id']) echo $teams[1]['abbreviation'];
        }
    }
}