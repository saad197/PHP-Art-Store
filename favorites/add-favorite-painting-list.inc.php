<?php
session_start();
include('../includes/art-ultilities.inc.php');

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

print_r($_SESSION['ArtWishList']);

function getListOfPaintingWishList($listOfArtWishId) {
    $listOfFvPaintings = array();
    foreach($listOfArtWishId as $aWishArtId) {
        $anArtObject = getPaintingDetails($aWishArtId);
        // store art Id
        $aFavoriteArtId = $anArtObject->getPaintingID();
        $aFavoriteArt[] = $aFavoriteArtId;
        // store art Img name
        $aFavoriteArtImg = $anArtObject->getImageFileName();
        $aFavoriteArt[] = $aFavoriteArtImg;
        // store art title
        $aFavoriteArtTitle = $anArtObject->getTitle();
        $aFavoriteArt[] = $aFavoriteArtTitle;
        // store artist name
        $aFavoriteArtistName = $anArtObject->getArtistName();
        $aFavoriteArt[] = $aFavoriteArtistName;
        // store year of work
        $aFavoriteArtYearOfWork = $anArtObject->getYearOfWork();
        $aFavoriteArt[] = $aFavoriteArtYearOfWork;
        // store genre name
        $aFavoriteArtGenreName = $anArtObject->getGenresName();
        $aFavoriteArt[] = $aFavoriteArtGenreName;

        if(! array_key_exists($aWishArtId, $listOfFvPaintings)) {
            $listOfFvPaintings[$aWishArtId] = $aFavoriteArt;
        } 
        $aFavoriteArt = array();
    }
    return $listOfFvPaintings;
}

$listOfFvPaintings = getListOfPaintingWishList($_SESSION['ArtWishList']);
$_SESSION['listFvPaintings'] = $listOfFvPaintings;

header('Location: ' . $_SERVER['HTTP_REFERER']);


?>