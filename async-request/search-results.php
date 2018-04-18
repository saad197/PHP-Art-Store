<?php 
include("../includes/config.inc.php");
$trimSearchResult = $_POST['search'];
$search = trim($trimSearchResult);

if(isset($_POST['filter'])){
    if($_POST['filter'] == "title") {
        $results = getArtByTitleAndArtist($search);
        foreach($results as $key => $value)
        {
            echo 
            '<div class = "row well">
            <div class = "col-md-2">
                <a href="works.php?PaintingID='.$value['PaintingID'].'">
                <img src="images/works/square-medium/'.$value['ImageFileName'].'.jpg">
                </a>
            </div>
            <div class = "col-md-10">
                <a href="works.php?PaintingID='.$value['PaintingID'].'">
                <p>'.$value['Title'].'</p>
                </a>
                <p>'.$value['Description'].'</p>
                <div class="btn-group">
                    <button type="button" class="btn btn-default">
                    <a href="favorites/add-favorite-painting-list.inc.php?PaintingID='.$value['PaintingID'].'"></span>&nbsp;Add to Wish List</a>
                    </button>
                    <button type="button" class="btn btn-default">
                    <a href="customize-product.php?PaintingID='.$value['PaintingID'].'"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Add to Shopping Cart</a>
                    </button>
                </div>
            </div>
        </div>
        <br>';
        }
    }
    else if($_POST['filter'] == "desc") {
        $results = getArtDescription($search);
        foreach($results as $key => $value)
        {
            echo '
                <div class = "row well">
                    <div class = "col-md-2">
                        <a href="works.php?PaintingID='.$value['PaintingID'].'">
                        <img src="images/works/square-medium/'.$value['ImageFileName'].'.jpg">
                        </a>
                    </div>
                    <div class = "col-md-10">
                        <a href="works.php?PaintingID='.$value['PaintingID'].'">
                        <p>'.$value['Title'].'</p>
                        </a>
                        <p>'.str_replace($search,'<span class="bg-primary">'.$search.'</span>',$value['Description']).'</p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">
                                <a href="favorites/add-favorite-painting-list.inc.php?PaintingID='.$value['PaintingID'].'"></span>&nbsp;Add to Wish List</a>
                            </button>
                            <button type="button" class="btn btn-default">
                                <a href="customize-product.php?PaintingID='.$value['PaintingID'].'"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Add to Shopping Cart</a>
                            </button>
                        </div>
                    </div>
                </div>
                <br>';
                 
        }
    }
    else {
        $results = getAllArtWork();
        foreach($results as $key => $value)
        {
            echo
            '<div class = "row well">
                <div class = "col-md-2">
                    <a href="works.php?PaintingID='.$value['PaintingID'].'">
                    <img src="images/works/square-medium/'.$value['ImageFileName'].'.jpg">
                    </a>
                </div>
                <div class = "col-md-10">
                    <a href="works.php?PaintingID='.$value['PaintingID'].'">
                    <p>'.$value['Title'].'</p>
                    </a>
                    <p>'.$value['Description'].'</p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">
                            <a href="favorites/add-favorite-painting-list.inc.php?PaintingID='.$value['PaintingID'].'"></span>&nbsp;Add to Wish List</a>
                        </button>
                        <button type="button" class="btn btn-default">
                            <a href="customize-product.php?PaintingID='.$value['PaintingID'].'"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Add to Shopping Cart</a>
                        </button>
                    </div>
                </div>
            </div>
            <br>';
        }
    }
}

function getAllArtWork() {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.PaintingID,Paintings.ArtistID, Paintings.Title, Paintings.Description, Paintings.ImageFileName FROM Paintings ORDER BY Title";
        $result = $pdo->prepare($sql);
        $result->execute();
        $allArtWork = array();
        while ($row = $result->fetch()) {
            $artDetails['ArtistID'] = $row['ArtistID'];
            $artDetails['PaintingID'] = $row['PaintingID'];
            $artDetails['ImageFileName'] = $row['ImageFileName'];
            $artDetails['Title'] = $row['Title'];
            $artDetails['Description'] = $row['Description'];
            $allArtWork[] = $artDetails;
        }
        $pdo = null;
        return $allArtWork;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}

function getArtByTitleAndArtist($search)
{
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.PaintingID, Paintings.ArtistID, Paintings.Title, Paintings.Description,Paintings.ImageFileName 
                FROM Paintings JOIN Artists ON Paintings.ArtistID = Artists.ArtistID  
                WHERE Artists.FirstName =  ? OR Artists.LastName = ? OR Paintings.Title Like ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $search);
        $result->bindValue(2, $search);
        $result->bindValue(3, $search."%");
        $result->execute();
        $arts = array();
        
        while ($row = $result->fetch()) {
            $artDetails['ArtistID'] = $row['ArtistID'];
            $artDetails['PaintingID'] = $row['PaintingID'];
            $artDetails['ImageFileName'] = $row['ImageFileName'];
            $artDetails['Title'] = $row['Title'];
            $artDetails['Description'] = $row['Description'];
            $arts[] = $artDetails;
        }
        $pdo = null;
        return $arts;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}

function getArtDescription($search){

    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.PaintingID,Paintings.Title, Paintings.Description, Paintings.ImageFileName 
        FROM Paintings WHERE Description LIKE ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1,"%".$search."%");
        $result->execute();
        $arts = array();
        while ($row = $result->fetch()) {
            $artDetails['PaintingID'] = $row['PaintingID'];
            $artDetails['ImageFileName'] = $row['ImageFileName'];
            $artDetails['Title'] = $row['Title'];
            $artDetails['Description'] = $row['Description'];
            $arts[] = $artDetails;
        }
        $pdo = null;
        return $arts;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}
?>