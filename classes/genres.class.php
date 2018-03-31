<?php
class Genre
{
    private $genreID;
    private $genreName;
    private $eraID;
    private $description;
    private $link;

    public function __construct($genreId, $genreName, $eraId, $desc, $link)
    {
        $this->setGenreId($genreId);
        $this->setGenreName($genreName);
        $this->setEraId($eraID);
        $this->setDescription($desc);
        $this->setLink($link);
    }

    //setter
    public function setGenreId($genreId)
    {
        $this->genreID = $genreId;
    }

    public function setGenreName($genreName)
    {
        $this->genreName = $genreName;
    }

    public function setEraId($eraID)
    {
        $this->eraID = $eraID;
    }

    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    public function setLink($link)
    {
        $this0->link = $linkl;
    }
    //getter

    function getGenreID() {return $this->genreID;}
    function getGenreName() {return $this->genreName;}
    function getEraId() {return $this->getEraId;}
    function getDescription() {return $this->description;}
    function getLink() {return $this->link;}
}
