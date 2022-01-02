<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/dashboard/dashboard.css">
    <title>Freely</title>
</head>
<body>

<nav>
    <a href="/">X</a>
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
        <a href="/settings">settings</a>
        <a href="/add">add</a>
        <a href="/logout">logout</a>
    </div>
</div>

<script src="./public/scripts/dashboard.js"></script>


</body>
</html>


