<?
session_start();
$paintingId = $_POST['PaintingID'];
$_SESSION['listFvPaintings'][$paintingId] = array();
session_destroy();
// $listOfFvArtsToDelete = $_SESSION['listFvPaintings'];
// $selectedPaintingToDelete = $listOfFvArtsToDelete[$paintingId];
// $selectedPaintingToDelete = " ";
echo "The row is deleted";

?>