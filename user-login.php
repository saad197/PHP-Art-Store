
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $errors = array();
        $requires = array('username', 'pword');
        foreach($requires as $field) {
            if(! isset($_POST[$field]) || empty($_POST[$field])) {
                $errors[] = "The <strong>{$field}</strong> are required.";
            }
        }//end foreach

        if(empty($errors)) {
            //connect database and authenticate the user acc
            
        }
    }
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
                /* background-color: orange;
                color: white; */
            }
        </style>
    </head>
    <body>
        <?php include('includes/primary-navigation.inc.php');?>
        <div id="login-box">
            <form class="form-group" action="" method="post">
                <fieldset>
                    <legend>Welcome to Art Store</legend>
                    <p>
                        <label>Email address: </label><br />
                        <input type="email" name="username" id="username" required />
                    </p>
                    
                    <p>
                        <label>Password: </label><br />
                        <input type="password" name="pword" id="pword" required />
                    </p>
                    <p>
                        <button class="btn btn-primary" type="submit" name="login" id="login">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </body>
</html>