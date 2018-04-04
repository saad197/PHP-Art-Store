
<?php
    require('includes/art-ultilities.inc.php');

    if(isset($_GET['PaintingID'])) {
        $paintingID = $_GET['PaintingID'];
    }
    else {
        $paintingID = 437;
    }
    
    $defaultPainting = getPaintingDetails($paintingID);
    $genresNames = $defaultPainting->getGenresName();
    $genresName = '';
    // get all genre names and put in <a>
    foreach($genresNames as $element) {
        $genresName .= "<a href=''>{$element}</a>". " ";
    }

    $subjectNames = $defaultPainting->getSubjectName();
    $subjectName = '';
    // get all subject names and put in <a>
    foreach ($subjectNames as $elemnt) {
        $subjectName .= "<a href=''>{$elemnt}</a>". " ";
    }
    $ImgPath = "images/works/medium/";

    // get info for top 7 artists to display on left panel
    $listOfTopSevenArtist = getTopSevenArtist();
    $listOfTopSevenArtistNames = $listOfTopSevenArtist['name'];
    $listOfTopSevenArtistId = $listOfTopSevenArtist['id'];

    //display top 7 artist 
    $singleArtistName = "";
    for($i=0; $i < count($listOfTopSevenArtistNames); $i++) {
        $singleArtistName .= "<li><a href='artist-details.php?ArtistID=".$listOfTopSevenArtistId[$i]."'>".$listOfTopSevenArtistNames[$i]."</a></li>";
    } 

    //display top 4 genres 
    $listOfTopFourGenre = getTopFourGenre();
    $listOfTopFourGenreNames = $listOfTopFourGenre['name'];
    $listOfTopFourGenreId = $listOfTopFourGenre['id'];
    $singleGenreName = "";
    for($i=0; $i < count($listOfTopFourGenreNames); $i++) {
        $singleGenreName .= "<li><a href='genre-details.php?GenreID=".$listOfTopFourGenreId[$i]."'>".$listOfTopFourGenreNames[$i]."</a></li>";
    } 
    //display top 4 paitings 
    $listOfTopFourPainting = getTopFourArt();
    $listOfTopFourPaintingId = $listOfTopFourPainting['id'];
    $listOfTopFourPaintingTitle = $listOfTopFourPainting['title'];
    $listOfTopFourPaintingImgFileName = $listOfTopFourPainting['imgFileName'];
    $singlePanelOfArt = "";
    for($i=0; $i < count($listOfTopFourPaintingId); $i++) {
        $singlePanelOfArt .= 
        "<div class='panelspace col-md-2 thumbnail'>
            <img src='images/works/square-medium/".$listOfTopFourPaintingImgFileName[$i].".jpg' alt='...' />
            <div>
                <p class='similarTitle'>
                    <a href='works.php?PaintingID=".$listOfTopFourPaintingId[$i]."'>".$listOfTopFourPaintingTitle[$i]."</a>
                </p>
                <div class='btn-space'>
                    <button type='button' class='btn btn-primary btn-xs'>
                        <i class='glyphicon glyphicon-info-sign'></i> View</button>
                    <button type='button' class='btn btn-success btn-xs'>
                        <i class='glyphicon glyphicon-gift'></i> Wish</button>
                    <button type='button' class='btn btn-info btn-xs'>
                        <i class='glyphicon glyphicon-shopping-cart'></i> Cart</button>
                </div>
            </div>
        </div>";
    } 

?>

<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.inc.php"); ?>

<body>
    <?php include('includes/primary-navigation.inc.php');?>
        <div class="row">
            <div class="col-md-10">
                <h2 class="google-font"><?php echo $defaultPainting->getTitle();?></h2>
                <p>By
                    <a href="#"><?php echo $defaultPainting->getArtistName();?></a>
                </p>
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo $ImgPath.$defaultPainting->getImageFileName();?>.jpg" class="img-thumbnail img-responsive" alt="<?php echo $defaultPainting->getTitle();?>" />
                    </div>
                    <div class="col-md-7 row">
                        <p>
                            <?php echo $defaultPainting->getDescription(); ?>
                        </p>
                        <p class="price">$<?php echo $defaultPainting->getCost();?></p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-lg">
                                <a href="favorites/add-favorite-painting-list.inc.php?PaintingID=<?php echo $paintingID;?>">
                                    <span class="glyphicon glyphicon-gift"></span> Add to Wish List</a>
                            </button>
                            <button type="button" class="btn btn-default btn-lg">
                                <a href="customize-product.php?PaintingID=<?php echo $paintingID; ?>">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a>
                            </button>
                        </div>
                        <p>&nbsp;</p>
                        <div class="panel panel-default">
                            <div class="panel-heading google-font">
                                Product Details
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Date:</th>
                                    <td><?php echo $defaultPainting->getYearOfWork();?></td>
                                </tr>
                                <tr>
                                    <th>Medium:</th>
                                    <td><?php echo $defaultPainting->getMedium();?></td>
                                </tr>
                                <tr>
                                    <th>Dimensions:</th>
                                    <td><?php echo $defaultPainting->getWidth();?> cm x <?php echo $defaultPainting->getHeight();?>cm</td>
                                </tr>
                                <tr>
                                    <th>Home:</th>
                                    <td>
                                        <a href="#"><?php echo $defaultPainting->getGalleryName();?>, <?php echo $defaultPainting->getGalleryCity();?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Genres:</th>
                                    <td>
                                        <?php
                                            echo $genresName;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Subjects:</th>
                                    <td>
                                        <?php
                                            echo $subjectName;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>
                <h3 class="google-font">Similar Products </h3>
                <div class="container">
                    <div class="row">
                        <?php if(isset($singlePanelOfArt)){echo $singlePanelOfArt;}?>
                        <!-- <div class="col-md-2 thumbnail">
                            <img src="images/thumbs/116010.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Artist Holding a Thistle</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-2 thumbnail space">
                            <img src="images/thumbs/120010.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Portrait of Eleanor of Toledo</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-2 thumbnail space">
                            <img src="images/thumbs/107010.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Madame de Pompadour</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-2 thumbnail space">
                            <img src="images/thumbs/106020.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Girl with a Pearl Earring</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="google-font">Cart </h3>
                    </div>
                    <div class="wrapper">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/tiny/116010.jpg" class="media-object" alt="..." width="32">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>
                                    <a href="#">Artist Holding a Thistle</a>
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/tiny/113010.jpg" class="media-object" alt="..." width="32">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>
                                    <a href="#">Self-portrait in a Straw Hat</a>
                                </p>
                            </div>
                        </div>
                        <strong class="cartText">Subtotal:
                            <span>$1200</span>
                        </strong>
                        <div>
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="glyphicon glyphicon-info-sign"></i> Edit</button>
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="glyphicon glyphicon-arrow-right"></i> Checkout</button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="google-font">Popular Artists</h3>
                    </div>
                    <div class="wrapper-list">
                        <ul>
                            <?php if(isset($singleArtistName)){echo $singleArtistName;}?>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="google-font">Popular Genres</h3>
                    </div>
                    <div class="wrapper-list">
                        <ul>
                            <?php if(isset($singleGenreName)) { echo $singleGenreName;} ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-info-sign"></i> About Us</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s.</p>
            </div>
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-earphone"></i> Customer Service
                </h4>
                <div class="row">
                    <div class="wrapper-list">
                        <ul>
                            <li>
                                <a href="#">Delivery Information</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Shipping</a>
                            </li>
                            <li>
                                <a href="#">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Just Ordered</h4>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="images/tiny/13030.jpg" class="media-object" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>
                            <a href="#">Arrangement in Grey and Black</a>
                        </p>
                        <em>5 minutes ago</em>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="images/tiny/116010.jpg" class="media-object" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>
                            <a href="#">Artist Holding a Thistle</a>
                        </p>
                        <em>11 minutes ago</em>
                    </div>
                </div>
                <div class="media similarTitle">
                    <div class="media-left">
                        <a href="#">
                            <img src="images/tiny/113010.jpg" class="media-object" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>
                            <a href="#">Self-portrait in a Straw Hat</a>
                        </p>
                        <em>23 minutes ago</em>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-envelope"></i> Contact us</h4>
                <form action="http://www.randyconnolly.com/tests/process.php" method="post">
                    <div class="form-group form-margin">
                        <input class="form-control" type="text" name="name" placeholder="Enter name ...">
                    </div>
                    <div class="form-group form-margin">
                        <input class="form-control" type="email" name="email" placeholder="Enter email ...">
                    </div>
                    <div class="form-group form-margin">
                        <textarea class="form-control" rows="3" name="message" placeholder="Enter message ..."></textarea>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include("includes/copyright.inc.php"); ?>
    </div>
    </footer>
</body>

</html>