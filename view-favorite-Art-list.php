
<?php
session_start();
$listOfFvPaintings = $_SESSION['listFvPaintings'];
if(isset($listOfFvPaintings)) {
    $aSingleRow = "";
    foreach($listOfFvPaintings as $singleFvPainting) {
        $aSingleRow .= "<tr>";
        $aSingleRow .= "<td><input type='checkbox' name='checked'><span> </span><img src='images/tiny/". $singleFvPainting[0]. ".jpg'></td>";
        $aSingleRow .= "<td>".$singleFvPainting[1]."</td>";
        $aSingleRow .= "<td>".$singleFvPainting[2]."</td>";
        $aSingleRow .= "<td>".$singleFvPainting[3]."</td>";
        $genres = "";
        foreach($singleFvPainting[4] as $genreName) {
            $genres .= $genreName . ' ';
        }
        $aSingleRow .= "<td>".$genres."</td>";
        $aSingleRow .= "<td>";
        $aSingleRow .= "<button type='button' class='btn btn-default' name='delete' onclick='deleteRow(this)'>
                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                        </button>
                        <button type='submit' class='btn btn-default' name='addToCart'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>
                        </button>";
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

        <form class="form-group" method="post" action="includes/process-favoriteList-Art-action.php">
            <fieldset>
                <legend>Paintings</legend>
                <table class="table table-hover" id="fvArtTable">
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                    <?php if(isset($aSingleRow)) { echo $aSingleRow; }?>
                </table>
                <script>
                    function deleteRow(row) {
                        // var artId = document.getElementById('fvArtTable').rows[row].cells[0].innerHTML;
                        var i = row.parentNode.parentNode.rowIndex;
                        document.getElementById("fvArtTable").deleteRow(i);
                    }
                </script>
            </fieldset>
        </form>
    </body>
</html>