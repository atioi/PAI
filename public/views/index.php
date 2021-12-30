<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/index.css">
    <title>Freely</title>

</head>
<body>
<nav>
    <header>
        <h1 class="Heading">Freely</h1>
    </header>

    <a class="User-Account-Anch" href="dashboard">
        <img class="User-Alt-Icon" src="./public/icons/user_icon.svg" alt="User"/>
    </a>
</nav>
<main>


    <!-- Prototyp produktu -->
    <?php foreach ($products as $product): ?>
    <div class="Product">
        <div class="ProductBar">
            <h3 class="ProductHeader"><?= $product->getTitle()?></h3>
            <div class="SubProductBar">
                <div class="Localization">
                    <img src="./public/icons/location_icon.svg" alt="Location"/>
                    <span>28 km</span>
                </div>
                <img src="./public/icons/info_icon.svg" alt="Info">
            </div>
        </div>
    </div>
    <?php endforeach; ?>


</main>
<footer></footer>
</body>
</html>

