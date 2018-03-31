
<div class="col-md-10 row">
    <h1 class="google-font row"><?php echo $artist->getFirstName()  . " ". $artist->getLastName() ?></h1>
    <div class="col-md-5 row">
        <img src="images/artists/<?php echo $artist->getArtistID() ?>.jpg" id="artist-img"  class="img-thumbnail img-responsive row" alt="Self-portrait in a Straw Hat">
    </div>
    <div class="col-md-7 row">
        <p class="row"><?php echo $artist->getDetails() ?></p>
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-lg">
                <a href="#">
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
                    <td><a href=".$artist->getArtistLink()."> <?php echo $artist->getArtistLink() ?></a></td>
                </tr>
            </table>
        </div>
    </div>              
<div>
    <h1 class="google-font">Art by <?php echo $artist->getFirstName()  . " ". $artist->getLastName() ?>  </h1>
</div>
