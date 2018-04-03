<?php

include('../includes/config.inc.php');

if (isset($_POST['Title'])) {
    $title = $_POST['Title'];
}
else {
    $title = "Default";
}

// if (isset($_POST['Color'])) {
//     $color =  $_POST['Color'];
// }
// else {
//     $color = "Default";
// }

// if (isset($_POST['Syle'])) {
//     $style = $_POST['Syle'];
// }
// else {
//     $style = "Default";
// }


try
{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT Price FROM TypesFrames WHERE Title = ?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $title);
    $statement->execute();
    $row = $statement->fetch();
    echo $row['Price'];
    $pdo = null;
}
catch (PDOException $e)
{
    die($e->getMessage());
}

?>