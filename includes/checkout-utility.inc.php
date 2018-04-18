<?php

include('includes/config.inc.php');

function getShippingTypes() {
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT shipperID, shipperName, shipperDescription, shipperAvgTime, shipperClass, shipperBaseFee, shipperWeightFee
                    FROM TypesShippers";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $row = $statement->fetch();
        while ($row = $statement->fetch()) {
            $ashipper['shipperName'] = $row['shipperName'];
            $ashipper['shipperDescription'] = $row['shipperDescription'];
            $ashipper['shipperAvgTime'] = $row['shipperAvgTime'];
            $ashipper['shipperClass'] = $row['shipperClass'];
            $ashipper['shipperBaseFee'] = $row['shipperBaseFee'];
            $ashipper['shipperWeightFee'] = $row['shipperWeightFee'];
            $ashipper['totalFee'] = $ashipper['shipperBaseFee'] + $ashipper['shipperWeightFee'];
            $shipperTypes[$row['shipperID']] = $ashipper;
        }
        $pdo = null;
        return $shipperTypes;
    }
    catch (PDOException $e) {
        die($e->getMessage());
        return null;
    }
}

function showShippingType() {
    $shipperTypes = getShippingTypes();
    foreach ($shipperTypes as $key => $value) {
        echo "<div>
                <input type='radio' name='ShippingID' value='".$key."'> ".$value['shipperName']."
                <div class='shipping-details'>
                    ".$value["shipperDescription"]."
                </div>
            </div>";
    }
}

?>