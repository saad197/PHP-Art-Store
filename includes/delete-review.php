<?php

require_once ('config.inc.php');


$reviewId = $_GET['reviewid'];


echo "$reviewId";



try {
    $conn = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}



try {

    //login details insert
    $getPaintingIdSQL= "SELECT * FROM reviews WHERE RatingID = $reviewId";
   // $paintingid = $conn->prepare($getPaintingIdSQL);
  //  $conn->exec($getPaintingIdSQL);
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $result = $conn->query($getPaintingIdSQL);
      while ($row = $result->fetch()) {
          $paintingid =  $row['PaintingID'];
      }

      echo $paintingid;


    $deleteReviewSQL = "DELETE FROM `reviews` WHERE `reviews`.`RatingID` = $reviewId";
    $deleteReview = $conn->prepare($deleteReviewSQL);

    $conn->exec($deleteReviewSQL);


    echo "New records created successfully";
    header("Location: ../works.php?PaintingID=" . $paintingid);


}
catch(PDOException $e)
{
    echo $deleteReviewSQL . "<br>" . $e->getMessage();

}









?>




