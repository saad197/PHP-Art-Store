<?php

include "config.inc.php";


$customerID = $_GET['customerid'];;

$country = $_GET['country'];
$firstName = $_GET['firstname'];
$lastName = $_GET['lastname'];
$city = $_GET['city'];
$address = $_GET['address'];
$postal = $_GET['postal'];
$state = $_GET['region'];
$phone = $_GET['phone'];


echo $customerID, $country,$firstName,$lastName,$city,$address,$postal,$state, $phone;



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

    $updateSQL = "UPDATE customers SET FirstName='$firstName', LastName='$lastName',
                  Country='$country',City='$city', Address='$address', Postal='$postal', Region='$state', Phone='$phone'
                  WHERE CustomerID=$customerID";
    $customer= $conn->prepare($updateSQL);

    $conn->exec($updateSQL);
    header('Location: ../customer-update-complete.php');



}
catch(PDOException $e)
{

    echo $updateSQL . "<br>" . $e->getMessage();

}









?>




