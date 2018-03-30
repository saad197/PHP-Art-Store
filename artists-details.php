<?php

    include 'includes/art-utilities.php';
    if(isset($POST_['artistID']))
    {
        $artistID = $POST_['artistID'];
    }
    else {
        $artistID = 1;
    }

    echo $artistID;


?>