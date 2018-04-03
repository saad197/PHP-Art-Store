<?php

class CustomerList{

    private $customerID;
    private $firstName;
    private $lastName;
    private $address;
    private $city;
    private $region;
    private $country;
    private $postal;
    private $phone;
    private $email;
    private $privacy;

    public function __construct($cId, $fn, $ln, $add, $city, $reg, $count, $post, $phon, $emal, $privc)
    {
        $this->customerID = $cId;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->address = $add;
        $this->city = $city;
        $this->region = $reg;
        $this->country = $count;
        $this->postal = $post;
        $this->phone = $phon;
        $this->email = $emal;
        $this->privacy = $privc;
    }


    public function getCustomerId() {
        return $this->customerID;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getPostal() {
        return $this->postal;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPrivacy() {
        return $this->privacy;
    }


    public function __toString(){
        return
            '
    
    <tr>
    <td  style="padding:10px; text-align: center; "> '.$this->customerID.'</td>
    <td  style="padding:10px; text-align: center;"> '.$this->firstName. " ".$this->lastName.' </td>
    <td  style="padding:10px;  text-align: center;"> '.$this->phone.'</td>
    <td  style="padding:10px; text-align: center; "> '.$this->email.'</td>
    <td style = "text-align: center;"><a href="edit-customer.php?customerid='.$this->getCustomerId().'"><button class ="btn btn-success btn-s"><span class = "glyphicon glyphicon-pencil"> </span> </button></a></td>
    </tr>
    
    
    ';
    }



}


?>