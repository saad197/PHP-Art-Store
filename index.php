<?php include("includes/art-ultilities.inc.php");?>

<?php
$listOfThreePaintings = getThreeRandomPainting();
$listOfThreeBottomPainting = getThreeRandomPainting();

?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.inc.php"); ?>

<body>
    <?php include 'includes/primary-navigation.inc.php'?>
        <!-- <div clas="container"> -->
        <div class="row">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/works/large/005050.jpg" alt="..." style="margin:auto;">
                        <div class="carousel-caption">
                            <h3 class="google-font">Francois Boucher</h3>
                            <p>This painting entitled Madame de Pompadour dates from 1758 and now resides in the National Gallery of
                                Scotland
                            </p>
                            <button type="button" class="btn btn-info">Learn More</button>
                            <br>
                            <br>
                        </div>
                    </div>

                    <?php 
                        while($row = $listOfThreePaintings->fetch()) {
                    ?>
                    <div class="item">
                        <img src="images/works/large/<?php echo $row['ImageFileName']?>.jpg" alt="..." style="margin:auto;">
                        <div class="carousel-caption">
                            <h3 class="google-font"><?php echo $row['Title']?></h3>
                            <p><?php echo $row['Excerpt']?></p>
                            <button type="button" class="btn btn-info">Learn More</button>
                            <br>
                            <br>
                        </div>
                    </div>
                <?php
                    }
                ?>   
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        <div class="row">
            <!-- <div class="container"> -->
                <?php
                while($rowBottom = $listOfThreeBottomPainting->fetch()) {
                ?>
                <div class="col-md-4 thumbnail thumbnail-style">
                    <img src="images/works/square-medium/<?php echo $rowBottom['ImageFileName']?>.jpg" class="img-circle" alt="...">
                    <div class="caption">
                        <h3 class="align-header google-font"><?php echo $rowBottom['Title']?></h3>
                        <p><?php echo $rowBottom['Description']?> &nbsp;
                        </p>
                        <button type="button" class="btn btn-default align-button"><a href="works.php?PaintingID=<?php echo $rowBottom['PaintingID']?>">View details</a>
                            <i class="fa fa-angle-double-right"></i>
                        </button>
                    </div>
                </div>
            <?php
                }
            ?>
                
            <!-- </div> -->
        </div>
    <!-- </div> -->
</body>
</html>