<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
        <style>
            #edit-work-form {
                border: solid 1px grey;
                padding: 5px;
                background-color: #F8F8F8;
            }
            #art-year{
                width: 200px;
            }
            #type-box{
                border: solid 0.5px grey;
                padding : 10px;
                width: 450px;
                
            }
            #check-box{
                border: solid 0.5px grey;
                padding : 10px;
                width: 450px;
                margin-top: 10px;
            }
            #sm-buttons {
                height: 40px;
                width: 85%;
                background-color: grey;
                text-align: center;
                padding-top: 8px;
                margin-top: 20px;
            }
            #sm-buttons .form-btn {
                background-color: orange;
                color: black;
            }
        </style>
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
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Choose Genre
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                <li><a href="#">HTML</a></li>
                                <li><a href="#">CSS</a></li>
                                <li><a href="#">JavaScript</a></li>
                                </ul>
                            </div><!--end drop down for Genre-->
                            
                            <div class="dropdown">
                                <h3>Subject</h3>
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Choose Subject
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                <li><a href="#">HTML</a></li>
                                <li><a href="#">CSS</a></li>
                                <li><a href="#">JavaScript</a></li>
                                </ul>
                            </div><!--end drop down for Subject-->
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