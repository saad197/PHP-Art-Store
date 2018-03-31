<?php

include "config.inc.php";



try {
    $conn = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

echo $_POST["email"];
?>







?>