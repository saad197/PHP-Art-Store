<?php
    include('includes/cart-utilities.inc.php');
    if(isset($_GET['PaintingID'])) {
        $paintingID = $_GET['PaintingID'];
    }
    else {
        header('Location: works.php');
    }
    $painting = getPaintingDetails($paintingID);

    // Checks session has started or not
    if(session_status() == PHP_SESSION_NONE) {         
        session_start();     
    }

    // Collect previous cart value and add new one
    if(isset($_SESSION['CartPaintings'])) {
        $cartPaintings = $_SESSION['CartPaintings'];
        $paintingInfo['New'] = true;
        $cartPaintings[$paintingID] = $paintingInfo;
    }
    else {
        $paintingInfo['New'] = true;
        $cartPaintings[$paintingID] = $paintingInfo;
    }

    $_SESSION['CartPaintings'] = $cartPaintings;
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
        <?php include("includes/customize-product.script.inc.php") ;?>
        <?php include('includes/view-cart.script.inc.php'); ?>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>
            <form action="cart/add-to-cart.php" method="POST" class"form-group">
                <h2><?php echo $painting->getTitle(); ?></h2>
                <div id='form-box'>
                    <fieldset>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                <h3>Customize Your Painting</h3>
                                <hr>
                                    <?php  
                                        showFrameTitles();
                                        showFrameColors();  
                                        showFrameStyles();
                                        showPriceForFrameSelection();
                                    ?>
                                <br>
                                <hr>
                                    <?php 
                                        showFrameGlassTypes();
                                    ?>
                                <br>
                                <hr>
                                    <?php
                                        showMattTitles();
                                        showMattColors();
                                    ?>
                                    <br>
                                    <hr>
                                    <span class='customize-price row-spacing'>Item Price: <input type='text' name='ItemPrice' value='<?php echo "$".intval($painting->getCost()); ?>' readonly></span>
                                    <span class='customize-price row-spacing'>Total Customize Price: <input type='text' name='CustomizePrice' value='$0' readonly></span>
                                    <span class='customize-price row-spacing'>Total Price: <input type='text' name='TotalPrice' value='$0' readonly></span>
                                    <br>
                                    <hr>
                                    <input type='submit' name='submit' value="Submit" class='submit-btn'>
                                    <input type='reset' name='reset' value='Reset' class='submit-btn' onclick='resetColorPicker()'>
                                    <input type='submit' name='submit' value='Cancel' class='submit-btn'>
                                    <br>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <script>updateFinalPrices(0);</script>
            </div>
        </div>
    </body>
</html>
