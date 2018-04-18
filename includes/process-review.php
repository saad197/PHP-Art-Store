<?php

require_once ('config.inc.php');


$comment = $_POST['message'];
$star = $_POST['rat'];
$paintingid = $_POST['paintingid'];

echo "$comment";
echo '<br>';
echo "$star";



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

    $insertReviewSQL = "INSERT INTO `Reviews` (`PaintingID`, `ReviewDate`, `Rating`, `Comment`) VALUES ( $paintingid, NOW(), $star, '$comment')";
$insertReview = $conn->prepare($insertReviewSQL);

$conn->exec($insertReviewSQL);



    //increment
    $insertReviewCountSQL = "UPDATE `Paintings` SET ReviewCount = ReviewCount + 1 WHERE PaintingID = $paintingid;";
    $insertReviewCount = $conn->prepare($insertReviewSQL);

    $conn->exec($insertReviewCountSQL);


    echo "New records created successfully";
    header("Location: ../works.php?PaintingID=" . $paintingid);


    }
catch(PDOException $e)
    {
    echo $insertReviewSQL . "<br>" . $e->getMessage();

    }









?>




