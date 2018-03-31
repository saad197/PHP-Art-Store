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
        private $artitsName;
        private $galleryID;
        private $galleryName;
        private $galleryCity;
        private $imageFileName;
        private $title;
        private $shapID;
        private $shapeName;
        private $copyrightText;
        private $description;
        private $yearOfWork;
        private $width;
        private $height;
        private $medium;
        private $cost;
        private $genresName;
        private $subjectName;

        // constructor
        public function __construct($paintingId, $artistId, $artistName, $galleryId, $galleryName, $galleryCity, $imgName, $title, $shapId, $shapeName, $copyrightText,
                                      $desc, $yearOfWork, $width, $height, $medium, $cost, $genresName, $subjectName) {
            
            $this->setPaintingID($paintingId);
            $this->setArtistID($artistId);
            $this->setArtistName($artistName);
            $this->setGalleryID($galleryId);
            $this->setGalleryName($galleryName);
            $this->setGalleryCity($galleryCity);
            $this->setImageFileName($imgName);
            $this->setTitle($title);
            $this->setShapId($shapId);
            $this->setShapName($shapeName);
            $this->setCopyrightText($copyrightText);
            $this->setDescription($desc);
            $this->setYearOfWork($yearOfWork);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setMedium($medium);
            $this->setCost($cost);
            $this->setGenresName($genresName);
            $this->setSubjectName($subjectName);
        }

        // setter
        function setPaintingID($paintingId) {
            $this->paintingID = $paintingId;
        }

        function setArtistID($artistId) {
            $this->artistID = $artistId;
        }

        function setArtistName($artistName) {
            $this->artitsName = $artistName;
        }

        function setGalleryID($galleryId) {
            $this->galleryID = $galleryId;
        }

        function setGalleryName($galleryName) {
            $this->galleryName = $galleryName;
        }

        function setGalleryCity($galleryCity) {
            $this->galleryCity = $galleryCity;
        }

        function setImageFileName($imgName) {
            $this->imageFileName = $imgName;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function setShapId($shapId) {
            $this->shapID = $shapId;
        }

        function setShapName($shapeName) {
            $this->shapeName = $shapeName;
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

        function setGenresName($genresName) {
            $this->genresName = $genresName;
        }

        function setSubjectName($subjectName) {
            $this->subjectName = $subjectName;
        }

        //getter
        function getPaintingID() {return $this->paintingID;}
        function getArtistID() {return $this->artistID;}
        function getArtistName() {return $this->artitsName;}
        function getGalleryID() {return $this->galleryID;}
        function getGalleryName() {return $this->galleryName;}
        function getGalleryCity() {return $this->galleryCity;}
        function getImageFileName() {return $this->imageFileName;}
        function getTitle() {return $this->title;}
        function getShapeId() {return $this->shapID;}
        function getShapeName() {return $this->shapeName;}
        function getCopyrightText() {return $this->copyrightText;}
        function getDescription() {return $this->description;}
        function getYearOfWork() {return $this->yearOfWork;}
        function getWidth() {return $this->width;}
        function getHeight() {return $this->height;}
        function getMedium() {return $this->medium;}
        function getCost() {return $this->cost;}
        function getGenresName() {return $this->genresName;}
        function getSubjectName() {return $this->subjectName;}
    }

?>