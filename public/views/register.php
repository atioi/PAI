<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freely</title>

    <!-- General css -->
    <link rel="stylesheet" type="text/css" href="./public/css/register/register.css"/>
    <!-- Desktop css -->
    <link rel="stylesheet" type="text/css" href="/public/css/register/desktop.css"/>
    <!-- Tablet css-->
    <link rel="stylesheet" type="text/css" href="/public/css/register/tablet.css" media="(max-width: 900px)"/>
    <!-- Mobile css -->
    <link rel="stylesheet" type="text/css" href="/public/css/register/mobile.css" media="(max-width: 440px)"/>
</head>
<body>

<nav>
    <header>
        <a href="/">
            <h1>Freely</h1>
        </a>
    </header>
</nav>
<main>

    <h2>Create Account</h2>

    <form method="post" action="/register">
        <div class="Form-Field">
            <label for="name"></label>
            <input id="name" name="name" type="text" placeholder="Name" required>
        </div>
        <div class="Form-Field">
            <label for="surname"></label>
            <input id="surname" name="surname" type="text" placeholder="Surname" required>
        </div>
        <div class="Form-Field">
            <label for="email"></label>
            <input id="email" name="email" type="email" placeholder="Email" required>
        </div>
        <div class="Form-Field">
            <label for="password"></label>
            <input id="password" name="password" type="password" placeholder="Password" required>
        </div>
        <div class="Form-Field">
            <label for="password-confirmation"></label>
            <input id="password-confirmation" name="password_confirmation" type="password"
                   placeholder="Confirm password"
                   required>
        </div>

        <?php ?>
        <p style="color: <?= $color ?>"><?= $message ?> </p>
        <?php ?>

        <input id="submit" type="submit" value="Create">

        <p>Already have account? <a href="/login">Login</a></p>
    </form>

</main>

<footer>


    <h2 class="Footer-Heading">
        <a class="Footer-Heading-Anchor" href="/">Freely</a>
    </h2>

    <div>

        <!-- Footer navigation: -->
        <div class="Footer-Nav-Container">
            <ul>
                <li><a href="/indev">About Us</a></li>
                <li><a href="/indev">Contact Us</a></li>
            </ul>
            <ul>
                <li><a href="/indev">Careers</a></li>
                <li><a href="/indev">Help</a></li>
            </ul>
            <ul>
                <li><a href="/indev">Privacy Policy</a></li>
                <li><a href="/indev">Term of Use</a></li>
            </ul>
        </div>

        <!-- Footer image about saving Earth. -->
        <div class="Footer-Right-Panel">
            <img src="/public/icons/bulb.svg" alt="Bulb">
            <h3>Make the Earth <br> better.</h3>
        </div>
    </div>

</footer>

</body>
</html>

