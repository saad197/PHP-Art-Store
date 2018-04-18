<?php
require_once 'config.inc.php';
include '../classes/reviews.class.php';

function getReviews($paintingID) {

    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM reviews WHERE PaintingID = $paintingID LIMIT 5";
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {

            ///will create instance of AdoptionList class to store the adoption data
            $aReview = new Reviews($row['RatingIID'],$row['PaintingID'],$row['ReviewDate'],$row['Rating'],
                $row['Comment']);
            $reviews[] = $aReview;
            //   asort($adoption_detail);
        }
        $pdo = null;
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $reviews;
}






