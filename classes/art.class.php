<?php
// Date:	1782
// Medium:	Oil on canvas
// Dimensions:	98cm x 71cm
// Home:	National Gallery, London // gallery table
// Genres:	Realism, Rococo // from PaintingGenres and Genres tables
// Subjects: // from PaintingSubject and Subject table
// TITLE, COST 
// Artist name from artist tables
    class Art {
        private $paintingID;
        private $artistID;
        private $galleryID;
        private $imageFileName;
        private $title;
        private $copyrightText;
        private $description;
        private $yearOfWork;
        private $width;
        private $heigh;
        private $medium;
        private $cost;

        // constructor
        public function __construct($paintingId, $artistId, $galleryId, $imgName, $title, $copyrightText,
                                      $desc, $yearOfWork, $width, $height, $medium, $cost) {
            
            setPaintingID($paintingId);
            setArtistID($artistId);
            setGalleryID($galleryId);
            setImageFileName($imgName);
            setTitle($title);
            setCopyrightText($copyrightText);
            setDescription($desc);
            setYearOfWork($yearOfWork);
            setWidth($width);
            setHeight($heigh);
            setMedium($medium);
            setCost($cost);

        }

        // setter
        function setPaintingID($paintingId) {
            $this->$paintingID = $paintingId;
        }

        function setArtistID($artistId) {
            $this->$artistID = $artistId;
        }

        function setGalleryID($galleryId) {
            $this->$galleryID = $galleryId;
        }

        function setImageFileName($imgName) {
            $this->imageFileName = $imgName;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function setCopyrightText($copyrightText) {
            $this->copyrightText = $copyrightText;
        }

        function setDescription($desc) {
            $this->description = $desc;
        }

        function setYearOfWork($yearOfWork) {
            $this->yearOfWork = $yearOfWork;
        }

        function setWidth($width) {
            $this->width = $width;
        }

        function setHeight($height) {
            $this->height = $height;
        }

        function setMedium($medium) {
            $this->medium = $medium;
        }

        function setCost($cost) {
            $this->cost = $cost;
        }

        //getter
        function getPaintingID() {return $this->paintingID;}
        function getArtistID() {return $this->artistID;}
        function getGalleryID() {return $this->galleryID;}
        function getImageFileName() {return $this->imageFileName;}
        function getTitle() {return $this->title;}
        function getCopyrightText() {return $this->copyrightText;}
        function getDescription() {return $this->description;}
        function getYearOfWork() {return $this->yearOfWork;}
        function getWidth() {return $this->width;}
        function getHeight() {return $this->heigh;}
        function getMedium() {return $this->medium;}
        function getCost() {return $this->cost;}
    }

?>