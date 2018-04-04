
<?php
session_start();
if(isset($_SESSION['listFvArtist'])) {
    $listOfFvArtist = $_SESSION['listFvArtist'];
}
if(isset($listOfFvArtist)) {
    $aSingleRow = "";
    foreach($listOfFvArtist as $delID => $singleFvArtist) {
        $aSingleRow .= "<tr>";
        $aSingleRow .= "<td><input type='checkbox'><span> </span><img src='images/artists/square-thumb/". $singleFvArtist[0]. ".jpg'></td>";
        $aSingleRow .= "<td>".$singleFvArtist[1]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[2]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[3]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[4]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[5]."</td>";
        $aSingleRow .= "<td>".$singleFvArtist[6]."</td>";
        $aSingleRow .= "<td>";
        $aSingleRow .= "<button type='button' class='btn btn-default' name='delete' value = ".$delID." onclick='deleteArtistRow(this)'>
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
                <table class="table table-hover" id="FvArtistTable">
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
                <script>
                    function deleteArtistRow(row) {
                        // var artId = document.getElementById('fvArtTable').rows[row].cells[0].innerHTML;
                        var i = row.parentNode.parentNode.rowIndex;
                        document.getElementById("FvArtistTable").deleteRow(i);
                        var delID = row.value;
                        var url = "includes/delete-favorite-artist.php";
                        var param = "ArtistID=" + delID;
                        $.post(url, param, function(data) {
                            console.log(data);
                        });
                    }
                </script>
            </fieldset>
        </form>
    </body>
</html>