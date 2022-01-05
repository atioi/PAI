<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/dashboard/dashboard.css">
    <link rel="stylesheet" type="text/css" href="./public/icons/icons.css">

    <title>Freely</title>
</head>
<body>

<nav>
    <a href="/">
        back
    </a>
</nav>
<div class="Dashboard">

    <div id="panel01" class="Dashboard-Panel">
        <div id="portrait_frame" class="Portrait-Frame">
            <img class="Avatar" src="/avatar">
            <label id="portrait_label_upload" for="portrait_input"></label>
            <input id="portrait_input" type="file" accept="image/png, image/jpg">
        </div>
        <?php ?>
        <p><?= $name ?> <?= $surname ?> </p>
        <?php ?>

    </div>
    <div id="panel02" class="Dashboard-Panel">

        <ul>
            <li>
                <a href="#cart">
                    <span class='cart'></span>
                </a>
            </li>
            <li>
                <a href="#settings">
                    <span class='settings'></span>
                </a>
            </li>
            <li>
                <a href="#logout">
                    <span class='logout'></span>
                </a>
            </li>
            <li>
                <a href="#add">
                    <span class='add'></span>
                </a>
            </li>
        </ul>


    </div>
</div>

<script src="./public/scripts/dashboard.js"></script>


</body>
</html>


