<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles/root.css"/>
    <link rel="stylesheet" type="text/css" href="./public/styles/desktop/login.css"/>
    <title>Freely</title>
</head>
<body>

<nav>
    <header>
        <h1 class="Header">Freely</h1>
    </header>
</nav>

<main>
    <form class="Form" action="/login" method="POST">
        <!--
            FIXME: All inputs should be required and appropriate type.
        -->
        <div>
            <label class="Label" for="email"></label>
            <input class="TextInput" name="email" id="email" type="text" placeholder="Email" required>
        </div>

        <div>
            <label class="Label" for="password"></label>
            <input class="TextInput" name="password" id="password" type="password" placeholder="Password" required>
        </div>

        <input class="Button" value="Sign In" type="submit">
    </form>
</main>

</body>
</html>

