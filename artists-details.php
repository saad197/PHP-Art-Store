<?php
    if(isset($POST_['artistID']))
    {
        $artistID = $POST_['artistID'];
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
<?php include('includes/scripts.inc.php'); ?>
</body>
</html>