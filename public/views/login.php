<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/login.css"/>
    <title>Freely</title>
</head>
<body>

<nav>
    <header>

        <a href="/">
            <h1 class="Header"> Freely</h1>
        </a>

    </header>
</nav>

<main>

    <h2>Sign In</h2>
    <form class="Form" action="/login" method="POST">
        <!--
            DONE: FIXME: All inputs should be required and appropriate type.
        -->

        <div>
            <label class="Label" for="email"></label>
            <input class="TextInput" name="email" id="email" type="text" placeholder="Email" required>
        </div>


        <div>
            <label class="Label" for="password"></label>
            <input class="TextInput" name="password" id="password" type="password" placeholder="Password" required>
        </div>

        <?php ?>
        <p class="LoginInfoMessage"><?= $message ?> </p>
        <?php ?>

        <input class="Button" value="Sign In" type="submit">
    </form>

    <div>
        or <a href="register">sign up</a>
    </div>

</main>

</body>
</html>

