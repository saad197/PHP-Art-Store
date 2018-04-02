<?php
session_start();

if(isset($_GET['PaintingID'])) {
    $_SESSION['PaintingId'] = $_GET['PaintingID'];
    $paintingIdList = $_SESSION['PaintingId'];

    if(!in_array($_GET['PaintingID'], $paintingIdList)) {
        $paintingIdList[] = $_GET['PaintingID'];
    }
}
print_r($_SESSION['PaintingId']);
print_r($paintingIdList);

?>