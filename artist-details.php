<?php
    if(isset($_GET['ArtistID']))
    {
        $artistID = $_GET['ArtistID'];
    }
    else {
        $artistID = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include('includes/artist-utilities.php');
    include("includes/head.inc.php"); 
    include('includes/primary-navigation.inc.php');
    showArtistDetials($artistID);
?>
<body>
</body>
</html>