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
            $subList[] = $subjectList;
        }
        $pdo = null;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $subList;
}
?>