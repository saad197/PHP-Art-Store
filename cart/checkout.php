<?php 

    if(session_status() == PHP_SESSION_NONE) {         
        session_start();     
    }  

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    include('../includes/config.inc.php');

    function getAddressField($fieldColumn) {
        try {
        $conn = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $citySql = "SELECT DISTINCT city FROM Customers WHERE city != '' ORDER BY city ASC";
        $cityResult = $conn->prepare($citySql);
        $cityResult->execute();
        while ($row = $cityResult->fetch())
        {
            $cityNames[] = $row['city'];
        }
        $pdo = null;
        return $cityNames;
        } catch (PDOException $e) {
            die($e->getMessage());
            return null;
        }
    }

    function getCityOption() {

    }
?>


<!DOCTYPE html>
<html>
    <head>
        <?php 
            include "../includes/head.inc.php";
            include "../includes/view-cart.script.inc.php";
        ?>
        
    </head>
    <body>
        <?php include '../includes/primary-navigation.inc.php';?>
            <form>
                <div>
                    <h2>Please Provide Shipping Information<h2>
                        <div>
                        Full Name: 
                        <input type='text' name='FullName' placeholder='Robert Downey'> 
                        <br>
                        <br>
                        Adress Line 1:
                        <input type='text' name = 'AddressLine1' placeholder = '1234 Main St'> <br><br>
                        Adress Line 2:
                        <input type='text' name = 'AddressLine1' placeholder = ''> <br><br>
                        City:
                        
                    </div>
                    <h2>Payment<h2>
                </div>
            </form>
            </div>
    </body>
</html>