<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/dashboard/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Freely</title>
</head>
<body>

<nav>
    <a href="/">
        <img src="./public/icons/back.svg">
    </a>
</nav>
<div class="Dashboard">

    <div id="panel01" class="Dashboard-Panel">
        <div id="portrait_frame" class="Portrait-Frame">
            <label id="portrait_label_upload" for="portrait_input"></label>
            <input id="portrait_input" type="file" accept="image/png, image/jpg">
        </div>
        <?php ?>
        <p><?= $name ?> <?= $surname ?> </p>
        <?php ?>

    </div>
    <div id="panel02" class="Dashboard-Panel">
        <a>
            koszyk
        </a>
        <div>
            dsadsadsa
        </div>


        <a href="/settings">settings</a>
        <a href="/add">add</a>
        <span class='logout'></span>
    </div>
</div>

<script src="./public/scripts/dashboard.js"></script>


</body>
</html>


