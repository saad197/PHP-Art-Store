<?php
include('config.inc.php');
include('classes/art.class.php');

function getPaintingDetails($paintingsID) {
    try{
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.PaintingID, Artists.ArtistID, CONCAT_WS(' ',Artists.FirstName, Artists.LastName) AS ArtistName, 
                Galleries.GalleryID, GalleryName, GalleryCity ,ImageFileName, Title, Paintings.ShapeID, ShapeName, CopyrightText, Paintings.Description, 
                YearOfWork, Width, Height, Medium, Cost, GenreName, SubjectName
                FROM Paintings JOIN PaintingSubjects ON Paintings.PaintingID = PaintingSubjects.PaintingID
                                JOIN Subjects ON PaintingSubjects.SubjectID = Subjects.SubjectID
                                JOIN PaintingGenres ON Paintings.PaintingID = PaintingGenres.PaintingID
                                JOIN Genres ON PaintingGenres.GenreID = Genres.GenreID
                                JOIN Artists ON Paintings.ArtistID = Artists.ArtistID
                                JOIN Galleries ON Paintings.GalleryID = Galleries.GalleryID
                                JOIN Shapes ON Paintings.ShapeID = Shapes.ShapeID
                                WHERE Paintings.PaintingID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $paintingsID);
        $statement->execute();
        $paintings = array();
        while($row=$statement->fetch()) {
            $aPainting = new Art($row['PaintingID'],$row['ArtistID'],$row['ArtistName'],$row['GalleryID'],
                                $row['GalleryName'],$row['GalleryCity'],$row['ImageFileName'],$row['Title'],
                                $row['ShapeID'],$row['ShapeName'],$row['CopyrightText'],$row['Description'],
                                $row['YearOfWork'],$row['Width'],$row['Height'],$row['Medium'],$row['Cost'],
                                $row['GenreName'],$row['SubjectName']);
            if(array_key_exists($aPainting->getPaintingID(),$paintings)) {
                // collecting a different subjects for same paintings id
                $tempSubject[] = $paintings[$aPainting->getPaintingID()]->getSubjectName();
                if(!in_array($aPainting->getSubjectName(), $tempSubject)) {
                    $tempSubject[] = $aPainting->getSubjectName();
                }
                $paintings[$aPainting->getPaintingID()]->setSubjectName($tempSubject);
                // colllecting a different genres for same paintings id
                $tempGenres[] = $paintings[$aPainting->getPaintingID()]->getGenresName();
                if(!in_array($aPainting->getGenresName(), $tempGenres)) {
                    $tempGenres[] = $aPainting->getGenresName();
                }
                $paintings[$aPainting->getPaintingID()]->setGenresName($tempGenres);
            }
            else {
                $paintings[$aPainting->getPaintingID()] = $aPainting;
            }
        }
        return $paintings[$paintingsID];
        $pdo = null;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}

?>