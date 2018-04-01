<?php
class Gallery{
    private $galleryID;
    private $galleryName;
    private $galleryNativeName;
    private $galleryCity;
    private $galleryAddress;
    private $galleryCountry;
    private $latitude;
    private $longtitude;
    private $galleryWebsite;
    private $flickrPlaceID;
    private $yahooWoeID;
    private $googlePlaceID;

    public function __constructor($galleryId, $galleryName, $galleryNativeName, $galleryCity, $galleryAdd, 
                                  $galleryCountry, $lat, $long, $galleryWeb, $flickPlaceId, $yahooId, $googlePlaceID){
        $this->setGalleryId($galleryId);
        $this->setGalleryName($galleryName);
        $this->setGalleryNativeName($galleryNativeName);
        $this->setGalleryCity($galleryCity);
        $this->setGalleryAddress($galleryAdd);
        $this->setGalleryCountry($galleryCountry);
        $this->setLatitude($lat);
        $this->setLongtitude($long);
        $this->setGalleryWeb($galleryWeb);
        $this->setFlickPlaceId($flickPlaceId);
        $this->setYahooWoeId($yahooId);
        $this->setGooglePlaceId($googlePlaceID);

    }

    //setter
    function setGalleryId($galleryId) {
        $this->galleryID = $galleryId;
    }

    function setGalleryName($galleryName) {
        $this->galleryName = $galleryName;
    }

    function setGalleryNativeName($galleryNativeName) {
        $this->galleryNativeName = $galleryNativeName;
    }

    function setGalleryCity($galleryCity) {
        $this->galleryCity = $galleryCity;
    }

    function setGalleryAddress($galleryAdd) {
        $this->galleryAddress = $galleryAdd;
    }

    function setGalleryCountry($galleryCountry) {
        $this->galleryCountry = $galleryCountry;
    }

    function setLatitude($lat) {
        $this->latitude = $lat;
    }

    function setLongtitude($long) {
        $this->longtitude = $long;
    }

    function setGalleryWeb($galleryWeb) {
        $this->galleryWebsite = $galleryWeb;
    }

    function setFlickPlaceId($flickPlID) {
        $this->flickrPlaceID = $flickPlID;
    }

    function setYahooWoeId($yhWoeId) {
        $this->yahooWoeID = $yhWoeId;
    }    

    function setGooglePlaceId($googlePlId) {
        $this->googlePlaceID = $googlePlId;
    }
    
    // getter
    function getGalleryId() {return $this->galleryID;}
    function getGalleryName() {return $this->galleryName;}
    function getGalleryNativeName() {return $this->galleryNativeName;}
    function getGalleryCity() {return $this->galleryCity;}
    function getGalleryAddress() {return $this->galleryAddress;}
    function getGalleryCountry() {return $this->galleryCountry;}
    function getLatitude() {return $this->latitude;}
    function getLongtitude() {return $this->longtitude;}
    function getGalleryWebsite() {return $this->galleryWebsite;}
    function getFlickPlaceId() {return $this->flickrPlaceID;}
    function getYahooWoeId() {return $this->yahooWoeID;}
    function getGooglePlaceId() {return $this->googlePlaceID;}
}
?>