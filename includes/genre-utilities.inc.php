<?php
    require_once('config.inc.php');
    include('classes/genres.class.php');
    function getGenres() {
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
    
    function gerGenreDetails() {

    }

?>