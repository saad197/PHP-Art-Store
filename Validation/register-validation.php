<?php

// define variables and set to empty values
$email = $password = $cpassword = $country = $firstName = $lastName = $address = $city = $postal = $phone = "";
$emailErr = $passwordErr = $countryErr = $cPasswordErr = $firstNameErr = $lastNameErr = $addressErr = $cityErr = $postalErr = $phoneErr = "";

$error = array();




if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $error[] = $emailErr;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstNameErr = "First Name is required";
        $error = $firstNameErr;
    } else {
        $name = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $firstNameErr = "Only letters and white space allowed";
            $error = $firstNameErr;
        }
    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])) {
        $nameErr = "Last Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
}



if(empty($error))
{


    $addUserEnter = "";

    //sending data of all fields
    foreach ($_POST as $key => $value){
        $addUserEnter .= "&".$key."=".$value ."&" ;
    }

    //redirects user and also sends data
    if(isset($_POST['submit'])){

        header('Location: send-data.php?'.$addUserEnter);
    }

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);


    return $data;
}
?>