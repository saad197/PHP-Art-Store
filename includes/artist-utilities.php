<?php 
    include('art-ultilities.inc.php');
    $filePath = "classes/artist.class.php";
    if(file_exists($filePath)) {
        include($filePath);
    }
    else {
        include('../' . $filePath);
    }
    
    function getArtistDetails($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT ArtistID, ArtistLink, FirstName, LastName, Gender, Nationality, YearofBirth, YearOfDeath, Details
                      FROM `Artists` WHERE ArtistID = ? ";
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

    function getNumberOfSales($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT COUNT(*) AS Sales FROM OrderDetails
                        JOIN Paintings 
                        ON Paintings.PaintingID = OrderDetails.PaintingID
                        JOIN Artists
                        ON Artists.ArtistID = Paintings.PaintingID
                        WHERE Paintings.ArtistID = ? ";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $artistID);
            $statement->execute();
            $row = $statement->fetch();
            $sales = $row['Sales'];
            $pdo = null;
            return $sales;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }


    function getAllArtistNames() {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT ArtistID, FirstName FROM Artists";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            while($row = $statement->fetch()) {
                $artists[$row['ArtistID']] = $row['FirstName'];
            }
            $pdo = null;
            return $artists;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }

    function showBestSellingArtist() {
        $artists = getAllArtistNames();
        foreach ($artists as $key => $value) {
            $sales = getNumberOfSales($key);
            if($sales>0) {
                echo "
                    <div class=\"col-md-2\">
                        <div class=\"thumbnail\">
                            <a href=\"artist-details.php?ArtistID=".$key."\"><img src=\"images/artists/".$key.".jpg\" alt=\"Image not available\"></a>
                            <div class=\"caption\">
                                 <a href=\"artist-details.php?ArtistID=".$key."\"><p>".$value."</p></a>
                                <button class=\"btn btn-info\">
                                    <i class=\"glyphicon glyphicon-fire\"></i> Sales
                                    <span class=\"badge\">".$sales."</span>
                                </button>
                            </div>
                        </div>
                    </div>";
            }
        }
    }


    function showAllArtist() {
        $artists = getAllArtistNames();
        foreach ($artists as $key => $value) {
            echo "
                <div class=\"col-md-2\">
                    <div class=\"thumbnail\">
                        <a href=\"artist-details.php?ArtistID=".$key."\"><img src=\"images/artists/".$key.".jpg\" alt=\"Image not available\"></a>
                        <div class=\"caption\">
                                <a href=\"artist-details.php?ArtistID=".$key."\"><p>".$value."</p></a>
                        </div>
                    </div>
                </div>";
        }
    }

?>