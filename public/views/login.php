<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/login.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Freely</title>
</head>
<body>


<h1>LOGIN</h1>

<form action="/login" method="POST">

    <!-- Email field /-->
    <div>
        <label for="email"></label>
        <i class="material-icons" id="letter">mail_outline</i>
        <input name="email" id="email" type="text" placeholder="Email" required>
    </div>


    <!-- Password field /-->
    <div>
        <label for="password"></label>
        <i class="material-icons" id="lock">lock</i>
        <input name="password" id="password" type="password" placeholder="Password" required>
        <i class="material-icons" id="eye">visibility_off</i>
    </div>

    <!-- Submit button -->
    <input class="Button" value="LOGIN" type="submit">

</form>

<p>or <a href="/register">create account</a></p>


<script>

    // Hide or display password during login operation.
    const eye = document.getElementById('eye');
    const password = document.getElementById('password');

    eye.classList.add('invisible');

    password.onkeyup = () => {
        eye.classList.remove('invisible');
    }

    eye.onclick = () => {
        eye.innerText = 'visibility' === eye.innerText ? 'visibility_off' : 'visibility';
        const type = 'password' === password.getAttribute('type') ? 'text' : 'password';
        password.setAttribute('type', type);
    }

</script>


</body>
</html>

