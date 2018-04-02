<?php
include('config.inc.php');
session_start();
if(isset($_SESSION['cusID'])){
    $cusID = $_SESSION['cusID'];
    print_r($cusID);
}

try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT CONCAT_WS(' ', FirstName, LastName) AS FullName
            FROM Customers
            WHERE CustomerID = :cusId";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':cusId', $cusID);
    $statement->execute();
    while($row = $statement->fetch()) {
        $cusName = $row['FullName'];
    }

} catch (PDOException $e) {
    die($e->getMessage());
}

if(isset($cusName)) {
    $_SESSION['cusName'] = $cusName;
    header('Location: ../index.php');
}
?>