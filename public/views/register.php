<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles/root.css"/>
    <link rel="stylesheet" type="text/css" href="./public/styles/desktop/register.css"/>

    <title>Freely</title>
</head>
<body>

<nav>
    <header>
        <h1 class="Header">Freely</h1>
    </header>
</nav>

<main>
    <h2> Create Account</h2>

    <form class="Form" action="/register" method="POST">

        <!--
            FIXME: All inputs should be required and appropriate type.
        -->
        <div>
            <label class="Label" for="name">Name</label>
            <input class="TextInput" name="name" id="name" type="text" placeholder="Name" required>
        </div>

        <div>
            <label class="Label" for="surname">Surname</label>
            <input class="TextInput" name="surname" id="surname" type="text" placeholder="Surname" required>
        </div>

        <div>
            <label class="Label" for="email">Email</label>
            <input class="TextInput" name="email" id="email" type="text" placeholder="Email" required>
        </div>

        <div>
            <label class="Label" for="password">Password</label>
            <input class="TextInput" name="password" id="password" type="password" placeholder="Password" required>
        </div>

        <div>
            <label class="Label" for="passwordConfirmation">Confirm password</label>
            <input class="TextInput" name="passwordConfirmation" id="passwordConfirmation" type="password"
                   placeholder="Confirm Password" required>
        </div>

        <input class="Button" value="Sign Up" type="submit">

    </form>
</main>

</body>
</html>

