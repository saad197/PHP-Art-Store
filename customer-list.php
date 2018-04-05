<?php



include "classes/customerlist.class.php";
include "includes/head.inc.php";
include('includes/primary-navigation.inc.php');


function getCustomerList() {

    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Customers ORDER BY CustomerID ASC ";
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {

            ///will create instance of AdoptionList class to store the adoption data
            $aCustomer = new CustomerList($row['CustomerID'],$row['FirstName'],$row['LastName'],$row['Address'],
                $row['City'],$row['Region'], $row['Country'],$row['Postal'], $row['Phone'], $row['Email'], $row['Privacy']);
            $customerlist[] = $aCustomer;
         //   asort($adoption_detail);
        }
        $pdo = null;
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $customerlist;
}




?>


<!DOCTYPE html>
<html lang="en">

<style>.error{color : red; margin-top: 0px; margin-bottom: 0px;}</style>
<body>




                         <?php
                       //In loop will go over all records
                         if ( @$_SESSION['cusID']) {

                             if (isAdmin($_SESSION['cusID'])) {

                                 echo '
                               

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="google-font">Customer List </h3>
                            </div>
                             <table class = "table table-bordered">
                             <thead>
                             <tr>
                             <th scope="col" style = "text-align: center;">Customer ID</th>
                            <th scope="col" style = "text-align: center;">Name</th>
                            <th scope="col" style = "text-align: center;">Phone</th>
                            <th scope="col" style = "text-align: center;">Email</th>
                            <th scope="col" style = "text-align: center;">Edit</th>
                    
                            </tr>
                            </thead>
                            <tbody>';
                                 $customers = getCustomerList();
                                 foreach ($customers as $customerList) {
                                     echo $customerList;
                                 }
                             }
                             else {
                                 echo '
                             <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="google-font"><span class = "	glyphicon glyphicon-lock"></span> Access Denied</h3>
                            
                            
                                </div>
                                <form action="index.php">
                            
                                            <button type="submit" class="btn btn-success btn-lg" style = "margin-top: 20px; margin-left: 20px;"><span class = " glyphicon glyphicon-home" ></span> Home</button>
                            
                                    </div>
                            
                                </form>
                            
                            </div>
                             ';
                             }
                         }
                         else {
                             echo '
                             <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="google-font">Please Login First</h3>
                            
                            
                                </div>
                                <form action="user-login.php">
                            
                                            <button type="submit" class="btn btn-success btn-lg" style = "margin-top: 20px; margin-left: 20px;">Login</button>
                            
                                    </div>
                            
                                </form>
                            
                            </div>
                             ';
                         }
                        ?>
        </tbody>
    </table>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

