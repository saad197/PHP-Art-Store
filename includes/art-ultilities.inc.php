<?php
include('config.inc.php');
include('../classes/art.class.php');

function getPaintingList() {
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
                                JOIN Shapes ON Paintings.ShapeID = Shapes.ShapeID";
        $result = $pdo->query($sql);
        $paintings = array();
        while($row=$result->fetch()) {
            $aPainting = new Art($row['PaintingID'],$row['ArtistID'],$row['ArtistName'],$row['GalleryID'],
                                $row['GalleryName'],$row['GalleryCity'],$row['ImageFileName'],$row['Title'],
                                $row['ShapeID'],$row['ShapeName'],$row['CopyrightText'],$row['Description'],
                                $row['YearOfWork'],$row['Width'],$row['Height'],$row['Medium'],$row['Cost'],
                                $row['GenreName'],$row['SubjectName']);
            if(array_key_exists($aPainting->getPaintingID(),$paintings)) {
                $temp[] = $paintings[$aPainting->getPaintingID()]->getSubjectName();
                if(!in_array($aPainting->getSubjectName(), $temp)) {
                    $temp[] = $aPainting->getSubjectName();
                }
                $paintings[$aPainting->getPaintingID()]->setSubjectName($temp);
            }
            else {
                $paintings[$aPainting->getPaintingID()] = $aPainting;
            }
            echo "<pre>";
            print_r($paintings);
            echo"</pre>";
        }
         return $paintings;
        $pdo = null;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}
getPaintingList();

?>