<?php

    require_once('config.inc.php');
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        
        $IP = $_SERVER["HTTP_CLIENT_IP"];
    }
    else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        $IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    else 
    {
        $IP = $_SERVER["REMOTE_ADDR"];
    }
    // using ip address of canada
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=199.185.132.7"));
    $countrycode = $details->geoplugin_countryCode;
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT MAX(VisitID) AS VisitID FROM Visits";
        $result = $pdo->prepare($sql);
        $result->execute();
        $lastVisitedId = "";
        while ($row = $result->fetch()) {
            $lastVisitedId = $row['VisitID'] + 1 ;
        }
        //inserting a new visit field when user visit the painting.
        $sql = "INSERT INTO Visits (VisitID, PaintingID, DateViewed, ipAddress, CountryCode) 
            VALUES ('$lastVisitedId','$paintingID', NOW(), '$IP', '$countrycode')";
        $result = $pdo->prepare($sql);
        $result->execute();
        $pdo = null;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }

?>