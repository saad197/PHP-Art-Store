<?php

class Reviews{

    private $ratingID;
    private $paintingID;
    private $reviewDate;
    private $rating;
    private $comment;


    public function __construct($rId, $pId, $revDate, $rting, $cmt)
    {
        $this->ratingID = $rId;
        $this->paintingID = $pId;
        $this->reviewDate = $revDate;
        $this->rating = $rting;
        $this->comment = $cmt;

    }


    public function getRatingId() {
        return $this->ratingID;
    }

    public function getPaintingId() {
        return $this->paintingID;
    }

    public function getReviewDate() {
        return $this->reviewDate;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getComment() {
        return $this->comment;
    }


    public function printComments() {
        if ($this->getComment() != "") {
            return $this->getComment();
        }
        else {
            return '(This user did not post a comment)';
        }
    }



    public function printStars () {
        $counter = 0;
        while ($counter < $this->getRating()) {
            $counter++;
            echo '<label type="text" aria-label="Left Align" style = "margin-left: 1px;">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</label>';
        }
    }


    public function __toString(){
        return




            '
    
    
    
    	<div class="row">
    	
						<div class="col-sm-3">
							<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
							<div>Anonymous</a></div>
						
							<div>'.$this->getReviewDate().'<br/></div>
							
						</div>
						<div class="col-sm-9">
							
						
							<div><b>'.$this->printComments().'</b></div>
							
						</div>
					</div>
				
					
    
    ';


    }



}


?>