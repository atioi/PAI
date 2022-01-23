<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/index/index.css">
    <link rel="stylesheet" type="text/css" href="/public/icons/icons.css">

    <link rel="stylesheet" type="text/css" href="/public/css/index.css">
    <title>Freely</title>


    <style>


    </style>

</head>
<body>
<nav class="Navigation">
    <header>
        <h1>
            <a href="/">
                Freely
            </a>
        </h1>
    </header>

    <a id="dashboard_anch" class="Avatar" href="/dashboard">
        <img id="avatar" src="<?= $avatar ?>" alt="avatar">
    </a>

</nav>

<main>
    <div id="items-container">

    </div>
</main>


<footer class="Footer">
    <div class="Footer-Top-Bar">
        <h2 class="Footer-Heading">
            <a href="/">Freely</a>
        </h2>
    </div>
    <div class="Footer-Bottom-Bar">
        <div class="Footer-Navigation">
            <ul>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
            <ul>
                <li><a href="#collaboration">Collaboration</a></li>
                <li><a href="#careers">Careers</a></li>
            </ul>
            <ul>
                <li><a href="#help">Help</a></li>
                <li><a href="#privacy-policy">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="Footer-Slogan">
            <span id="bulb" class="Bulb"></span>
            <h3>
                Make the Earth better.
            </h3>
        </div>
    </div>
</footer>

<script src="/public/script/Item.js"></script>
<script src="/public/script/fetch-items.js"></script>

</body>
</html>

