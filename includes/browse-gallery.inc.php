<?php

    function getGalleryInfo() {
        try{
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = '
                SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryCountry
                FROM Galleries
            ';
            $result = $pdo->query($sql);
            return $result;
        }catch (PDOException $e)
        {
            die($e->getMessage());
            return null;
        }
        
    }

?>