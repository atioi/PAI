<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freely</title>
    <link rel="stylesheet" href="/public/css/register.css">

</head>
<body>

<h1>CREATE ACCOUNT</h1>

<form method="post" action="/register">
    <div>
        <label for="name"></label>
        <input id="name" name="name" type="text" placeholder="Name" required>
    </div>
    <div>
        <label for="surname"></label>
        <input id="surname" name="surname" type="text" placeholder="Surname" required>
    </div>
    <div>
        <label for="email"></label>
        <input id="email" name="email" type="email" placeholder="Email" required>
    </div>
    <div>
        <label for="password"></label>
        <input id="password" name="password" type="password" placeholder="Password" required>
    </div>
    <div>
        <label for="password-confirmation"></label>
        <input id="password-confirmation" name="password_confirmation" type="password"
               placeholder="Confirm password"
               required>
    </div>

    <input id="submit" type="submit" value="CREATE">

    <p>Already have account? <a href="/login">Login</a></p>
</form>


</body>
</html>

