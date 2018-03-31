<?php

class SubjectList{

private $subjectID;
private $subjectName;

public function __construct($subID, $subName){

    $this->subjectID = $subID;
    $this->subjectName = $subName;
}

function getSubjectID(){
    return $this->subjectID;
}

function getSubjectName(){
    return $this->subjectName;
}

}

?>