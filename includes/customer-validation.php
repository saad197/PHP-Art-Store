<?php
include_once "includes/config.inc.php";
// define variables and set to empty values
$email = $password = $cpassword = $country = $firstName = $state = $lastName = $address = $city = $postal = $phone = $cardNumber = $cvvNum = $date = "";
$emailErr = $passwordErr = $countryErr = $cPasswordErr = $stateErr = $firstNameErr = $lastNameErr = $addressErr = $cityErr = $postalErr = $phoneErr = $cardNumErr = $cvvErr = $dateErr = "";

$error = array();

//for customer update (admin)
$error2 = array();

if (isset($_POST['checkout'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["cardnumber"])) {
            $cardNumErr = "cardnumber is required";
            $error  = $error2 = $cardNumErr;
        } else {
            $cardNumber = test_input($_POST["cardnumber"]);
            // check if name only contains letters and whitespace
            if(strlen($cardNumber) == 16)
            {

                if (!preg_match("/^[0-9]*$/",$cardNumber)) {
                    $cardNumErr = "only number";
                    $error = $error2 = $cardNumErr;
                }

            }
            else{
                $cardNumErr = "must be 16 length";
                $error = $error2 = $cardNumErr;

            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["cvvNum"])) {
            $cvvErr = "cvvNum is required";
            $error  = $error2 = $cvvErr;
        } else {
            $cvvNum = test_input($_POST["cvvNum"]);
            // check if name only contains letters and whitespace
            if(strlen($cvvNum) == 3)
            {

                if (!preg_match("/^[0-9]*$/",$cvvNum)) {
                    $cvvErr = "only number";
                    $error = $error2 = $cvvErr;
                }

            }
            else{
                $cvvErr = "must be 3 length";
                $error = $error2 = $cvvErr;

            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["date"])) {
            $dateErr = "date is required";
            $error  = $error2 = $dateErr;
        } else {
            $date = test_input($_POST["date"]);
            // check if name only contains letters and whitespace

            if (!preg_match("/^([0-9]{2})\\/([0-9]{2})$/",$date)) {
                $dateErr = "Invalid format";
                $error = $error2 = $dateErr;
            }
        }
    }

    
}


if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $error[] = $emailErr;

    }

    $conn = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $sql = $conn->prepare("SELECT UserName FROM customerlogon WHERE UserName = '$email'; ");
    $sql->execute();

    if($sql->rowCount() > 0)
    {
        $emailErr = "An account is already registered with this email";
        $error[] = $emailErr;
    }


}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstNameErr = "First Name is required";
        $error  = $error2 = $firstNameErr;

    } else {
        $firstName = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^([^[:punct:]\d]+)$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
            $error = $error2 = $firstNameErr;
        }
    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])) {
        $lastNameErr = "Last Name is required";
        $error  = $error2 = $lastNameErr;
    } else {
        $lastName = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^([^[:punct:]\d]+)$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
            $error  = $error2 = $lastNameErr;
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
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            $passwordErr = "Password must be greater than 8 characters, must include capital letters and numbers";
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
        if ($cpassword != $password) {
            $cPasswordErr = "Passwords do
             not match";
            $error = $cPasswordErr;

        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
        $error  = $error2 = $phoneErr;
    } else {
        $phone = test_input($_POST["phone"]);
        // check if name only contains letters and whitespace
        if(strlen($phone) >= 8)
        {

            if (preg_match("/^([0-9+_() -])*$/",$phone)) {

            }
            else{
                $phoneErr = "Phone number can only contain numbers and symbols (), +, -, and space";
                $error  = $error2 = $phoneErr;
            }

        }
        else{
            $phoneErr = "must be 8 length at least";
            $error = $error2 = $phoneErr;

        }
    }



}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["postal"])) {
        $postalErr = "postal code is required";
        $error  = $error2 = $postalErr;
    } else {
        $postal = test_input($_POST["postal"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^([A-Z0-9 -])*$/", $postal)) {
            $postalErr = "Wrong format must be capital letters, can include symbol and - ";
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
        $error  = $error2 = $addressErr;
    } else {
        $address = test_input($_POST["address"]);
        // check if name only contains letters and whitespace

    }

}



if(empty($error))
{


    $addUserEnter = "";

    //sending data of all fields
    foreach ($_POST as $key => $value){
        $addUserEnter .= "&".$key."=".$value ."&" ;
    }

    if(isset($_POST['submit'])) {

        //redirects user and also sends data
        header('Location: includes/process-registration.php?' . $addUserEnter);
    }


}


//Customer update
if(isset($_POST['update'])) {

    if(empty($error2)) {
        $addUserEnter = "";

        //sending data of all fields
        foreach ($_POST as $key => $value){
            $addUserEnter .= "&".$key."=".$value ."&" ;
        }

        //redirects user and also sends data
        header('Location: includes/process-customer-update.php?'  . $addUserEnter);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>