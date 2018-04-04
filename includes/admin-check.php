<?php




function isAdmin ($id) {
    try {
        $conn = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Admin FROM customerlogon WHERE CustomerID=$id";
        $adminResult = $conn->prepare($sql);
        $adminResult->execute();

        foreach($adminResult as $key => $value) {
            $admin = $value['Admin'];

        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if ($admin == 1) {
        return true;
    }
    else {
        echo "</br>";

    }

    return false;
}
















?>