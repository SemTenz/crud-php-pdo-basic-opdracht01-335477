<?php
// Voeg de database-gegevens
require('config.php');

// Maak de $dsn oftewel de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    // Maak een nieuw PDO object zodat je verbinding hebt met de mysql database
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    $e->getMessage();
}

// Maak een select-query
$sql = "SELECT * FROM Persoon 
        WHERE Id = :Id";

// Voorbereiden van de query
$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PDO CRUD</title>
</head>
<body>
    <h1>PDO CRUD</h1>

    <form action="create.php" method="post">
        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname" value="<?php echo $result->Voornaam; ?>"><br>

        <label for="infix">Tussenvoegsel:</label><br> 
        <input type="text" name="infix" id="infix" value="<?php echo $result->Tussenvoegsel; ?>"><br>

        <label for="lastname">Achternaam:</label><br> 
        <input type="text" name="lastname" id="lastname" value="<?php echo $result->Achternaam; ?>"><br>

        <label for="phone">Telefoonnummer:</label><br> 
        <input type="tel" name="phone" id="phone" value="<?php echo $result->Telefoonnummer; ?>"><br>

        <label for="street">Straatnaam:</label><br>
        <input type="text" name="street" id="street" value="<?php echo $result->Straatnaam; ?>"><br>

        <label for="number">Huisnummer:</label><br>
        <input type="text" name="number" id="number" value="<?php echo $result->Huisnummer; ?>"><br>

        <label for="house">Woonplaats:</label><br>
        <input type="text" name="house" id="house"value="<?php echo $result->Woonplaats; ?>"><br>

        <label for="postcode">Postcode:</label><br>
        <input type="text" name="postcode" id="postcode"value="<?php echo $result->Postcode; ?>"><br>

        <label for="land">Landnaam:</label><br>
        <input type="text" name="land" id="land"value="<?php echo $result->Landnaam; ?>"><br>

        <input type="submit" value="Verstuur">
    </form>
</body>
</html>