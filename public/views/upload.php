<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/upload.css">
    <title>Freely</title>
</head>
<body>
<main>
    <form class="UploadForm">
        <div class="UploadingBoard">

            <label for="img00">
                <img src="./public/icons/add_circle.svg" alt="plus">
            </label>
            <input id="img00" type="file"/>

            <label for="img01">
                <img src="./public/icons/add_circle.svg" alt="plus">
            </label>
            <input id="img01" type="file"/>

            <label for="img02">
                <img src="./public/icons/add_circle.svg" alt="plus">
            </label>
            <input id="img02" type="file"/>

            <label for="img03">
                <img src="./public/icons/add_circle.svg" alt="plus">
            </label>
            <input id="img03" type="file"/>

        </div>


        <input class="UploadFormTitle Input" placeholder="Title">
        <input class="UploadFormLocalization Input" placeholder="Localization">
        <textarea></textarea>
    </form>


</main>

<script>
    navigator.geolocation.getCurrentPosition((position) => {
        console.log(position);
    })
</script>

</body>
</html>

