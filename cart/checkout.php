<?php 

    if(session_status() == PHP_SESSION_NONE) {         
        session_start();     
    }  

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
    include('../includes/config.inc.php');

    function getAddressField($fieldColumn) {
        try {
            $conn = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $Sql = "SELECT DISTINCT ".$fieldColumn." FROM Customers WHERE ".$fieldColumn." != '' ORDER BY ".$fieldColumn." ASC";
            $Result = $conn->prepare($Sql);
            $Result->execute();
            while ($row = $Result->fetch())
            {
                $fieldResult[] = $row[$fieldColumn];
            }
            $pdo = null;
            return $fieldResult;
        } catch (PDOException $e) {
            die($e->getMessage());
            return null;
        }
    }

    function getCityOption() {
        $cityNames = getAddressField('City');
        foreach ($cityNames as  $city) {
            echo '<option>'.$city.'</option>';
        }
    }

    function getRegionOptions() {
        $region = getAddressField('Region');
        foreach ($region as  $reg) {
            echo '<option>'.$reg.'</option>';
        }
    }

    function getCountryOptions() {
        $region = getAddressField('Country');
        foreach ($region as  $reg) {
            echo '<option>'.$reg.'</option>';
        }
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
                        <select class="form-control" name = "city" id="city">
                            <?php getCityOption(); ?>
                        </select>
                        State:
                        <select class="form-control" name = "city" id="city">
                            <?php getRegionOptions(); ?>
                        </select>
                        Country:
                        <select class="form-control" name = "city" id="city">
                            <?php getCountryOptions(); ?>
                        </select>
                        Postal Code:
                        <input type='text' name='postal' placeholder='T1Y 3H4'>
                    </div>
                    <h2>Payment<h2>
                </div>
            </form>
            </div>
    </body>
</html>