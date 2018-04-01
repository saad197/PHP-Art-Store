<?php
    if(isset($GET_['GenreID'])) {
        $genreID = $GET_['GenreID'];
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
    getGenres();
?>
<body>
</body>
</html>