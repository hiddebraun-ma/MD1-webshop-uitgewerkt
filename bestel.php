<?php
if (!isset($_GET['id'])) {
    echo 'Geen T-Shirt ID opgegeven in de URL!';
    exit;
}

$tshirt_id = $_GET['id'];

//Verbinding maken met PDO
$hostname = '127.0.0.1';
$username = 'root';
$password = 'root';
$database = 'webshop';

try {
    $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Eerst de voorraad ophalen uit de database
    $statement = $connection->query("SELECT * FROM `tshirts` WHERE `id` = " . $tshirt_id);
    $statement->execute();

    // De eerste rij ophalen (dit is het t-shirt wat je ophaalt)
    $tshirt = $statement->fetch();

    // Is de voorraad wel groter dan 0? Dan kunnen we er 1 aftrekken
    if ($tshirt['voorraad'] > 0) {

        // Nieuwe voorraad berekenen door van de huidige voorraad er 1 af te trekken en op te slaan in variabele $nieuwe_voorraad
        $nieuwe_voorraad = $tshirt['voorraad'] - 1;

        // UPDATE SQL query make om de voorraad aanpassen in de database bij de regel met het juiste t-shirt
        $statement = $connection->query("UPDATE `tshirts` SET `voorraad` = " . $nieuwe_voorraad . " WHERE `id` = " . $tshirt_id);

        // SQL query uitvoeren
        $statement->execute();

        // De bezoeker / browser terugsturen naar de detail pagina
        header('Location: tshirt.php?id=' . $tshirt_id);

    } else {
        // Anders is
        echo 'Dit t-shirt is uitverkocht, sorry!';
    }

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}
