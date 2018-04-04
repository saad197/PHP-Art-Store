<?php
session_start();

if(isset($_SESSION['PaintingIdToUpdate'])) {
    $paintingId = $_SESSION['PaintingIdToUpdate'];
}

echo $paintingId;
echo"<pre>";
print_r($_POST);
echo"</pre>";

$newTitle = $_POST['title'];
$newDescription = $_POST['desc'];
$newGenreName = $_POST['genreName'];
$newSubjectName = $_POST['subjectName'];
$newYearOfWork = $_POST['year'];
$newMedium = $_POST['museum'];

// connect db of to Paintings table to update title, description, medium, year of work, museumlink

function updateArtInfoFromPaintingTable() {
    try {


    }catch(PDOException $e) {
        die($e->getMessage());
    }

}

// connect db to Genres table to update genreName
function updateArtInfoFromGenreTable() {
    // do sth
}

//connect db to Subject table to update subjectName
function updateArtInfoFromSubjectTable() {
    // do sth
}
?>