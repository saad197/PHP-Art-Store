<?php 

    if(session_status() == PHP_SESSION_NONE) {         
        session_start();     
    }  

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    include('../includes/config.inc.php');

    // function getAddressField($fieldColumn) {
    //     try {
    //     $conn = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //      $citySql = "SELECT DISTINCT city FROM Customers WHERE city != '' ORDER BY city ASC";
    //     $cityResult = $conn->prepare($citySql);
    //     $cityResult->execute();
    //     while ($row = $cityResult->fetch())
    //     {
    //         $cityNames[] = $row['city'];
    //     }
    //     $pdo = null;
    //     return $cityNames;
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //         return null;
    //     }
    // }

    // function getCityOption() {

    // }
?>


<!DOCTYPE html>
<html>
    <head>
        <?php
            include "../includes/customer-validation.php";
            include "../includes/head.inc.php";
            include "../includes/view-cart.script.inc.php";
        ?>
        <style>.error{color : red; margin-top: 0px; margin-bottom: 0px;}</style>
    </head>
    <body>
        <?php include '../includes/primary-navigation.inc.php';?>
        <div class = "container">
            <form method = "POST" action ="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class = "form-group">
                    <div class = "row">
                        <div class = "col-md-5">
                            Firstname: <input type="text" class="form-control"  name = "firstname" placeholder="First Name" value = "<?php echo $firstName; ?>">
                            <span class = "error"><?php echo $firstNameErr?></span>
                        </div>
                        <div class = "col-md-5">
                            LastNAME: <input type="text" class="form-control" name = "lastname" placeholder="Last Name" value = "<?php echo $lastName; ?>">
                            <span class = "error"><?php echo $lastNameErr?></span>
                       </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col-md-5">
                            AdressLine1: <input type="text" class="form-control" name = "address" id="address" placeholder="1234 Main St" value = "<?php echo $address; ?>">
                            <span class = "error"><?php echo $addressErr?></span>
                        </div>
                        <div class = "col-md-5">
                            Email: <input type="text" class="form-control" name = "email" placeholder="" value = "<?php echo $email; ?>">
                            <span class = "error"><?php echo $emailErr?></span>
                       </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col-md-2">
                            City: <input type="text" class="form-control" name="city"  value = "<?php echo $city; ?>" required>
                            <span class = "error"><?php echo $cityErr?></span>
                        </div>
                        <div class = "col-md-2">
                            Region: <input type="text" class="form-control" name="region"  value = "<?php echo $state; ?>" required>
                            <span class = "error"><?php echo $stateErr?></span>
                        </div>
                       <div class = "col-md-2">
                            Country: <input type="text" class="form-control" name="country"  value = "<?php echo $country; ?>"required>
                            <span class = "error"><?php echo $countryErr?></span>
                       </div>
                    </div>
                    <div class = "row">
                        <div class = "col-md-2">
                            Postol: <input type="text" class="form-control" name = "postal" id="postal" value = "<?php echo $postal; ?>">
                            <span class = "error"><?php echo $postalErr?></span>
                        </div>
                        <div class = "col-md-2">
                            Phone: <input type="text" class="form-control"name="phone" placeholder="Phone Number" value = "<?php echo $phone; ?>">
                            <span class = "error"><?php echo $phoneErr?></span>
                        </div>
                    </div>
                </div>
                <button type="submit"  value = "Submit Form" class="btn btn-primary btn-md">Submit</button>
            </form>
        </div>
    </body>
</html>