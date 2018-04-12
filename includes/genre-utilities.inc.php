<?php
    require_once('config.inc.php');
    include('classes/genres.class.php');
    function getGenresFromDB() {
        try {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            while($row = $statement->fetch()) {
                $aGenre = new Genre($row['GenreID'], $row['GenreName'], $row['EraID'], $row['Description'], $row['Link']);
                $genres[$row['GenreID']] = $aGenre;
            }
            $pdo = null;
            return $genres;
        }
        catch (PDOException $e) {
            die($e->getMessage());
            return null;
        }
    }
    
    function getGenreDetails($genreID) {
        $genres = getGenresFromDB();
        return $genres[$genreID];
    }


    function getAllGenresTableGateWay() {
        $genres = getGenresFromDB();
        foreach ($genres as $value) {
                    echo "
                        <div class=\"col-md-2\" id=\"genre-panel\">
                            <div class=\"row\">
                                <div class=\"thumbnail\">
                                    <img src=\"images/genres/square-medium/".$value->getGenreID().".jpg\" alt=\"pic not available\">
                                    <div class=\"caption\">
                                        <p class=\"similarTitle\">
                                            <a href=\"genre-details.php?GenreID=".$value->getGenreID()."\">".$value->getGenreName()."</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>";
        }
    }


    function displayGenresInfo($genreID) {
        $genre = getGenreDetails($genreID);
        echo "
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-2 row\">
                        <div class=\"thumbnail\">
                            <img src=\"images/artists/".$genre->getGenreID().".jpg\" alt=\"pic not available\">
                        </div>
                    </div>
                    <div class=\"col-md-10 \">
                            <h1 class=\"google-font\">".$genre->getGenreName()."</h1>
                            <p>
                                ".$genre->getDescription()."
                            </p>
                    </div>
            </div>
            ";
    }

    function showPaintingForGenre($genreID) {
        $genre = getGenreDetails($genreID);
        try {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT  PaintingGenres.PaintingID FROM PaintingGenres 
                    INNER JOIN Genres ON PaintingGenres.GenreID = Genres.GenreID
                    INNER JOIN Paintings ON Paintings.PaintingID = PaintingGenres.PaintingID
                    WHERE Genres.GenreID = ?";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $genreID);
            $statement->execute();
            while($row = $statement->fetch()) {
                $paintings[$row['PaintingID']] = $row['PaintingID'];
            }
            $pdo = null;
        }
        catch (PDOException $e) {
            die($e->getMessage());
            return null;
        }
        
        echo " <div class=\"row\">
                    <h2 class=\"google-font\">Paintings</h2>
                    <hr>
                </div>";

        foreach ($paintings as $key => $value) {  
            echo "
                <div class=\"col-md-3\">
                    <div>
                    <a href=\"works.php?PaintingID=". $key ."\">
                        <div class=\"thumbnail\">
                            <img src=\"images/genres/square-medium/".$key.".jpg\" alt=\"pic not available\">
                        </div>
                    </a>
                    </div>
                </div>
                ";
        }
}

?>