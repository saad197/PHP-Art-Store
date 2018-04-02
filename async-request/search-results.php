<?php 
include("../includes/config.inc.php");
$trimSearchResult = $_POST['search'];
$search = trim($trimSearchResult);

if(isset($_POST['filter'])){
    if($_POST['filter'] == "title") {
        $results = getArtByTitleAndArtist($search);
        foreach($results as $key => $value)
        {
            echo '
                <ul class="list-group"> 
                    <a href="artist-details.php?ArtistID='.$value['ArtistID'].'"><li class="list-group-item">'.$value['Title'].'</li></a>
                     <li class="list-group-item">'.$value['Description'].'</li>
                </ul>';
        }
    }
    else if($_POST['filter'] == "desc") {
        $results = getArtDescription($search);
        foreach($results as $key => $value)
        {
            echo '<ul class="list-group"> 
                <a href="artist-details.php?ArtistID='.$value['ArtistID'].'"><li class="list-group-item">'.$value['Title'].'</li></a>
                    <li class="list-group-item">'.str_replace($search,'<span class="bg-primary">'.$search.'</span>',$value['Description']).'</li>
                    </ul>';
        }
    }
    else {
        $results = getAllArtWork();
        foreach($results as $key => $value)
        {
            echo '<ul class="list-group"> 
            <a href="artist-details.php?ArtistID='.$value['ArtistID'].'"><li class="list-group-item">'.$value['Title'].'</li></a>
            <li class="list-group-item">'.$value['Description'].'</li></ul>';
        }
    }
}

function getAllArtWork() {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Paintings.ArtistID, Paintings.Title, Paintings.Description FROM Paintings ORDER BY Title";
        $result = $pdo->prepare($sql);
        $result->execute();
        $allArtWork = array();
        while ($row = $result->fetch()) {
            $artDetails['ArtistID'] = $row['ArtistID'];
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
        $sql = "SELECT Paintings.ArtistID, Paintings.Title, Paintings.Description 
        FROM Paintings JOIN Artists ON Paintings.ArtistID = Artists.ArtistID  
        where Artists.FirstName Like ?
        UNION
        SELECT Paintings.ArtistID, Paintings.Title, Paintings.Description 
        FROM Paintings JOIN Artists ON Paintings.ArtistID = Artists.ArtistID 
        where Artists.LastName Like ?
        UNION
        SELECT Paintings.ArtistID, Paintings.Title, Paintings.Description 
        FROM Paintings JOIN Artists ON Paintings.ArtistID = Artists.ArtistID  
        where Paintings.Title Like ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, $search."%");
        $result->bindValue(2, $search."%");
        $result->bindValue(3, $search."%");
        $result->execute();
        $arts = array();
        while ($row = $result->fetch()) {
            $artDetails['ArtistID'] = $row['ArtistID'];
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
        $sql = "SELECT Paintings.ArtistID, Paintings.Title, Paintings.Description FROM Paintings JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Description Like ?";
        $result = $pdo->prepare($sql);
        $result->bindValue(1, "%".$search."%");
        $result->execute();
        $arts = array();
        while ($row = $result->fetch()) {
            $artDetails['ArtistID'] = $row['ArtistID'];
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