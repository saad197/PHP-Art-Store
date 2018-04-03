
<?php
session_start();
$listOfFvArtist = $_SESSION['listFvArtist'];
if(isset($listOfFvArtist)) {
    // foreach ($listOfFvArtist as $item) {
    //     echo "<pre>";
    //     print_r($item);
    //     echo "</pre>";
    // }
    
    $aSingleRow = "";
    foreach($listOfFvArtist as $singleFvArtist) {
        $aSingleRow .= "<tr>";
        $aSingleRow .= "<td><input type='checkbox'><span> </span><img src='images/artists/". $singleFvArtist[0]. ".jpg'></td>";
        $aSingleRow .= "<td>".$singleFvArtist[1]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[2]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[3]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[4]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[5]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[6]."</td>";
        $aSingleRow .= "<td>";
        $aSingleRow .= "<button type='button' class='btn btn-default'>
                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                        </button>
                        ";
        $aSingleRow .= "</td>";
        $aSingleRow .= "</tr>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
    </head>
    <body>
        <?php include('includes/primary-navigation.inc.php');?>

        <form class="form-group">
            <fieldset>
                <legend>Paintings</legend>
                <table class="table table-hover">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Nationality</th>
                        <th>Gender</th>
                        <th>Year of birth</th>
                        <th>Year of death</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    <?php if(isset($aSingleRow)) { echo $aSingleRow; }?>
                </table>
            </fieldset>
        </form>
    </body>
</html>