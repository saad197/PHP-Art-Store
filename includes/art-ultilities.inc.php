<?php
include('config.inc.php');
$filePath = "classes/art.class.php";
if(file_exists($filePath)) {
    include($filePath);
}
else {
    include('../' . $filePath);
}

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
            //adding for duplicate entries for same painting id
            if(array_key_exists($aPainting->getPaintingID(),$paintings)) {
                //adding new subject names if not exist in array subjects
                $newSubjectName = $row['SubjectName'];
                $subjectNames = $paintings[$aPainting->getPaintingID()]->getSubjectName();
                if(!in_array($newSubjectName, $subjectNames)){
                    $paintings[$aPainting->getPaintingID()]->setSubjectName($newSubjectName);
                }
                //adding new genres names if not exist in array genres
                $newGenereName = $row['GenreName'];
                $genereNames = $paintings[$aPainting->getPaintingID()]->getGenresName();
                if(!in_array($newGenereName, $genereNames)){ 
                    $paintings[$aPainting->getPaintingID()]->setGenresName($newGenereName);
                }
            }
            else {
                $paintings[$aPainting->getPaintingID()] = $aPainting;
            }
        }
        $pdo = null;
        return $paintings[$paintingsID];
    } catch(PDOException $e) {
        die($e->getMessage());
        return null;
    }
}

function getTopSevenArtist() {
    $topSevenArtistId = array();
    $topSevenArtistNames = array();
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT ArtistID, CONCAT_WS(' ', FirstName, LastName) AS FullName
                FROM Artists
                LIMIT 7";
        $result = $pdo->query($sql);
        while($row = $result->fetch()) {
            $topSevenArtistId[] = $row['ArtistID'];
            $topSevenArtistNames[] = $row['FullName'];
            $topSevenArtistInfo['id'] = $topSevenArtistId;
            $topSevenArtistInfo['name'] = $topSevenArtistNames;
        }
        $pdo = null;
        return $topSevenArtistInfo;
        
    }catch(PDOException $e) {
        die($e->getMessage());
        return null;
    } 
}

function getTopFourGenre() {
    $topFourGenreNames = array();
    $topFourGenreId = array();
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT GenreID, GenreName
                FROM Genres
                LIMIT 4";
        $result = $pdo->query($sql);
        while($row = $result->fetch()) {
            $topFourGenreId[] = $row['GenreID'];
            $topFourGenreNames[] = $row['GenreName'];
            $topFourGenreInfo['id'] = $topFourGenreId;
            $topFourGenreInfo['name'] = $topFourGenreNames;
        }
        $pdo = null;
        return $topFourGenreInfo;
        
    }catch(PDOException $e) {
        die($e->getMessage());
        return null;
    } 
}

?>