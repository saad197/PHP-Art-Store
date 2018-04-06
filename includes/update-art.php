<?php
// session_start();
// include('config.inc.php');

if(isset($_SESSION['PaintingIdToUpdate'])) {
    $paintingId = $_SESSION['PaintingIdToUpdate'];
}

$newTitle = $_POST['title'];
$newDescription = $_POST['desc'];
$newGenreName = $_POST['genreName'];
$newSubjectName = $_POST['subjectName'];
$newMedium = $_POST['medium'];
$newYearOfWork = $_POST['year'];
$newMuseumLink = $_POST['museum'];

// connect db of to Paintings table to update title, description, medium, year of work, museumlink

function updateArtInfoFromPaintingTable($newTitle, $newdesc, $medium ,$newMuseum ,$paintingID) {
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Paintings 
                SET Title = :title, 
                    `Description` = :desc, 
                     Medium = :medium, 
                     MuseumLink = :museum
                WHERE PaintingID = :paintingId";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':title', $newTitle);
        $statement->bindValue(':desc',$newdesc);
        $statement->bindValue(':medium',$medium);
        $statement->bindValue(':museum',$newMuseum);
        $statement->bindValue(':paintingId',$paintingID);
        $statement->execute();
    }catch(PDOException $e) {
        die($e->getMessage());
    }
}

// connect db to Genres table to update genreName
function updateArtInfoFromGenreTable($genreName, $paintingID) {
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE Genres 
                SET GenreName = :genreName
                WHERE GenreID = 
                    (SELECT PaintingGenres.GenreID 
                     FROM PaintingGenres 
                     WHERE PaintingGenres.PaintingID = :paintingId
                     LIMIT 1)';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':genreName', $genreName);
        $statement->bindValue(':paintingId',$paintingID);
        $statement->execute();
    }catch(PDOException $e) {
        die($e->getMessage());
    }
}

//connect db to Subject table to update subjectName
function updateArtInfoFromSubjectTable($newSubjectName, $paintingID) {
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Subjects 
                SET SubjectName = :subjectName
                WHERE SubjectID = 
                    (SELECT PaintingSubjects.SubjectID 
                     FROM PaintingSubjects 
                     WHERE PaintingSubjects.PaintingID = :paintingId
                     LIMIT 1)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':subjectName', $newSubjectName);
        $statement->bindValue(':paintingId',$paintingID);
        $statement->execute();
    }catch(PDOException $e) {
        die($e->getMessage());
    }
}

// updateArtInfoFromPaintingTable($newTitle, $newDescription, $newMedium, $newMuseumLink, $paintingId);
// updateArtInfoFromGenreTable($newGenreName, $paintingId);
// updateArtInfoFromSubjectTable($newSubjectName, $paintingId);


?>