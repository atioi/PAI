<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/index/index.css">
    <link rel="stylesheet" type="text/css" href="/public/icons/icons.css">

    <title>Freely</title>

</head>
<body>
<nav>
    <header>
        <a href="/">
            <h1 class="Heading">Freely</h1>
        </a>
    </header>

    <a id="dashboard_anch" href="/dashboard">
    </a>

</nav>

<main>
    <!-- Here should be all products -->
</main>

<footer>

    <div>

        <h2>
            <a href="/">
                Freely
            </a>
        </h2>

    </div>
    <div class="Footer-div-2">

        <div>
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

        <div class="Footer-div-2-div">
            <span id="bulb" class="bulb"></span>
            <h3>
                Make the Earth better.
            </h3>
        </div>

    </div>

</footer>

<script>


    async function getAvatar() {
        const response = await fetch('/avatar');
        if (response.status === 404)
            throw new Error();

        return await response.text();
    }

    getAvatar()
        .then(path => {
            const dashboard_anch = document.getElementById('dashboard_anch');
            const img = document.createElement('img');
            img.src = path;
            img.alt = 'Dashboard';

            img.classList.add('User-avatar');
            img.id = 'avatar';

            dashboard_anch.append(img);
        })
        .catch(error => {
            const dashboard_anch = document.getElementById('dashboard_anch');
            const span = document.createElement('span');

            span.classList.add('user');
            span.id = 'avatar';

            dashboard_anch.append(span);
        });


    //TODO: Pobrać ogłoszenia z bazy danych.

</script>

</body>
</html>

