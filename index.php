<?php
//Verbinding maken met PDO
$hostname = '127.0.0.1';
$username = 'root';
$password = 'root';
$database = 'webshop';

try {
    $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Statement echt uitvoeren
    $statement = $connection->query("SELECT * FROM `tshirts` ORDER BY `modelshirt`");

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
</head>
<body>
<section class="webshop">
    <h1 class="webshop__title">Webshop</h1>
    <div class="tshirts">
        <?php foreach ($statement as $tshirt) { ?>
            <div class="tshirt">
                <h2 class="tshirt__model"><?php echo $tshirt['modelshirt'] ?></h2>
                <img src="images/<?php echo $tshirt['image'] ?>" class="tshirt__image"/>

                <em class="tshirt__color">Kleur: <?php echo $tshirt['kleur'] ?></em>

                <em class="tshirt__size">Maat: <?php echo $tshirt['maat'] ?></em>

                <?php if ($tshirt['voorraad'] > 0) { ?>
                    <a class="tshirt__link" href="tshirt.php?id=<?php echo $tshirt['id'] ?>">Meer informatie</a>
                <?php } else { ?>
                    <em class="tshirt__soldout"">UITVERKOCHT</em>
                <?php } ?>

            </div>
        <?php } ?>
    </div>
</section>
</body>
</html>