<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freely</title>

    <link rel="stylesheet" type="text/css" href="/public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/public/css/form.css">

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
</head>
<body>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet"
      href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css"
      type="text/css">


<!-- To find out more about nav style check public/css/index.css-->
<nav class="Navigation">
    <header>
        <h1>
            <a href="/">Freely</a>
        </h1>
    </header>
</nav>


<main>
    <form id="item-uploading-form">

        <h2>Place your advert</h2>

        <div id="box-01">
            <div class="Frame">
                <div>
                    <img src="/public/icons/svg/add_photo.svg" alt="Click">
                    <label for="photo-00"></label>
                    <input id="photo-00" name="photo-00" type="file">
                </div>
            </div>

            <div class="Frame">
                <div>
                    <img src="/public/icons/svg/add_photo.svg" alt="Click">
                    <label for="photo-01"></label>
                    <input id="photo-01" name="photo-01" type="file">
                </div>
            </div>

            <div class="Frame">
                <div>
                    <img src="/public/icons/svg/add_photo.svg" alt="Click">
                    <label for="photo-02"></label>
                    <input id="photo-02" name="photo-02" type="file">
                </div>

            </div>

            <div class="Frame">
                <div>
                    <img src="/public/icons/svg/add_photo.svg" alt="Click">
                    <label for="photo-03"></label>
                    <input id="photo-03" name="photo-03" type="file">
                </div>
            </div>
        </div>
        <div id="box-02">

            <div>
                <label for="title"></label>
                <input id="title" placeholder="Title" name="title" >

                <label for="description"></label>
                <textarea id="description" placeholder="Description" name="description" ></textarea>

                <label for="localization"></label>
                <input id="localization" type="text" name="localization" >

            </div>

            <div>
                <div id="map"></div>
            </div>
        </div>
        <div id="box-03">
            <input type="reset" value="Cancel">
            <input type="submit" value="Submit">
        </div>
    </form>
</main>

<!-- To find out more about the footer style check public/css/index.css-->
<footer class="Footer">
    <div class="Footer-Top-Bar">
        <h2 class="Footer-Heading">
            <a href="/">Freely</a>
        </h2>
    </div>
    <div class="Footer-Bottom-Bar">
        <div class="Footer-Navigation">
            <ul>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
            <ul>
                <li><a href="#collaboration">Collaboration</a></li>
                <li><a href="#careers">Careers</a></li>
            </ul>
            <ul>
                <li><a href="#help">Help</a></li>
                <li><a href="#privacy-policy">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="Footer-Slogan">
            <span id="bulb" class="Bulb"></span>
            <h3>
                Make the Earth better.
            </h3>
        </div>
    </div>
</footer>


<!-- Mapbox API-->
<script src="/public/script/Upload/mapbox.js"></script>

<script src="/public/script/Upload/uploading.js"></script>

<!-- Script which lets user to upload photo. -->
<script src="/public/script/Upload/photo.js"></script>


</body>
</html>

