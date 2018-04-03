<?php
include "Validation/customer-validation.php";
include 'includes/primary-navigation.inc.php';
include "includes/head.inc.php";
include "classes/customerlist.class.php";


try {
    $conn = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


//City sql for select
$citySql = "SELECT DISTINCT city FROM Customers WHERE city != '' ORDER BY city ASC";
$cityResult = $conn->prepare($citySql);
$cityResult->execute();



$countrySql = "SELECT DISTINCT country FROM Customers WHERE country != '' ORDER BY country ASC";
$countryResult = $conn->prepare($countrySql);
$countryResult->execute();



$stateSql = "SELECT DISTINCT region FROM Customers WHERE region != '' ORDER BY region ASC";
$stateResult = $conn->prepare($stateSql);
$stateResult->execute();



$customerID = $_GET['customerid'];


  try {
      $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM Customers WHERE CustomerID = $customerID; ";
      $result = $pdo->query($sql);
      while ($row = $result->fetch()) {

          ///will create instance of AdoptionList class to store the adoption data
          $aCustomer = new CustomerList($row['CustomerID'],$row['FirstName'],$row['LastName'],$row['Address'],
              $row['City'],$row['Region'], $row['Country'],$row['Postal'], $row['Phone'], $row['Email'], $row['Privacy']);
          $customerlist[] = $aCustomer;
          //   asort($adoption_detail);
      }
      $pdo = null;
  }
  catch (PDOException $e) {
      die($e->getMessage());
  }


/*foreach($cityResult as $key=> $value) {
    echo $value['city'];


} */



?>




<!DOCTYPE html>
<html lang="en">

<style>.error{color : red; margin-top: 0px; margin-bottom: 0px;}</style>
<body>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="google-font"><span class = "glyphicon glyphicon-pencil"> </span> Edit Customer Details </h3>


    </div>





    <form  method = "post" action = "<?php echo $_SERVER["PHP_SELF"]; echo "?customerid=" . $aCustomer->getCustomerId();?>">

        <div class="form-group row">


            <div class="col-md-5" style = "margin-left: 16px; margin-top: 10px;">
                <div id = "email">
                    <label for="inputEmail4">Customer ID</label>
                    <input type="email" class="form-control" name = "customerid" value="<?php echo $aCustomer->getCustomerId();?>" readonly>

                </div>
            </div>
        </div>

        <div class="form-group row">


            <div class="col-md-5" style = "margin-left: 16px; margin-top: 10px;">
                <div id = "email">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name = "email" placeholder="Email" value="<?php echo $aCustomer->getEmail();?>" readonly>

                </div>
            </div>
        </div>

        <div class="form-group row-md-5">
            <div id = "firstname" class="col-md-6">
                <label for="inputPassword4">First Name</label>
                <input type="text" class="form-control" name = "firstname" placeholder="First Name" value="<?php echo $aCustomer->getFirstName();?>">
                <span class = "error"><?php echo $firstNameErr?></span>
                <br/>
            </div>
            <div id = "lastname" class="col-md-6">
                <label for="inputPassword4">Last Name</label>
                <input type="text" class="form-control" name = "lastname" placeholder="Last Name" value="<?php echo $aCustomer->getLastName();?>">
                <span class = "error"><?php echo $lastNameErr?></span>
                <br/>
            </div>
        </div>



        <div class="form-group row-md-5" >
            <div id = "phone" class="col-md-6">
                <label for="inputPassword4">Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" value = "<?php echo $aCustomer->getPhone(); ?>" maxlength="19">
                <span class = "error"><?php echo $phoneErr?></span>
                <br/>
            </div>
        </div>

        <div class="form-group row-md-5">
            <div id = "country" class="col-md-6">
                <label for="country">Country</label>

                <select class="form-control" name = "country" id="country">
                    <option><?php echo $aCustomer->getCountry();?></option>
                    <?php foreach($countryResult as $key => $value){ ?>
                        <option><?php echo $value['country']; ?></option>
                    <?php } ?>


                </select>
                <br/>
            </div>

        </div>

        <div class="form-group">
            <div id = "address" class = "col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name = "address" id="address" placeholder="1234 Main St" value="<?php echo $aCustomer->getAddress(); ?>">
                <span class = "error"><?php echo $addressErr?></span>

                <br/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City</label>


                <select class="form-control" name = "city" id="city">
                    <option><?php echo $aCustomer->getCity();?></option>
                    <?php foreach($cityResult as $key => $value){ ?>

                        <option><?php echo $value['city']; ?></option>
                    <?php } ?>


                </select>

                <br/>
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <select class="form-control" name = "region" id="state">
                    <option><?php echo $aCustomer->getRegion();?></option>
                    <?php foreach($stateResult as $key => $value){ ?>
                        <option><?php echo $value['region']; ?></option>
                    <?php } ?>


                </select>
                <br/>
            </div>
            <div class="form-group col-md-2">
                <label for="postal">Postal</label>
                <input type="text" class="form-control" name = "postal" id="postal" value = "<?php echo $aCustomer->getPostal(); ?>" maxlength="10">
                <span class = "error"><?php echo $postalErr?></span>
            </div>
        </div>
        <br/>

        <div class = "form-group row">
            <div class = "col-md-12">
                <button type="submit" class="btn btn-success btn-lg" value = "Submit Form" name = "update" style = "margin-left: 480px"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
    </form>



    <form action="customer-list.php" style = "margin-left: 470px; margin-top: -30px;">

        <button type="submit" class="btn btn btn-danger btn-s" style = "margin-top: 20px; margin-left: 20px;"><span class = "glyphicon glyphicon-remove"></span> Cancel</button>

</div>

</form>





</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>