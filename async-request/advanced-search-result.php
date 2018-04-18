<?php
include('../includes/config.inc.php');
include("../includes/head.inc.php");
include("../includes/advanced-result-functions.php");

$trimSearchResult = $_POST['search'];
$search = trim($trimSearchResult);

$trimSearchResult = $_POST['searchType'];
$artistName = trim($trimSearchResult);

$subject = $_POST['filter'];

$select = $_POST['select'];

if($_POST['searchType'] == "search-art")
{
    if($_POST['filter'] != "undefined" && !empty($_POST['search']) && $_POST['select'] == "" )
    {

        if($_POST['filter'] == "history")
        {
            $results = getArtbySubAndArtist($search,$subject);

            if (!empty($results))
            {
                echo 
                '<br>
                <table class="table">
                        <p class="caption1">Paintings</p>
                        <thead>
                            <tr>
                            <th>Title</th>
                            <th>Artists</th>
                            <th>Year</th>
                            <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach($results as $key => $value)
                {
                    echo'
                    <tr>
                    <td><img src="images/works/square-tiny/'.$value['ImageFileName'].'.jpg">
                        <a href="artist-details.php?ArtistID='.$value['ArtistID'].'">'.$value['Title'].'</td></a>
                        <td>'.$value['Artists'].'</td>
                        <td>'.$value['YearOfWork'].'</td>
                        <td>'.$value['Cost'].'</td>
                    </tr>';
                }
                echo '</tbody>
                </table>';
            }
            else
            {
                echo '<p class="caption1">Match not found change the title</p>';
            }
        }
        else if($_POST['filter'] == "person" ){
            $results = getArtbySubAndArtist($search,$subject);

            if (!empty($results))
            {
                echo 
                '<br>
                <table class="table">
                        <p class="caption1">Paintings</p>
                        <thead>
                            <tr>
                            <th>Title</th>
                            <th>Artists</th>
                            <th>Year</th>
                            <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach($results as $key => $value)
                {
                    echo'
                    <tr>
                    <td><img src="images/works/square-tiny/'.$value['ImageFileName'].'.jpg">
                        <a href="artist-details.php?ArtistID='.$value['ArtistID'].'">'.$value['Title'].'</td></a>
                        <td>'.$value['Artists'].'</td>
                        <td>'.$value['YearOfWork'].'</td>
                        <td>'.$value['Cost'].'</td>
                    </tr>';
                }
                echo '</tbody>
                </table>';
            }
            else
            {
                echo '<p class="caption1">Match not found change the title</p>';
            }
        }
        else if($_POST['filter'] == "landscape")
        {
            $results = getArtbySubAndArtist($search,$subject);
            if (!empty($results))
            {
                echo 
                '<br>
                <table class="table">
                        <p class="caption1">Paintings</p>
                        <thead>
                            <tr>
                            <th>Title</th>
                            <th>Artists</th>
                            <th>Year</th>
                            <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach($results as $key => $value)
                {
                    echo'
                    <tr>
                    <td><img src="images/works/square-medium/'.$value['ImageFileName'].'.jpg">
                        <a href="artist-details.php?ArtistID='.$value['ArtistID'].'">'.$value['Title'].'</td></a>
                        <td>'.$value['Artists'].'</td>
                        <td>'.$value['YearOfWork'].'</td>
                        <td>'.$value['Cost'].'</td>
                    </tr>';
                }
                echo '</tbody>
                </table>';
            }
            else
            {
                echo '<p class="caption1">Match not found change the title</p>';
            }
        }
        
    }

    if(!empty($_POST['search']) && $_POST['select'] == "" && $_POST['filter'] == "undefined"){

        echo'
        <p class="caption1">Please select the subject</p>';

    }
    else if(isset($_POST['filter']) && empty($_POST['search']) && $_POST['select'] == "" && !empty($_POST['filter'])){
        echo'
        <p class="caption1">Please input the title</p>';
    }
    else if(isset($_POST['filter']) && empty($_POST['search']) && $_POST['select'] != "" && $_POST['filter'] != "undefined"){

        echo'
        <p class="caption1">Please input the title</p>';
    }
    else if (!empty($_POST['search']) && $_POST['select'] != "" && $_POST['filter'] == "undefined"){

        echo'
        <p class="caption1">Please select the subject</p>';
    }

    if(isset($_POST['select']) && $_POST['select'] != "" && !empty($_POST['search']) && $_POST['filter'] != "undefined"){

        $results = getArtBySubArtistAndGenre($search,$subject,$select);
        if (!empty($results))
        {
            echo 
            '<br>
            <table class="table">
                    <p class="caption1">Paintings</p>
                    <thead>
                        <tr>
                        <th>Title</th>
                        <th>Artists</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>';
            foreach($results as $key => $value)
            {
                echo'
                <tr>
                <td><img src="images/works/square-tiny/'.$value['ImageFileName'].'.jpg">
                    <a href="artist-details.php?ArtistID='.$value['ArtistID'].'">'.$value['Title'].'</td></a>
                    <td>'.$value['Artists'].'</td>
                    <td>'.$value['YearOfWork'].'</td>
                    <td>'.$value['GenreName'].'</td>
                    <td>'.$value['Cost'].'</td>
                </tr>';
            }
            echo '</tbody>
            </table>';
        }
        else {

            echo '<p class="caption1">Match not found change the title or subject or genre</p>';
        }

    } 

    if(isset($_POST['select']) && $_POST['select'] != "" && empty($_POST['search']) && $_POST['filter'] == "undefined"){
        $results = getArtByGenre($select);
        if(!empty($results))
        {
            echo 
            '<br>
            <table class="table">
                    <p class="caption1">Paintings</p>
                    <thead>
                        <tr>
                        <th>Title</th>
                        <th>Artists</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>';
            foreach($results as $key => $value)
            {
                echo'
                <tr>
                <td><img src="images/works/square-tiny/'.$value['ImageFileName'].'.jpg">
                    <a href="artist-details.php?ArtistID='.$value['ArtistID'].'">'.$value['Title'].'</td></a>
                    <td>'.$value['Artists'].'</td>
                    <td>'.$value['YearOfWork'].'</td>
                    <td>'.$value['GenreName'].'</td>
                    <td>'.$value['Cost'].'</td>
                </tr>';
            }
            echo '</tbody>
            </table>';
        }
        else {

            echo '<p class="caption1">Match not found change the genre</p>';
        }


    }

}

if($_POST['searchType'] == "search-artist")
{
    function getArtByArtist($search)
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
            where Artists.LastName Like ?";
            $result = $pdo->prepare($sql);
            $result->bindValue(1, $search."%");
            $result->bindValue(2, $search."%");
            $result->execute();
            $arts = array();
            while ($row = $result->fetch()) {
                $artDetails['ArtistID'] = $row['ArtistID'];
                $artDetails['Description'] = $row['Description'];
                $artDetails['Title'] = $row['Title'];
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

    $results = getArtByArtist($search);
    foreach($results as $key => $value)
        {
            echo '
            <ul class="list-group"> 
                <a href="artist-details.php?ArtistID='.$value['ArtistID'].'"><li class="list-group-item">'.$value['Title'].'</li></a>
                <li class="list-group-item">'.$value['Description'].'</li>
            </ul>';
        }
}
?>