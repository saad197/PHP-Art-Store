<?php

if(session_status() == PHP_SESSION_NONE) {         
    session_start();     
}

// collecting quantity for each paintings in cart
if(isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, "quantity")) {
            $quantity[extractNum($key, "=>")] = $value;
        }
    }
}

// storing quantity into session variable 
if(isset($_SESSION['CartPaintings'])) {
    foreach ($_SESSION['CartPaintings'] as $cartPaintingID => $cartPainiting) {
        if(array_key_exists($cartPaintingID, $quantity)) {
            $_SESSION['CartPaintings'][$cartPaintingID]['quantity'] = $quantity[$cartPaintingID]; 
        }
    }
}

function extractNum($str, $delimeter) {
    $pos = stripos($str, $delimeter);
    $quantity = substr($str, 0, $pos);
    return $quantity;
}

if(isset($_POST['Delete']) && isset($_SESSION['CartPaintings'])) {
    $deleteID = $_POST['Delete'];
     if(isset($_SESSION['CartPaintings'][$deleteID])) {
         unset($_SESSION['CartPaintings'][$deleteID]);
     }
     header('Location: ../view-shopping-cart.php');
}

header('Location: checkout.php');

?>