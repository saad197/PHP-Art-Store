<?php
    include('includes/subject-utilities.inc.php'); 
    if (isset($_GET['SubjectID'])) {
        $subjectID = $_GET['SubjectID'];
    }
    else {
        $subjectID = 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.inc.php"); ?>
<body>
    <?php 
        include('includes/primary-navigation.inc.php'); 
        $subjectList = getSubjectList();
        $subject = $subjectList[$subjectID];
        echo "<h2>".$subject->getSubjectName()."</h2>";
        showSubjectAllArtWork($subjectID);
    ?>
    </div>
</body>

</html>