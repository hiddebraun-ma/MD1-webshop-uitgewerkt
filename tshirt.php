<?php
//Checken of de id parameter in de url staat (GET)

if (!isset($_GET['id'])) {
    // Zo niet, dan foutmelding geven
    echo 'Geen T-Shirt ID opgegeven in de URL!';
    exit;
}

// id uit de URL op slaan in een variabele $tshirt_id
$tshirt_id = $_GET['id'];

//Verbinding maken met PDO
$hostname = '127.0.0.1';
$username = 'root';
$password = 'root';
$database = 'webshop';

try {
    $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Juiste t-shirt ophalen met een SELECT en een WHERE in de SQL
    $statement = $connection->query("SELECT * FROM `tshirts` WHERE id = " . $tshirt_id);
    $statement->execute();

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop</title>
    <link href="https://fonts.googleapis.com/css?family=Bangers|Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tshirt-detail.css">
</head>
<body>

<section class="webshop">

    <?php foreach ($statement as $tshirt) { ?>

        <h1 class="webshop__title">Webshop</h1>

        <div class="tshirt-detail">

            <div class="tshirt-detail__image">
                <img src="images/<?php echo $tshirt['image'] ?>" class="tshirt__image"/>
            </div>

            <div class="tshirt-detail__info">

                <h2 class="tshirt-detail__title"><?php echo $tshirt['modelshirt'] ?></h2>

                <p>
                    <em class="tshirt-detail__color"><?php echo $tshirt['kleur'] ?></em><em
                            class="tshirt-detail__size"><?php echo $tshirt['maat'] ?></em>
                </p>

                <p>
                    Aantal beschikbaar: <?php echo $tshirt['voorraad'] ?>
                </p>

                <a class="tshirt-detail__order" href="bestel.php?id=<?php echo $tshirt['id'] ?>">Bestel dit t-shirt</a>

                <p>
                    <a href="index.php">Terug naar alle t-shirts</a>
                </p>

            </div>
        </div>
    <?php } ?>
</section>
</body>
</html>