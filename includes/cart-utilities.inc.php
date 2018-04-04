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
    echo "<span class='row-spacing'>Select Frame: <br><br><select name='FrameTitle' onchange='updateFramePrice()'>";
    foreach ($frames as $frame) {
        echo "<option value='".$frame['Title']."'>".$frame['Title']."</option>";      
    }
    echo "</select></span>";   
}

function showFrameColors() {
    $frames = getFrameOptions('Color');
    echo "<span class='row-spacing'>Frame Color: <select name='FrameColor' disabled>";
    foreach ($frames as $frame) {
        echo "<option value='".$frame['Color']."'>".$frame['Color']."</option>";      
    }
    echo "</select></span>"; 
}


function showFrameStyles() {
    $frames = getFrameOptions('Syle');
    echo "<span class='row-spacing'>Frame Style: <select name='FrameStyle' disabled>";
    foreach ($frames as $frame) {
        echo "<option value='".$frame['Syle']."'>".$frame['Syle']."</option>";      
    }
    echo "</select></span>"; 
}


function showPriceForFrameSelection() {
    echo "<span class='customize-price'> Price: <input type='text' name='framePrice' value = '$0'  readonly> </span>";
}

function getGlassTypes() {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT GlassID, Title, Description, Price FROM TypesGlass";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            // condition to  make no change 
            if($row['Title'] == "[None]"){
                $row['Title'] = "none";
            }
            $aGlass['Title'] = $row['Title'];
            $aGlass['Description'] = $row['Description'];
            $aGlass['Price'] = $row['Price'];
            $glassTypes[$row['GlassID']] = $aGlass;
        }
        $pdo = null;
        return $glassTypes;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}

function showFrameGlassTypes() {
    $glassTypes = getGlassTypes();
    echo "<p> Select Glass: </p>";
    echo "<table id='glass-select'>";
    foreach ($glassTypes as $key => $type) {
        if ($type['Title'] == "none") {
            $radioChecked = 'checked';
        }
        else {
            $radioChecked = '';
        }
        echo "
                <tr>
                    <td>
                        <input type='radio' name='GlassType' value='".$type['Title']." $".$type['Price']."' ".$radioChecked. " onchange='updateFramePrice()'>
                        ".$type['Title']."
                    </td>
                    <td>
                        ".$type['Description']."
                    </td>
                    <td>
                        $".$type['Price']."
                    </td>
                </tr>
            ";
    }
    echo "</table>";
}

function getMattTypes($option) {
    try
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT MattID, ".$option." FROM TypesMatt ORDER BY Title DESC";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        while ($row = $statement->fetch()) {
            // condition to  make no change 
            if($row[$option] == "[None]" || is_null($row[$option])){
                $row[$option] = "Default";
            }
            $aMatt[$option] = $row[$option];
            $mattTypes[$row['MattID']] = $aMatt;
        }
        $pdo = null;
        return $mattTypes;
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        return null;
    }
}


function showMattTitles() {
    $matts = getMattTypes('Title');
    echo "<span class='row-spacing'>Select Matt: <select name='MattTitle'>";
    foreach ($matts as $matt) {
        echo "<option value='".$matt['Title']."'>".$matt['Title']."</option>";      
    }
    echo "</select></span>"; 
}

function showMattColors() {
    $matts = getMattTypes('ColorCode');
    echo "<span class='row-spacing'>Select Matt Color: <select name='colorPicker' id='color-picker' onchange='changeColor()'>";
    foreach ($matts as $matt) {
        echo "<option value='".$matt['ColorCode']."' style='background-color:#".$matt['ColorCode']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";      
    }
    echo "</select></span>"; 
}
 
?>