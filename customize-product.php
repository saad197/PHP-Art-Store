<?php
    include('includes/cart-utilities.inc.php');
    if(isset($_GET['PaintingID'])) {
        $paintingID = $_GET['PaintingID'];
    }
    else {
        header('Location: works.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
        <script>
            function updatePrice() {
                var title = document.getElementsByName('Title')[0].value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //console.log(this.responseText);
                        document.getElementById("framePrice").value = this.responseText;
                    }
                };
                xhttp.open("POST", "async-request/price-update.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("Title="+title);
                if (title != "Default") {
                    document.getElementsByName('Color')[0].disabled = false;
                    document.getElementsByName('Syle')[0].disabled = false;
                }
                else {
                    document.getElementsByName('Color')[0].disabled = true;
                    document.getElementsByName('Syle')[0].disabled = true;
                    
                }
            }
        </script>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>

            <form action="" method="post" class"form-group">
                <h2>Customize Painting</h2>
                <fieldset>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <?php  
                                    showFrameTitles();
                                    showFrameColors();  
                                    showFrameStyles();
                                    showPriceForFrameSelection();
                                ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>
