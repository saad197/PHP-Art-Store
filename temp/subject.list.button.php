<?php include("../includes/subject-ultilities.inc.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("../includes/head.inc.php"); ?>
<body>
    <div class = "dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select subjectList
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php 
                $subList = getSubjectList();
                foreach($subList as $listOfSubject)
                {
                    echo '
                    <li>'.$listOfSubject->getSubjectID().' '.$listOfSubject->getSubjectName().'</li>';
                }
            ?>
        </ul>
    </div>
<?php include("includes/scripts.inc.php"); ?>
</body>
</html>