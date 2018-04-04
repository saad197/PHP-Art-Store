<?php

include_once "config.inc.php";


@$customerID = $_GET['customerid'];




//echo $customerID, $country,$firstName,$lastName,$city,$address,$postal,$state, $phone;

if (isset($customerID)) {
    $email = $_GET['email'];
    $country = $_GET['country'];
    $firstName = $_GET['firstname'];
    $lastName = $_GET['lastname'];
    $city = $_GET['city'];
    $address = $_GET['address'];
    $postal = $_GET['postal'];
    $state = $_GET['region'];
    $phone = $_GET['phone'];
    $profile = $_GET['updateprofile'];

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

        $updateSQL = "UPDATE customers SET Email='$email', FirstName='$firstName', LastName='$lastName',
                  Country='$country',City='$city', Address='$address', Postal='$postal', Region='$state', Phone='$phone'
                  WHERE CustomerID=$customerID";
        $customer= $conn->prepare($updateSQL);

        $conn->exec($updateSQL);

        $updateTimeSql = "UPDATE customerlogon SET UserName = '$email', DateLastModified = NOW() WHERE CustomerID = $customerID;";

        $customer= $conn->prepare($updateTimeSql);

        $conn->exec($updateTimeSql);


        if (isset($profile)) {


            header('Location: ../profile-update-complete.php');
        }
        else {
            header('Location: ../customer-update-complete.php');

        }




    }
    catch(PDOException $e)
    {

        echo $updateSQL . "<br>" . $e->getMessage();
        echo $updateTimeSql . "<br>" . $e->getMessage();


    }

}




?>
<!DOCTYPE html>
<html lang="en">

<html>

<body>


<?php if (!isset($customerID)) {

    echo 'access denied';
}



?>




</body>



</html>





