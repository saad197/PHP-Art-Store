<?php 

//Getting painting id
if(isset($_GET['PaintingID'])) {
    $paintingID = $_GET['PaintingID'];
}
else {
    $paintingID = 437;
}

// Checks session has started or not
if(session_status() == PHP_SESSION_NONE) {         
    session_start();     
}

// Collect previous cart value
if(isset($_SESSION['CartPaintings'])) {
    $cartPaintings = $_SESSION['CartPaintings'];
    // stops override info
    if(!in_array($paintingID , $cartPaintings)) {
        $cartPaintings[] = $paintingID;
    }
}
else {
    $cartPaintings[] = $paintingID;
}

$_SESSION['CartPaintings'] = $cartPaintings;


?>