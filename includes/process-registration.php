<?php

include "config.inc.php";




$email = $_GET['email'];
$password = $_GET['password'];
$cpasswoord = $_GET['cpassword'];
$country = $_GET['country'];
$firstName = $_GET['firstname'];
$lastName = $_GET['lastname'];
$city = $_GET['city'];
$address = $_GET['address'];
$postal = $_GET['postal'];
$state = $_GET['region'];
$phone = $_GET['phone'];




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


$hashed_password = sha1($password);

try {

    //login details insert
    $insertCustomerLogonSql = "INSERT INTO `CustomerLogon` (`CustomerID`, `UserName`, `Pass`, `Salt`, `State`, `DateJoined`, `DateLastModified`) VALUES (DEFAULT , '$email', '$hashed_password', 1, 1, NOW(), NOW())";
$customerLogon = $conn->prepare($insertCustomerLogonSql);

$conn->exec($insertCustomerLogonSql);

//get customer id
    $getCustIdSql = "SELECT CustomerID, UserName FROM CustomerLogon WHERE UserName = '$email'; ";
    $getCustId = $conn->prepare($getCustIdSql);
    $getCustId->execute();
    echo '</br>';
    foreach ($getCustId as $key => $value) {
        //   echo '</br>';
        //echo 'email is' . $value['UserName'];
        // echo '</br>';
        $customerID = $value['CustomerID'];
        echo $customerID;
        // echo '</br>';
    }


    //insert to customers
    $insertCustomerSql = "INSERT INTO `Customers` (`CustomerID`, `FirstName`, `LastName`, `Address`, `City`, `Region`, `Country`, `Postal`, `Phone`, `Email`, `Privacy`) 
                          VALUES ($customerID, '$firstName', '$lastName', '$address', '$city', '$state', '$country', '$postal', '$phone', '$email', NULL)";
    $customer= $conn->prepare($insertCustomerSql);

    $conn->exec($insertCustomerSql);






    echo "New records created successfully";
    header('Location: ../registration-complete.php');


    }
catch(PDOException $e)
    {
    echo $insertCustomerLogonSql . "<br>" . $e->getMessage();
        echo $insertCustomerLogonSql . "<br>" . $e->getMessage();
        echo $getCustIdSql . "<br>" . $e->getMessage();
    }









?>




