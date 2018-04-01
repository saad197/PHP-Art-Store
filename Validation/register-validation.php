<?php

// define variables and set to empty values
$email = $password = $cpassword = $country = $firstName = $state = $lastName = $address = $city = $postal = $phone = "";
$emailErr = $passwordErr = $countryErr = $cPasswordErr = $stateErr = $firstNameErr = $lastNameErr = $addressErr = $cityErr = $postalErr = $phoneErr = "";

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
        $firstName = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
            $error = $firstNameErr;
        }
    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])) {
        $lastNameErr = "Last Name is required";
        $error = $lastNameErr;
    } else {
        $lastName = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
            $error = $lastNameErr;
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $error = $passwordErr;
    } else {
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $password)) {
            $passwordErr = "Only letters and white space allowed";
            $error = $passwordErr;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["cpassword"])) {
        $cPasswordErr = "Type password again to confirm";
        $error = $cPasswordErr;
    } else {
        $cpassword = test_input($_POST["cpassword"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $cpassword)) {
            $cPasswordErr = "Only letters and white space allowed";
            $error = $cPasswordErr;
        } else if ($cpassword != $password) {
            $cPasswordErr = "Password does not match";
            $error = $cPasswordErr;

        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
    } else {
        $phone = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $phoneErr = "only numbers";
            $error = $phoneErr;
        }
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["postal"])) {
        $postalErr = "postal code is required";
        $error = $postalErr;
    } else {
        $postal = test_input($_POST["postal"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $postal)) {
            $postalErr = "Wrong format, should be like T1T G5G";
            $error = $postalErr;
        }
    }
}


/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["region"])) {
        $stateErr = "state is required";
        $error = $stateErr;
    } else {
        $state = test_input($_POST["state"]);
        // check if name only contains letters and whitespace

    }
} */




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["address"])) {
        $addressErr = "address is required";
        $error = $addressErr;
    } else {
        $address = test_input($_POST["address"]);
        // check if name only contains letters and whitespace

    }

}




if(empty($error))
{

echo "empty";
    $addUserEnter = "";

    //sending data of all fields
    foreach ($_POST as $key => $value){
        $addUserEnter .= "&".$key."=".$value ."&" ;
    }

    //redirects user and also sends data
    if(isset($_POST['submit'])){

        header('Location: includes/process-registration.php?'.$addUserEnter);
    }

}

else {
    echo "error exists";
    print_r($error);
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);


    return $data;
}
?>