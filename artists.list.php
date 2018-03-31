<?php 
include("includes/config.inc.php");
$searchResult = $_REQUEST['str'];
function getArtList($searchResult) {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT ArtistID, FirstName, LastName FROM Artists where FirstName Like '$searchResult%'";
        $result = $pdo->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $artisttList = $row['FirstName'].' '.$row['LastName'];
            $artList[$row['ArtistID']] = $artisttList;
        }
        $pdo = null;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return  $artList;
}
$artists = getArtList($searchResult);
foreach($artists as $key => $value)
{
    echo '
    <a href = "artist-details.php?artistID='.$key.'"><li>'.$value.'</li></a>';
}
?>