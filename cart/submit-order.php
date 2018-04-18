<?php 

    require('../includes/checkout-utility.inc.php');

    if(session_status() == PHP_SESSION_NONE) {         
        session_start(); 
    }  
    
?>

<?php

include "../includes/head.inc.php";
include '../includes/primary-navigation.inc.php';

?>




<!DOCTYPE html>
<html lang="en">

<style>.error{color : red; margin-top: 0px; margin-bottom: 0px;}</style>
<body>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="google-font">Order made Successfully</h3>
        

    </div>
    <table id='order'>
            <?php

                $count= 0;
                foreach ($_GET as $key => $val) {
                    $count++;
                    if ($count <= 8) {
                        echo "<tr>
                                <td class='col-md-4'>".$key."</td>

                                <td class='col-md-4'>".$val."</td>
                                    </tr>
                                    ";
                    }
                }
                foreach ($_SESSION['CartPaintings'] as $key => $value) {
                    foreach ($value as $key => $val) {
                        if ($key != 'New') {
                            echo "<tr>
                                <td class='col-md-4'>".$key."</td>

                                <td class='col-md-4'>".$val."</td>
                                    </tr>
                                    ";
                        }
                    }
                }
            ?>
        </table>

</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>