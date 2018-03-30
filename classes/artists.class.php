<?php

    class artists
    {
        private $artistID;
        private $artistLink;
        private $details;
        private $firstName;
        private $gender;
        private $lastName;
        private $nationality;
        private $yearOfBirth;
        private $yearOfDeath;

        public function __construct($artistID, $artistLink, $details, $firstName, $lastName, $gender, $nationality, $yearOfBirth, $yearOfDeath)
        {
            setArtistID($artistID);
            setArtistLink($artistLink);
            setDetails($details);
            setFirstName($firstName);
            setLastName($lastName);
            setGender($gender);
            setNationality($nationality);
            setYearOfBirth($yearOfBirth);
            setYearOfDeath($yearOfDeath);
        }

        function setArtistID($artistID){
            $this->artistID =$artistID;
        }
        function getArtistID() {
            return $this->artistID;
        }

        function setArtistLink($artistLink){
            $this->artistLink = $artistLink;
        }
        function getArtistLink() {
            return $this->artistLink;
        }

        function setDetails($setDetails){
            $this->details = $details;
        }
        function getDetails() {
            return $this->details;
        }

        function setFirstName($firstName){
            $this->firstName = $firstName;
        }
        function getFirstName() {
            return $this->firstName;
        }

        function setLastName($lastName){
            $this->lastName = $lastName;
        }
        function getLastName() {
            return $this->lastName;
        }

        function setGender($gender){
            $this->gender = $gender;
        }
        function getGender(){
            return $this->gender;
        }
        
        function setNationality($nationality){
            $this->nationality = $nationality;
        }
        function getNationality(){
            return $this->nationality;
        }

        function setYearOfBirth($yearOfBirth){
            $this->yearOfBirth = $yearOfBirth;
        }
        function getYearOfBirth() {
            return $this->yearOfBirth;
        }

        function setYearOfDeath($yearOfDeath){
            $this->yearOfDeath = $yearOfDeath;
        }
        function getYearOfDeath() {
            return $this->getYearOfDeath;
        }
    }
    
?>