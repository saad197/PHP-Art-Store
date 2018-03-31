<?php
// private $paintingID;
// private $artistID;
// private $artitsName;
// private $galleryID;
// private $galleryName;
// private $imageFileName;
// private $title;
// private $shapID;
// private $shapeName;
// private $copyrightText;
// private $description;
// private $yearOfWork;
// private $width;
// private $heigh;
// private $medium;
// private $cost;
// private $genresName;
// private $subjectName;
include('config.inc.php');
include('../classes/art.class.php');

function getPaintingList() {
    try{
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.PaintingID, Artists.ArtistID, CONCAT_WS(' ',Artists.FirstName, Artists.LastName) AS ArtistName, 
                Galleries.GalleryID, GalleryName, ImageFileName, Title, Paintings.ShapeID, ShapeName, CopyrightText, Paintings.Description, 
                YearOfWork, Width, Height, Medium, Cost, GenreName, SubjectName
                FROM Paintings JOIN PaintingSubjects ON Paintings.PaintingID = PaintingSubjects.PaintingID
                                JOIN Subjects ON PaintingSubjects.SubjectID = Subjects.SubjectID
                                JOIN PaintingGenres ON Paintings.PaintingID = PaintingGenres.PaintingID
                                JOIN Genres ON PaintingGenres.GenreID = Genres.GenreID
                                JOIN Artists ON Paintings.ArtistID = Artists.ArtistID
                                JOIN Galleries ON Paintings.GalleryID = Galleries.GalleryID
                                JOIN Shapes ON Paintings.ShapeID = Shapes.ShapeID";
        $result = $pdo->query($sql);
        while($row=$result->fetch()) {
            $aPainting = new Art($row['PaintingID'],$row['ArtistID'],$row['ArtistName'],$row['GalleryID'],
                                $row['GalleryName'],$row['ImageFileName'],$row['Title'],$row['ShapeID'],$row['ShapeName'],
                                $row['CopyrightText'],$row['Description'],$row['YearOfWork'],$row['Width'],
                                $row['Height'],$row['Medium'],$row['Cost'],$row['GenreName'],$row['SubjectName']);
            $paintings[$aPainting->getPaintingID()] = $aPainting;
        }
         return $paintings;
        $pdo = null;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}
$paintings = getPaintingList();

foreach ($paintings as $paint) {
    echo"<pre>";
    print_r($paint);
    echo"</pre>";
}

?>