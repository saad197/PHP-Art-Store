<?php 
    include('art-ultilities.inc.php');
    include('classes/artist.class.php');

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
        $artWorks = getArtWorkByArtist($artistID); 
        include("includes/single-artist-details.inc.php");    
    }

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
                $artWorks[] = getPaintingDetails($row[0]);
            }
            $pdo = null;
            return $artWorks;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }
?>