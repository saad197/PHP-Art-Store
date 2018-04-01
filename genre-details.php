<?php
    if(isset($_GET['GenreID'])) {
        $genreID = $_GET['GenreID'];
    }
    else {
        $genreID = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include('includes/genre-utilities.inc.php');
    include("includes/head.inc.php"); 
    include('includes/primary-navigation.inc.php');
    displayGenresInfo($genreID);
    showPaintingForGenre($genreID);
?>
<body>
</body>
</html>