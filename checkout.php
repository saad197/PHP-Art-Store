<?php 

    if(session_status() == PHP_SESSION_NONE) {         
        session_start();
    }  
    
    include('includes/checkout-utility.inc.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <?php
            include "includes/customer-validation.php";
            include "includes/head.inc.php";
        ?>
        <style>.error{color : red; margin-top: 0px; margin-bottom: 0px;}</style>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>
        <div class = "container">
            <h1>Shipping infotmation</h1>
            <form method = "POST" action ="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class = "form-group">
                    <div class = "row">
                        <div class = "col-md-5">
                            Firstname: <input type="text" class="form-control"  name = "firstname" placeholder="First Name" value = "<?php echo $firstName; ?>">
                            <span class = "error"><?php echo $firstNameErr?></span>
                        </div>
                        <div class = "col-md-5">
                            Lastname: <input type="text" class="form-control" name = "lastname" placeholder="Last Name" value = "<?php echo $lastName; ?>">
                            <span class = "error"><?php echo $lastNameErr?></span>
                       </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col-md-5">
                            Adress: <input type="text" class="form-control" name = "address" id="address" placeholder="1234 Main St" value = "<?php echo $address; ?>">
                            <span class = "error"><?php echo $addressErr?></span>
                        </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col-md-2">
                            City: <input type="text" class="form-control" name="city"  value = "<?php echo $city; ?>" >
                            <span class = "error"><?php echo $cityErr?></span>
                        </div>
                        <div class = "col-md-2">
                            Region: <input type="text" class="form-control" name="region"  value = "<?php echo $state; ?>" >
                            <span class = "error"><?php echo $stateErr?></span>
                        </div>
                       <div class = "col-md-2">
                            Country: <input type="text" class="form-control" name="country"  value = "<?php echo $country; ?>">
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
                    <div class='row'>
                        <div id='shipping-type'>
                            <h3><b>Choose Shipping Type</b></h3>
                            <?php showShippingType(); ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h1>Payment Infromation</h1>
                    <div class = "row">
                        <div class = "col-md-3">
                            Card Number: <input type="number" class="form-control" min = "0" name = "cardnumber" value = "<?php echo $cardNumber; ?>">
                            <span class = "error"><?php echo $cardNumErr?></span>
                        </div>
                        <div class = "col-md-2">
                            CVV: <input type="number" class="form-control" min = "0"  name = "cvvNum" value = "<?php echo $cvvNum; ?>">
                            <span class = "error"><?php echo $cvvErr?></span>
                        </div>
                       <div class = "col-md-2">
                            Expiry Date: <input type="text" class="form-control" name = "date" value = "<?php echo $date; ?>" placeholder = "05/15">
                            <span class = "error"><?php echo $dateErr?></span>
                       </div>
                    </div>
                </div>
                <button type="submit" name='checkout' value = "Checkout" class="btn btn-primary btn-md">Submit</button>
            </form>
        </div>
    </body>
</html>