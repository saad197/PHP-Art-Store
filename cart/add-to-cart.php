<?php 

if(isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Cancel') {
        header('Location: ../works.php');
    }
}  

echo '<pre>';
print_r($_POST);
echo '</pre>';

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
    $cartPaintings[$paintingID] = $paintingID;
}

$_SESSION['CartPaintings'] = $cartPaintings;

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

//header('Location: ../view-shopping-cart.php');

?>