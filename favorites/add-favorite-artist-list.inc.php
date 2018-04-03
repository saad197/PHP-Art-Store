<?php
session_start();
include('../includes/artist-utilities.php');

if(isset($_GET['ArtistID'])) {
    $artistId = $_GET['ArtistID'];
} 

if(isset($_SESSION['ArtistWishList'])) {
    $artistWishLists = $_SESSION['ArtistWishList'];
    if(! in_array($artistId, $artistWishLists)) {
        $artistWishLists[] = $artistId;
    }
} else {
    $artistWishLists[] = $artistId;
}

$_SESSION['ArtistWishList'] = $artistWishLists;

print_r($_SESSION['ArtistWishList']);

function getWishListOfArtist($listOfArtistId) {
    $listOfFvArtist = array();
    foreach($listOfArtistId as $aWishArtist) {
        $anArtistObject = getArtistDetails($aWishArtist);
        // store artists id
        $aFavoriteArtistId = $anArtistObject->getArtistID();
        $aFavoriteArtist[] = $aFavoriteArtistId;
        // store artist  name
        $aFavoriteArtistName = $anArtistObject->getFirstName() . " " . $anArtistObject->getLastName();
        $aFavoriteArtist[] = $aFavoriteArtistName;
        // store artist nationality
        $aFavoriteArtistNationality = $anArtistObject->getNationality();
        $aFavoriteArtist[] = $aFavoriteArtistNationality;
        // store artist gender
        $aFavoriteArtistGender = $anArtistObject->getGender();
        $aFavoriteArtist[] = $aFavoriteArtistGender;
        // store year of birth
        $aFavoriteArtistYearOfBirth = $anArtistObject->getYearOfBirth();
        $aFavoriteArtist[] = $aFavoriteArtistYearOfBirth;
        // store year of death
        $aFavoriteArtistYearOfDeath = $anArtistObject->getYearOfDeath();
        $aFavoriteArtist[] = $aFavoriteArtistYearOfDeath;
        // store artist details
        $aFavoriteArtistDetails = $anArtistObject->getDetails();
        $aFavoriteArtist[] = $aFavoriteArtistDetails;

        if(! array_key_exists($aWishArtist, $listOfFvArtist)) {
            $listOfFvArtist[$aWishArtist] = $aFavoriteArtist;
        } 
        $aFavoriteArtist = array();
    }
    return $listOfFvArtist;
}

$listOfFvArtist = getWishListOfArtist($_SESSION['ArtistWishList']);
$_SESSION['listFvArtist'] = $listOfFvArtist;
// echo"<pre>";
// print_r($_SESSION['listFvArtist']);
// echo "</pre>";
//header('Location: ../artist-details.php?status=1');



?>
