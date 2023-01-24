<?php

include('config.php');
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "er is een verbinding";
    } else {
        echo "er is een error";
    }
} catch(PDOException $e) {
    echo "er is helaas geen verbinding met de database<br>";
    echo "Systeemmelding: " . $e->getMessage();
}

$sql = "INSERT INTO persoon (Id
                            ,Voornaam
                            ,Tussenvoegsel
                            ,Achternaam)
        VALUES              (NULL
                            ,:firstname
                            ,:infix
                            ,:lastname);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':infix', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);

$statement->execute();




