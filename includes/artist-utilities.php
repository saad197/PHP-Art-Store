<?php 
    include 'config.inc.php';
    include 'classes/artist.class.php';

    function getArtistDetails($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT ArtistID, ArtistLink, FirstName, LastName, Gender, Nationality, YearofBirth, YearOfDeath, Details
                      FROM artists WHERE artistID = ? ";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $artistID);
            $statement->execute();
            $row = $statement->fetch();
            $artist = new Artist($row['ArtistID'], $row['ArtistLink'], $row['Details'], $row['FirstName'], $row['LastName'], $row['Gender'], $row['Nationality'], $row['YearofBirth'], $row['YearOfDeath']);
            $pdo = null;
            return $artist;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }

    function showArtistDetials($artistID) {
        $artist = getArtistDetails($artistID);
        
        // Show artist name
        echo "
            <div class=\"col-md-10 row\">
                <h1 class=\"google-font row\">" . $artist->getFirstName()  . " ". $artist->getLastName() . " </h1>
                <div class=\"col-md-5 row\">
                    <img src=\"images/artists/".$artistID.".jpg\" id=\"artist-img\"  class=\"img-thumbnail img-responsive row\" alt=\"Self-portrait in a Straw Hat\">
                </div>
                <div class=\"col-md-7 row\">
                    <p class=\"row\">".$artist->getDetails()."</p>
                ";
        
        echo " <div class=\"btn-group\">
                    <button type=\"button\" class=\"btn btn-default btn-lg\">
                        <a href=\"#\">
                            <span class=\"glyphicon glyphicon-heart\"></span> Add to Favourite List</a>
                    </button>
                </div>";
        echo " <p></p>
                <div class=\"panel panel-default\">
                            <div class=\"panel-heading google-font\">
                                Product Details
                            </div>
                            <table class=\"table\">
                                <tr>
                                    <th>Date:</th>
                                    <td>".$artist->getYearOfBirth()."-".$artist->getYearOfDeath()."</td>
                                </tr>
                                <tr>
                                    <th>Nationality:</th>
                                    <td>" . $artist->getNationality() . "</td>
                                </tr>
                                <tr>
                                    <th>More Info:</th>
                                    <td><a href=".$artist->getArtistLink().">".$artist->getArtistLink()."</a></td>
                                </tr>
                            </table>";
        echo "</div>";
        echo "</div>";
    }
?>