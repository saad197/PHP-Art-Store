<?php 
include("../includes/config.inc.php");
$searchResult = $_POST['search'];

function getArtistNames($searchResult) {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT ArtistID, FirstName, LastName FROM Artists where FirstName Like ? OR LastName LIKE ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $searchResult."%");
        $result->bindValue(2, $searchResult."%");
        $result->execute();
        $artistNameList = array();
        while ($row = $result->fetch()) {
            $artistName = $row['FirstName'].' '.$row['LastName'];
            $artistNameList[$row['ArtistID']] = $artistName;
        }
        $pdo = null;
        return $artistNameList;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}
$artists = getArtistNames($searchResult);
foreach($artists as $key => $value)
{
    echo '<a href = "../artist-details.php?artistID='.$key.'"><li>'.$value.'</li></a>';
}
?>