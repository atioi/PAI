<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/styles/index.css"/>
    <title>Title</title>
</head>
<body>


<form action="/login" method="POST">
    <!--
        FIXME: All inputs should be required and appropriate type.
    -->
    <label for="email"></label>
    <input name="email" id="email" type="text">

    <label for="password"></label>
    <input name="password" id="password" type="text">

    <input class="Button" value="Sign In" type="submit">
</form>

</body>
</html>

