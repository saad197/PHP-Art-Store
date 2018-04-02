<?php
session_start();
include('art-ultilities.inc.php');

if(isset($_GET['PaintingID'])) {
    $paintingId = $_GET['PaintingID'];
} else {
    // make default since it has image
    $paintingId = 437;
}

if(isset($_SESSION['ArtWishList'])) {
    $artWishLists = $_SESSION['ArtWishList'];
    if(! in_array($paintingId, $artWishLists)) {
        $artWishLists[] = $paintingId;
    }
} else {
    $artWishLists[] = $paintingId;
}

$_SESSION['ArtWishList'] = $artWishLists;

function getListOfPaintingWishList($listOfArtWishId) {
    foreach($_SESSION['ArtWishList'] as $aWishArtId) {
        // get art data
        // make list of wish object based on each wishartId
        // store all of objects in one array
        
    }
}



?>