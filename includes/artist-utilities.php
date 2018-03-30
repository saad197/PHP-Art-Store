<?php 
    include 'config-inc.php';
    
    function getArtistDetails($artistID) {
        try
        {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM artists WHERE artistID = ? ";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $artistID);
            $statement->execute();
            while ($row = $statement->fetch()) {
                $artist[] = $row;
            }
            $pdo = null;
            print_r($artist);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
    }
?>