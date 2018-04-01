<?php
include "validation/register-validation.php";
include 'includes/primary-navigation.inc.php';






?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIP - Assignment 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/common.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bad Script' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption" rel="stylesheet">
    <style>.error{color : red;}</style>
</head>

<body>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="google-font">Register Account </h3>


</div>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group row">


            <div class="col-md-5" style = "margin-left: 16px; margin-top: 10px;">
            <div id = "email">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name = "email" placeholder="Email" value="<?php echo $email;?>">
                <span class = "error"><?php echo $emailErr?></span>
            </div>
            </div>
        </div>

        <div class="form-group row-md-5">
            <div id = "firstname" class="col-md-6">
                <label for="inputPassword4">First Name</label>
                <input type="text" class="form-control" name = "firstname" placeholder="First Name" value="<?php echo $firstName;?>">
                <span class = "error"><?php echo $firstNameErr?></span>
            </div>
            <div id = "lastname" class="col-md-6">
                <label for="inputPassword4">Last Name</label>
                <input type="text" class="form-control" name = "lastname" placeholder="Last Name">
                <span class = "error"><?php echo $lastNameErr?></span>
            </div>
        </div>

        <div class="form-group row-md-5">
            <div id = "password" class="col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name = "password" placeholder="Password" value="<?php echo $password;?>">
                <span class = "error"><?php echo $passwordErr?></span>
            </div>
            <div id = "cpassword" class="col-md-6">
                <label for="inputPassword4">Confirm Password</label>
                <input type="cpassword" class="form-control" name = "cpassword" placeholder="Confirm Password" value = "<?php echo $cpassword;?>">
                <span class = "error"><?php echo $cPasswordErr?></span>
            </div>
        </div>

        <div class="form-group row-md-5">
            <div id = "phone" class="col-md-6">
                <label for="inputPassword4">Phone Number</label>
                <input type="number" class="form-control" name="phone" placeholder="Phone Number" value = "<?php echo $phone; ?>">
                <span class = "error"><?php echo $phoneErr?></span>
            </div>
        </div>

        <div class="form-group row-md-5">
            <div id = "country" class="col-md-6">
                <label for="inputPassword4">Country</label>
                <input type="text" class="form-control" id="country" placeholder="Country" value = <?php echo $country; ?>>
                <span class = "error"><?php echo $countryErr?></span>
            </div>
        </div>

        <div class="form-group">
            <div id = "address" class = "col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                <span class = "error"><?php echo $addressErr?></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name = "city" value = "<?php echo $city; ?>">
                <span class = "error"><?php echo $cityErr?></span>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Postal</label>
                <input type="text" class="form-control" id="postal" value = "<?php echo $postal; ?>">
                <span class = "error"><?php echo $postalErr?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class = "form-group row">

        <button type="submit" class="btn btn-primary btn-lg">Register</button>
        </div>
    </form>

</div>





</body>

</html>