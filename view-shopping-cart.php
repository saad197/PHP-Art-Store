<?php

include('includes/cart-utilities.inc.php');

// Checks session has started or not
if(session_status() == PHP_SESSION_NONE) {         
    session_start();     
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
            include "includes/head.inc.php";
            include "includes/view-cart.script.inc.php";
        ?>
        
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>
        <form action="#" method="POST">
            <table class="table table-bordered">
                <thead><h1>Shopping Cart</h1></thead>
                <tbody>
                    <tr id="tb-header">
                        <th>Item No:</th>
                        <th colspan='2'>Product</th>
                        <th>#</th>
                        <th>Actions</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                    <?php getCartList(); ?>
                    <!-- <tr>
                        <td colspan='7'>
                    </tr> -->
                </tbody>
            </table>
                <div id='checkout'><a href='#'><button type='submit'>Checkout</button></td></a></div>
        </form>
       </div><!--end container-->
       <script>
           updateCartPrices();
        </script>
    </body>
</html>