
<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
        <style>
            #login-box{
                border: 0.5px solid grey;
                width: 400px;
                margin: 0 auto;
                padding: 20px;
            }
            #login-box #login-header{
                height: 30px;
            }
        </style>
    </head>
    <body>
        <?php include('includes/primary-navigation.inc.php');?>
        <div id="login-box">
            <form class="form-group" action="includes/login-authentication.php" method="post">
                <fieldset>
                    <legend>Welcome to Art Store</legend>
                    <span style="color:red">
                        <?php
                             if(isset($_SESSION['Err'])) {
                                print_r($_SESSION['Err']);
                                }
                        ?>
                    </span>
                    <p>
                        <label>Email address: </label><br />
                        <input type="email" name="username" id="username"  />
                    </p>
                    
                    <p>
                        <label>Password: </label><br />
                        <input type="password" name="pword" id="pword"  />
                    </p>
                    <p>
                        <button class="btn btn-primary" type="submit" name="login" id="login">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </body>
</html>