<?
session_start();
$artistID = $_POST['ArtistID'];
$_SESSION['listFvArtist'][$artistID] = array();
session_destroy();
// $listOfFvArtsToDelete = $_SESSION['listFvPaintings'];
// $selectedPaintingToDelete = $listOfFvArtsToDelete[$paintingId];
// $selectedPaintingToDelete = " ";
echo "The artist is removed";

?>