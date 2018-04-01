<?php
include('includes/subject-ultilities.inc.php');
$subjects = getSubjectList();
$subjectNames = '';
foreach ($subjects as $subject) {
    if(isset($subject)) {
        $subjectNames .= "<option>{$subject->getSubjectName()}</option>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>

        <form action="" method="post" class"form-group">
            <legend>Edit Work Details</legend>
            <fieldset id="edit-work-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <p><label>Title</label></p>
                            <p><input type="text" class="form-control" id="art-title" placeholder=""></p>
                        </div>
                    </div><!--end row for title-->
                    <div class="row">
                        <div class="col-md-10">
                            <p><label>Description</label></p>
                            <p><input type="text" class="form-control" id="art-desc" placeholder=""></p>
                        </div>
                    </div><!--end row for description-->
                    <div class="row">
                        <div class="col-md-5">
                            
                            <div class="dropdown">
                                <h3>Genre</h3>
                                <select>
                                    
                                </select>
                            </div><!--end drop down for Genre-->
                            
                            <div>
                                <h3>Subject</h3>
                                <select>
                                    <?php if(isset($subjectNames)) { echo $subjectNames;}?>
                                </select>
                            </div><!--end drop down for Subject-->
                            <br />
                            <div>
                                <h5>Medium</h5>
                                <p><input type="text" class="form-control" id="art-medium" placeholder=""></p>
                            </div>
                            <div>
                                <h5>Year</h5>
                                <p><input type="text" class="form-control" id="art-year" placeholder=""></p>
                            </div>
                            <div>
                                <h5>Museum</h5>
                                <p><input type="text" class="form-control" id="art-museum" placeholder=""></p>
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
                                    <label><input type="checkbox" value="">Attribution</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Noncommercial</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="" disabled>No Derivative Works</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="" disabled>Share Alike</label>
                                </div>
                            </div><!--end checkbox-->
                        </div><!--end col for right inputs-->
                    </div><!--end row for rest of form elements-->
                    <div id="sm-buttons">
                        <a href="#"><button class="form-btn">Submit</button></a>
                        <a href="#"><button class="form-btn">Clear the form</button></a>
                        <a href="#"><button class="form-btn">Cancel</button></a>
                    </div><!--end submit buttons-->
                </div>
            </fieldset>
        </form>
    </body>
</html>