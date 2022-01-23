<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freely</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap');

        * {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            font-size: 20px;
        }

        body {
            display: flex;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
        }

        body div {
            margin: 3rem 0;

            width: 50%;
            min-width: max-content;

            display: flex;
            flex-direction: column;
        }


        #d2 {
        }

        #d1 * {
            margin-left: auto;
            margin-right: auto;
        }

        .Info {
            width: min-content;
        }

        .Info * {
            margin-left: auto;
            margin-right: auto;
        }

        .Info p {
            font-size: 2rem;
            margin: 2rem 0;
        }

        .Frame {
            border-radius: 50%;
            overflow: hidden;

            width: fit-content;
            height: fit-content;

            display: flex;
            align-content: center;
            justify-content: center;
        }

        .Portrait {
            width: 15rem;
            height: 15rem;
        }

        .Frame:hover .Portrait {
            cursor: pointer;
            filter: brightness(0.5);
        }


    </style>

</head>
<body>

<div id="d1">
    <div class="Info">
        <div class="Frame">
            <img class="Portrait" src="<?= $avatar ?>" alt="avatar">
        </div>
        <p><?= $name ?> <?= $surname ?></p>
    </div>
</div>
<div id="d2">
    <a href="/">Shopping</a>
    <a href="/upload">Upload</a>
    <a href="/cart">Cart</a>
    <a href="/logout">Logout</a>
</div>

</body>
</html>


