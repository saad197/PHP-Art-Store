<?php
include("includes/config.inc.php");
include("classes/subject.list.class.php");

function getSubjectList() {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT SubjectID, SubjectName FROM subjects";
        $result = $pdo->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $subjectList = new SubjectList($row['SubjectID'], $row['SubjectName']);
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