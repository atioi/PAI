<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="/register" method="POST">

    <!--
        FIXME: All inputs should be required and appropriate type.
    -->
    <label for="name">Name</label>
    <input name="name" id="name" type="text">

    <label for="surname">Surname</label>
    <input name="surname" id="surname" type="text">

    <label for="email">Email</label>
    <input name="email" id="email" type="text">

    <label for="password">Password</label>
    <input name="password" id="password" type="text">

    <label for="passwordConfirmation">Confirm password</label>
    <input name="passwordConfirmation" id="passwordConfirmation" type="text">

    <input type="submit">

</form>

</body>
</html>

