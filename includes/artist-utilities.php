<?php 
    include 'config.inc.php';
    include 'classes/artist.class.php';

    function getArtistDetails($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT ArtistID, ArtistLink, FirstName, LastName, Gender, Nationality, YearofBirth, YearOfDeath, Details
                      FROM artists WHERE artistID = ? ";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $artistID);
            $statement->execute();
            $row = $statement->fetch();
            $artist = new Artist($row['ArtistID'], $row['ArtistLink'], $row['Details'], $row['FirstName'], $row['LastName'], $row['Gender'], $row['Nationality'], $row['YearofBirth'], $row['YearOfDeath']);
            $pdo = null;
            return $artist;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }

    function showArtistDetials($artistID) {
        $artist = getArtistDetails($artistID);
        
        include("includes/single-artist-details.inc.php");
        
        
        
        
    }
?>