<?php
session_start();
if(isset($_GET['PaintingID'])) {
    $_SESSION['PaintingIdToUpdate'] = $_GET['PaintingID'];
}
include 'includes/subject-utilities.inc.php';
include 'includes/genre-utilities.inc.php';

//get list of subject names
$subjects = getSubjectList();
$listSubjecName = array();
foreach($subjects as $subject) {
    $listSubjecName[] = $subject->getSubjectName();
}

//get list of genre names
$genres = getGenresFromDB();
$listGenreNames = array();
foreach($genres as $genre) {
    $listGenreNames[] = $genre->getGenreName();
}

echo"<pre>";
print_r($listGenreNames);
echo"</pre>";

echo"<pre>";
print_r($listSubjecName);
echo"</pre>";

// check duplicate genre and subject name
function checkNameDuplicate($listNames,$inputName) {
    for($i=0; $i < count($listNames); $i++) {
        if($listNames[$i] == $inputName) {
            return true;
        }
    }
    return false;
}
// validate form
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $title = $desc = $medium = $year = $museum = $genreName = $subjectName = "";
   $titleErr = $descErr = $mediumErr = $yearErr = $museumErr = $genreNameErr = $subjectNameErr = "";
   $error = array();
   if(empty($_POST['title'])) {
        $titleErr = "Titile is required";
        $error[] = $titleErr;
   } else {
        $title = checkInput($_POST['title']);
   }
   if(empty($_POST['desc'])) {
        $descErr = "Description is required";
        $error[] = $descErr;
    } else {
        $desc = checkInput($_POST['desc']);
    }
    if(empty($_POST['medium'])) {
        $mediumErr = "Medium is required";
        $error[] = $mediumErr;
    } else {
        $medium = checkInput($_POST['medium']);
    }
    if(empty($_POST['year'])) {
        $yearErr = "Year is required";
        $error[] = $yearErr;
    } else {
        $year = checkInput($_POST['year']);
        $yearPattern = "/^([0-9]{4})?$/";
        if(!preg_match($yearPattern, $year)) {
            $yearErr = "Year has to be a 4 digits number";  
            $error[] = $yearErr; 
        } else{
            $yearValue = $year;
        }
    }

    if(empty($_POST['genreName'])) {
        $genreNameErr = "Genre Name is required";
        $error[] = $genreNameErr;
    } else {
        $genreName = checkInput($_POST['genreName']);
        $isGenreNameDuplicate = checkNameDuplicate($listGenreNames, $genreName);
        echo $isGenreNameDuplicate;
        if($isGenreNameDuplicate) {
            $genreNameErr = " Genre name already exists. Please give another name.";
            $error[] = $genreNameErr;
        }
    }

    if(empty($_POST['subjectName'])) {
        $subjectNameErr = "Subject Name is required";
        $error[] = $subjectNameErr;
    } else {
        $subjectName = checkInput($_POST['subjectName']);
        $isSubjectNameDuplicate = checkNameDuplicate($listSubjecName, $subjectName);
        echo $isSubjectNameDuplicate;
        if($isSubjectNameDuplicate) {
            $subjectNameErr = "Subject name already exists. Please give another name.";
            $error[] = $subjectNameErr;
        }
    }
    $museum = checkInput($_POST['museum']);
    
    echo"<pre>";
    print_r($_POST);
    echo"</pre>";
    
    echo"<pre>";
    print_r($error);
    echo"</pre>";
    if(empty($error)) {
        require_once('includes/update-art.php');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
        <style>
            .errorMsg {
                color: red;
            }
        </style>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" 
              method="post" class"form-group">
            <legend>Edit Art Details</legend>
            <fieldset id="edit-work-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <p><label>Title</label></p>
                            <p><input type="text" name="title" class="form-control" id="art-title" 
                                value="<?php if(isset($title)){echo $title;}?>" required>
                                <span class="errorMsg"><?php if(isset($titleErr)){echo $titleErr;}?></span>
                            </p>
                        </div>
                    </div><!--end row for title-->
                    <div class="row">
                        <div class="col-md-10">
                            <p><label>Description</label></p>
                            <p><input type="text" name="desc" class="form-control" id="art-desc" value="<?php if(isset($desc)){echo $desc;}?>">
                                <span class="errorMsg"><?php if(isset($descErr)){echo $descErr;}?></span>
                            </p>
                        </div>
                    </div><!--end row for description-->
                    <div class="row">
                        <div class="col-md-5">

                            <div>
                            <h5>Genre Name</h5>
                                <p><input type="text" name="genreName" class="form-control" value="<?php if(isset($genreName)){echo $genreName;}?>">
                                    <span class="errorMsg"><?php if(isset($genreNameErr)){echo $genreNameErr;}?></span>
                                </p>
                            </div>

                            <div>
                            <h5>Subject Name</h5>
                                <p><input type="text" name="subjectName" class="form-control" value="<?php if(isset($subjectName)){echo $subjectName;}?>">
                                    <span class="errorMsg"><?php if(isset($subjectNameErr)){echo $subjectNameErr;}?></span>
                                </p>
                            </div><!--end for Subject-->

                            <br />
                            <div>
                                <h5>Medium</h5>
                                <p><input type="text" name="medium" class="form-control" id="art-medium" value="<?php if(isset($medium)){echo $medium;}?>">
                                    <span class="errorMsg"><?php if(isset($mediumErr)){echo $mediumErr;}?></span>
                                </p>
                            </div>
                            <div>
                                <h5>Year</h5>
                                <p><input type="text" name="year" class="form-control" id="art-year" placeholder="e.g 2018" 
                                          value="<?php if(isset($year)){echo $year;}?>">
                                    <span class="errorMsg"><?php if(isset($yearErr)){echo $yearErr;}?></span>
                                </p>
                            </div>
                            <div>
                                <h5>Museum</h5>
                                <p><input type="text" name="museum" class="form-control" id="art-museum" value="<?php if(isset($museum)){echo $museum;}?>">
                                    <span class="errorMsg"><?php if(isset($museumErr)){echo $museumErr;}?></span>
                                </p>
                            </div>
                        </div><!--end col for left inputs-->
                        <div class="col-md-7">
                            <div id="type-box">
                                <p>Type</p>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">Painting</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">Sculpture</label>
                                    </div>
                            </div><!--end type box-->
                            <div id="check-box">
                                <pI>Image Creative Commons Specification</p>
                                <div class="checkbox">
                                    <label><input name="imgcretive[]" type="checkbox" value="">Attribution</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="imgcretive[]" type="checkbox" value="">Noncommercial</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="imgcretive[]" type="checkbox" value="" >No Derivative Works</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="imgcretive[]" type="checkbox" value="" >Share Alike</label>
                                </div>
                            </div><!--end checkbox-->
                        </div><!--end col for right inputs-->
                    </div><!--end row for rest of form elements-->
                    <div id="sm-buttons">
                        <a href="#"><button class="form-btn" type="submit">Submit</button></a>
                        <a href="#"><button class="form-btn">Cancel</button></a>
                    </div><!--end submit buttons-->
                </div>
            </fieldset>
        </form>
    </body>
</html>