<?php 
// customize product
include('config.inc.php');
require_once('art-ultilities.inc.php');

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
                $row[$option] = "None";
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
        if($frame['Color']=='None') {
            $disabled = 'selected disabled';
        }
        else {
            $disabled = '';
        }
        echo "<option value='".$frame['Color']."'".$disabled.">".$frame['Color']."</option>";      
    }
    echo "</select></span>"; 
}


function showFrameStyles() {
    $frames = getFrameOptions('Syle');
    echo "<span class='row-spacing'>Frame Style: <select name='FrameStyle' disabled>";
    foreach ($frames as $frame) {
        if($frame['Syle']=='None') {
            $disabled = 'selected disabled';
        }
        else {
            $disabled = '';
        }
        echo "<option value='".$frame['Syle']."'".$disabled.">".$frame['Syle']."</option>";      
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

function showMattPrice() {
    echo "<span class='customize-price''> Price: <input type='text' name='MattPrice' value = '$25'  readonly> </span>";
}
 
?>

<?php
// view cart

function getQuantity($itemID) {
    if(isset($_SESSION['CartPaintings'])) {
        foreach ($_SESSION['CartPaintings'] as $cartPaintingID => $cartPainiting) {
            if(isset($cartPainiting['quantity'])) {
            $quantity[$cartPaintingID] = $cartPainiting['quantity'];      
            }
            else {
                $quantity[$cartPaintingID] = 1;
            }
        }
    }
    return $quantity[$itemID];
}

function getCartList() {
    if(isset($_SESSION['CartPaintings'])) {
        $cartItems = $_SESSION['CartPaintings'];
        $count = 1;
        $subtotal = 0;
        foreach ($cartItems as $key => $item) {
            if(isset($_SESSION['CartPaintings'][$key]['CustomizePrice']) && isset($item['TotalPrice'])) {
                $customPrice = $_SESSION['CartPaintings'][$key]['CustomizePrice'];
                $itemPrice  = $item['TotalPrice'];
                $subtotal += $itemPrice;
                $artWork = getPaintingDetails($key);   
                $tax = $subtotal * 0.05;
                $shippingCost = 10;
                $grandTotal = $subtotal + $tax + $shippingCost; 
                $qty = getQuantity($key);
                echo "<tr>
                        <td>".$count++."</td>
                        <td><a href='works.php?PaintingID=".$key."'><img src='images/works/small/".$artWork->getImageFileName().".jpg'  class='cart-pic' alt='Image not available'></a></td>
                        <td><a href='works.php?PaintingID=".$key."'>".$artWork->getTitle()."</a></td>
                        <td><input type='number' name='".$artWork->getPaintingID()."=>quantity' min='1' class='product-quantity' value='".$qty."' onload='updateCartPrices(this,".($count-1)."' onchange='updateCartPrices(this,".($count-1).")'></td>
                        <td>
                            
                            <button type='submit' name='Delete' value='".$artWork->getPaintingID()."'>Delete</button>
                            <a href='customize-product.php?PaintingID=".$key."'><input type='button' name='Edit' value='Edit'></a>
                            <a href='#'><button>fa</button></a>
                        </td>
                        <td id='item-price-".($count-1)."'>$".$itemPrice."</td>
                        <td class='cart-price' ><input type='text' name='ItemSubtotal' id='cart-subtotal-".($count-1)."' value='$".$itemPrice."' readonly></td>
                    </tr>";
            }
        }
        if(isset($subtotal) && isset($shippingCost) && isset($subtotal) && isset($tax)) {
            echo "<tr class='summary-tr'>
                            <td colspan='6'>Subtotal:</td>
                            <td id='summary-subtotal'>$".$subtotal."</td>
                        </tr>
                        <tr class='summary-tr'>
                            <td colspan='6'>Tax</td>
                            <td id='summary-tax'>$".$tax."</td>
                        </tr>
                        <tr class='summary-tr'>
                            <td colspan='6'>Shipping</td>
                            <td id='shipping-price'>$".$shippingCost."</td>
                        </tr>
                        <tr class='summary-tr'>
                            <td colspan='6'><span style='color:red'>GrandTotal</span></td>
                            <td style='color:red' id='summary-total'>
                                $".$grandTotal."
                            </td>
                        </tr>";
        }
    }
}

?>