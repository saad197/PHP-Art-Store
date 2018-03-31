<?php 
    include('config.inc.php');
    include('classes/artist.class.php');
    require('art-ultilities.php');

    function getArtistDetails($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT ArtistID, ArtistLink, FirstName, LastName, Gender, Nationality, YearofBirth, YearOfDeath, Details
                      FROM Artists WHERE artistID = ? ";
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

    getArtWorkByArtist(1);
    function getArtWorkByArtist($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT PaintingID FROM Paintings WHERE ArtistID = ? ";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $artistID);
            $statement->execute();
            while($row = $statement->fetch()) {
                //ArtWorks[] = getArtDetails();
            }
            $pdo = null;
            return $artist;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }
?>