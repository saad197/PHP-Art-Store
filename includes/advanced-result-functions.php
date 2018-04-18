<?php

function getArtbySubAndArtist($search,$subject)
{ 
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Artists.ArtistID, concat(artists.FirstName,artists.LastName) as Artists,Paintings.ImageFileName,
        Paintings.Title,Paintings.YearOfWork, Paintings.Cost
        FROM paintingsubjects JOIN subjects ON paintingsubjects.SubjectID = subjects.SubjectID 
        JOIN paintings ON paintingsubjects.PaintingID = paintings.PaintingID 
        JOIN artists on paintings.ArtistID = artists.ArtistID 
        where paintings.Title like ? and subjects.SubjectName = ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, "%".$search."%");
        $result->bindValue(2, $subject);
        $result->execute();
        $arts = array();
        while ($row = $result->fetch()) {
            $artDetails['ArtistID'] = $row['ArtistID'];
            $artDetails['Artists'] = $row['Artists'];
            $artDetails['ImageFileName'] = $row['ImageFileName'];
            $artDetails['Title'] = $row['Title'];
            $artDetails['YearOfWork'] = $row['YearOfWork'];
            $artDetails['Cost'] = $row['Cost'];
            $arts[] = $artDetails;
        }
        $pdo = null;
        return $arts;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}

function getArtBySubArtistAndGenre($search,$subject,$select)
{

    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT
        Artists.ArtistID,
        CONCAT(
            Artists.FirstName,
            Artists.LastName
        ) AS Artists,
        Paintings.ImageFileName,
        Paintings.Title,
        Paintings.YearOfWork,
        Genres.GenreName,
        Paintings.Cost
        FROM
            paintings
        JOIN paintingsubjects on Paintings.PaintingID = Paintingsubjects.PaintingID
        JOIN Paintinggenres on Paintings.PaintingID = Paintinggenres.PaintingID
        JOIN Subjects ON Paintingsubjects.SubjectID = Subjects.SubjectID
        JOIN Genres on Paintinggenres.GenreID = Genres.GenreID
        JOIN Artists ON Paintings.ArtistID = Artists.ArtistID
        WHERE
            Subjects.SubjectName = ? and Genres.GenreName = ? and Paintings.Title like ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $subject);
        $result->bindValue(2, $select);
        $result->bindValue(3, "%".$search."%");
        $result->execute();
        $arts = array();
        while ($row = $result->fetch()) {
            $artDetails['ImageFileName'] = $row['ImageFileName'];
            $artDetails['ArtistID'] = $row['ArtistID'];
            $artDetails['Title'] = $row['Title'];
            $artDetails['Artists'] = $row['Artists'];
            $artDetails['YearOfWork'] = $row['YearOfWork'];
            $artDetails['GenreName'] = $row['GenreName'];
            $artDetails['Cost'] = $row['Cost'];
            $arts[] = $artDetails;
        }
        $pdo = null;
        return $arts;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }

}

function getArtByGenre($select)
{ 
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT
        genres.GenreID,
        Artists.ArtistID,
        CONCAT(
            artists.FirstName,
            artists.LastName
        ) AS Artists,
        Paintings.ImageFileName,
        paintings.Title,
        paintings.YearOfWork,
        genres.GenreName,
        Paintings.Cost
    FROM
        paintings
    JOIN paintinggenres ON paintings.PaintingID = paintinggenres.PaintingID
    JOIN genres ON paintinggenres.GenreID = genres.GenreID
    JOIN artists ON paintings.ArtistID = artists.ArtistID
    WHERE
        genres.GenreName = ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $select);
        $result->execute();
        $arts = array();
        while ($row = $result->fetch()) {
            $artDetails['GenreID'] = $row['GenreID'];
            $artDetails['ArtistID'] = $row['ArtistID'];
            $artDetails['Artists'] = $row['Artists'];
            $artDetails['ImageFileName'] = $row['ImageFileName'];
            $artDetails['Title'] = $row['Title'];
            $artDetails['YearOfWork'] = $row['YearOfWork'];
            $artDetails['GenreName'] = $row['GenreName'];
            $artDetails['Cost'] = $row['Cost'];
            $arts[] = $artDetails;
        }
        $pdo = null;
        return $arts;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}

?>