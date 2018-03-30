<?php 
    include 'config-inc.php';
    include 'classes/artist.class.php';

    
    function getArtistDetails($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT ArtistID, ArtistLink, FirstName, LastName, Gender, Nationality, YearofBirth, YearOfDeath
                      FROM artists WHERE artistID = ? ";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $artistID);
            $statement->execute();
            $row = $statement->fetch();
            $artist = new Artist($row['ArtistID'], $row['ArtistLink'], " ", $row['FirstName'], $row['LastName'], $row['Gender'], $row['Nationality'], $row['YearofBirth'], $row['YearOfDeath']);
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
        echo $artist->getArtistID();
        echo "<br>";
        echo $artist->getArtistLink();
        echo "<br>";
        echo $artist->getFirstName();
        echo "<br>";
        echo $artist->getLastName();
        echo "<br>";
        echo $artist->getGender();
        echo "<br>";
        echo $artist->getNationality();
        echo "<br>";
        echo $artist->getYearOfBirth();
        echo "<br>";
        echo $artist->getYearOfDeath();
    }
?>