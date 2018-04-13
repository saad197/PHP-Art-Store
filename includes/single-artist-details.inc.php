<?php

function showArtWorksForArtist($artWorks)
{
    foreach ($artWorks as $value) {
                echo "<div class=\"col-md-3\" id=\"artwork-panel\">
                        <div class=\"thumbnail\">
                            <img src=\"images/works/square-medium/".$value->getImageFileName().".jpg\" alt=\"pic not available\">
                            <div class=\"caption\">
                                <p class=\"similarTitle\">
                                    <a href=\"works.php?PaintingID=".$value->getPaintingID()."\">".$value->getTitle().", ".$value->getYearOfWork()."</a>
                                </p>
                                <div class=\"btn-space\">
                                    <a href=\"works.php?PaintingID=".$value->getPaintingID()."\">
                                        <button type=\"button\" class=\"btn btn-primary btn-xs\">
                                            <span class=\"glyphicon glyphicon-info-sign\"></span>View
                                        </button>
                                    </a>
                                    <a href=\"favorites/add-favorite-painting-list.inc.php?PaintingID=".$value->getPaintingID()."\">
                                        <button type=\"button\" class=\"btn btn-success btn-xs\">
                                            <i class=\"glyphicon glyphicon-gift\"></i> Wish
                                        </button>
                                    </a>
                                    <a href=\"customize-product.php?PaintingID=".$value->getPaintingID()."\">
                                        <button type=\"button\" class=\"btn btn-info btn-xs\">
                                            <i class=\"glyphicon glyphicon-shopping-cart\"></i> Cart
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
}

 ?>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 class="google-font"><?php echo $artist->getFirstName()  . " ". $artist->getLastName() ?></h1>
            <div class="col-md-5 ">
                <img src="images/artists/medium/<?php echo $artist->getArtistID() ?>.jpg" id="artist-img"  class="img-thumbnail img-responsive " alt="Self-portrait in a Straw Hat">
            </div>
            <div class="col-md-7 ">
                <p class=""><?php echo $artist->getDetails() ?></p>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-lg">
                        <a href="favorites/add-favorite-artist-list.inc.php?ArtistID=<?php echo $artist->getArtistID();?>">
                            <span class="glyphicon glyphicon-heart"></span> Add to Favourite List</a>
                    </button>
                </div>
                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading google-font">
                        Product Details
                    </div>
                    <table class="table">
                        <tr>
                            <th>Date:</th>
                            <td> <?php echo $artist->getYearOfBirth()."-".$artist->getYearOfDeath() ?></td>
                        </tr>
                        <tr>
                            <th>Nationality:</th>
                            <td> <?php echo $artist->getNationality() ?></td>
                        </tr>
                        <tr>
                            <th>More Info:</th>
                            <td><a href="<?php $artist->getArtistLink() ?>"> <?php echo $artist->getArtistLink() ?></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div> 
<div class="container">
    <div class="row">
        <h2 class="google-font">Art by <?php echo $artist->getFirstName()  . " ". $artist->getLastName() ?>  </h2>
    </div>
    <div class="row"> 
    
        <?php 
            showArtWorksForArtist($artWorks);
        ?>
        
    </div>
</div>
