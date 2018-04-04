<?php 

if(isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Cancel') {
        header('Location: ../works.php');
    }
}  

function extractNum($str, $findme) {
    $pos = strpos($str, $findme);
    $num = substr($str, $pos + 1);
    return intval($num);
}

//storing post values in the variables 
if (isset($_POST['FrameTitle'])) {
    $frametype = $_POST['FrameTitle'];
}
else {
    $frametype = "none";
}

if (isset($_POST['FrameColor'])) {
    $frameColor = $_POST['FrameColor'];
}
else {
    $frameColor = "none";
}

if (isset($_POST['FrameStyle'])) {
    $frameStyle = $_POST['FrameStyle'];
}
else {
    $frameStyle = "none";
}

if (isset($_POST['framePrice'])) {
    $framePrice = extractNum($_POST['framePrice'], "$");
}
else {
    $framePrice = 0;
}

if(isset($_POST['GlassType'])) {
    $glass = $_POST['GlassType'];
    $findme = "$";
    $pos = strpos($glass, $findme);
    $glassPrice = intval(substr($glass, $pos + 1));
    $glasstype = substr($glass, 0, $pos - 1);
}
else {
    $glasstype = "none";
    $glassPrice = 0;
}

if(isset($_POST['MattTitle'])) {
    $mattype = $_POST['MattTitle'];
}
else {
    $mattype = "none";
}

if(isset($_POST['colorPicker'])) {
    $mattColor = $_POST['colorPicker'];
}
else {
    $mattColor = "Default";
}

if(isset($_POST['ItemPrice'])) {
    $itemPrice = extractNum($_POST['ItemPrice'], "$");
}
else {
    $itemPrice = 0;
}

if(isset($_POST['CustomizePrice'])) {
    $customPrice = extractNum($_POST['CustomizePrice'], "$");
}
else {
    $customPrice = 0;
}

if(isset($_POST['TotalPrice'])) {
    $totalPrice = extractNum($_POST['TotalPrice'], "$");
}
else {
    $totalPrice = 0;
}

// Checks session has started or not
if(session_status() == PHP_SESSION_NONE) {         
    session_start();     
}
// session_destroy();
//Collect previous cart value
if(isset($_SESSION['CartPaintings'])) {
    $cartPaintings = $_SESSION['CartPaintings'];

    // get the id of newly added painting 
    foreach ($cartPaintings as $key => $painting) {
        if ($painting['New'] == true) {
            $paintingID = $key;
        }
        else {
            header('Location: ../works.php');
        }
    }
    $paintingInfo['New'] = false;
    $paintingInfo['FrameType'] = $frametype;
    $paintingInfo['FrameColor'] = $frameColor;
    $paintingInfo['FrameStyle'] = $frameStyle;
    $paintingInfo['FramePrice'] = $framePrice;
    $paintingInfo['GlassType'] = $glasstype;
    $paintingInfo['GlassPrice'] = $glassPrice;
    $paintingInfo['MattType'] = $mattype;
    $paintingInfo['MattColor'] = $mattColor;
    $paintingInfo['ItemPrice'] = $itemPrice;
    $paintingInfo['CustomizePrice'] = $customPrice;
    $paintingInfo['TotalPrice'] = $totalPrice;
    $cartPaintings[$paintingID] = $paintingInfo;
}

$_SESSION['CartPaintings'] = $cartPaintings;

header('Location: ../view-shopping-cart.php');

?>