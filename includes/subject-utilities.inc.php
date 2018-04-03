<?php
include("config.inc.php");
include("classes/subject.class.php");

function getSubjectList() {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT SubjectID, SubjectName FROM Subjects";
        $result = $pdo->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $subjectList = new Subject($row['SubjectID'], $row['SubjectName']);
            $subList[$row['SubjectID']] = $subjectList;
        }
        $pdo = null;
        return $subList;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}


function showSubjectsList() {
    $subjectList = getSubjectList();
    foreach ($subjectList as  $sub) {
        echo "
            <div class=\"col-md-3\">
                <div class=\"thumbnail\">
                    <a href=\"subject-details.php?SubjectID=". $sub->getSubjectID() ."\">
                        <img src=\"images/artists/".$sub->getSubjectID().".jpg\" alt=\"pic not available\">
                    </a>
                    <div class=\"caption\">
                        <p class=\"similarTitle\">
                            <a href=\"subject-details.php?SubjectID=".$sub->getSubjectID()."\">".$sub->getSubjectName()."</a>
                        </p>
                    </div>
                </div>
            </div>    
            ";
    }
}

function getSubjectAllArtWorks($subjectID) {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.PaintingID, Paintings.Title, Paintings.ImageFileName FROM PaintingSubjects
                INNER JOIN Paintings
                ON PaintingSubjects.PaintingID = Paintings.PaintingID
                WHERE SubjectID = ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $subjectID);
        $result->execute();
        while ($row = $result->fetch()) {
            $artwork['Title'] = $row['Title']; 
            $artwork['ImageFileName'] = $row['ImageFileName'];
            $artList[$row['PaintingID']] = $artwork;
        }
        $pdo = null;
        return $artList;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}

function showSubjectAllArtWork($subjectID) {
    $artworks = getSubjectAllArtWorks($subjectID);
    foreach ($artworks as $key => $work) {
        echo "
            <div class=\"col-md-3\">
                <div class=\"thumbnail\">
                    <a href=\"works.php?PaintingID=". $key ."\">
                        <img src=\"images/thumbs/".$work['ImageFileName'].".jpg\" alt=\"pic not available\">
                    </a>
                    <div class=\"caption\">
                        <p class=\"similarTitle\">
                            <a href=\"works.php?PaintingID=".$key."\">".$work['Title']."</a>
                        </p>
                    </div>
                </div>
            </div>";
    }
}


?>