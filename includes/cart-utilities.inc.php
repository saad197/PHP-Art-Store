<?php 

include('config.inc.php');


function getFrameOptions($option) {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT DISTINCT ".$option." FROM TypesFrames ORDER BY Title DESC";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            // condition to  make no change 
            if($row[$option] == "[None]" || $row[$option] == "" || is_null($row[$option])){
                $row[$option] = "Default";
            }
            $aFrame[$option] = $row[$option];
            $frames[] = $aFrame;
        }
        $pdo = null;
        return $frames;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}


function showFrameTitles() {
    $frames = getFrameOptions('Title');
    echo "<span class='row-spacing'>Select Frame: <select name='Title' onchange='updatePrice()'>";
    foreach ($frames as $frame) {
        echo "<option value='".$frame['Title']."'>".$frame['Title']."</option>";      
    }
    echo "</select></span>";   
}

function showFrameColors() {
    $frames = getFrameOptions('Color');
    echo "<span class='row-spacing'>Select Color: <select name='Color' disabled>";
    foreach ($frames as $frame) {
        echo "<option value='".$frame['Color']."'>".$frame['Color']."</option>";      
    }
    echo "</select></span>"; 
}


function showFrameStyles() {
    $frames = getFrameOptions('Syle');
    echo "<span class='row-spacing'>Select Style: <select name='Syle' disabled>";
    foreach ($frames as $frame) {
        echo "<option value='".$frame['Syle']."'>".$frame['Syle']."</option>";      
    }
    echo "</select></span>"; 
}


function showPriceForFrameSelection() {
    echo "<span id='prize'> Price: <input type='text' name='price' value = '0' id='framePrice' disabled> </span>";
}

?>