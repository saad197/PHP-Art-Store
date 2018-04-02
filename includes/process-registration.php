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


echo $email;

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

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo '</br>';


if (password_verify($password, $hashed_password)) {
    echo '</br>';
    echo "password is correct";
    echo '</br>';
}
else {
    echo '</br>';
    echo "wrong password";
    echo '</br>';
}
echo $hashed_password;
echo '</br>';
try {
   $conn = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insertCustomerLogonSql = "INSERT INTO `customerlogon` (`CustomerID`, `UserName`, `Pass`, `Salt`, `State`, `DateJoined`, `DateLastModified`) VALUES (DEFAULT , '$email', $hashed_password, 1, 1, NOW(), NOW())";
$customerLogon = $conn->prepare($insertCustomerLogonSql);

$conn->exec($insertCustomerLogonSql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $insertCustomerLogonSql . "<br>" . $e->getMessage();
    }







?>




