<?php
// Checks session has started or not
    if(session_status() == PHP_SESSION_NONE) {         
        session_start();     
    }
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>
        <div class="container">
            <table class="table table-bordered">
                <thead><h1>Shopping Cart</h1></thead>
                <tbody>
                    <tr id="tb-header">
                        <th colspan='2'>Product</th>
                        <th>#</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>Pic # 1</td>
                        <td>Girl with a pearl</td>
                        <td>4</td>
                        <td>$90.00</td>
                        <td>$250.00</td>
                    </tr>
                    <tr>
                        <td>Pic # 2</td>
                        <td>Girl with a pearl</td>
                        <td>3</td>
                        <td>$80.00</td>
                        <td>$240.00</td>
                    </tr>
                    <tr class="summary-tr">
                        <td colspan='4'>Subtotal</td>
                        <td>$515</td>
                    </tr>
                    <tr class="summary-tr">
                        <td colspan='4'>Tax</td>
                        <td>$56</td>
                    </tr>
                    <tr class="summary-tr">
                        <td colspan='4'>Shipping</td>
                        <td>$77</td>
                    </tr>
                    <tr class="summary-tr">
                        <td colspan='4'><span style='color:red'>GrandTotal</span></td>
                        <td style='color:red'>$776</td>
                    </tr>
                </tbody>
            </table>
       </div><!--end container-->
    </body>
</html>