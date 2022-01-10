<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freely</title>
    <link rel="stylesheet" type="text/css" href="/public/icons/icons.css">


    <link rel="stylesheet" type="text/css" href="/public/css/upload/desktop.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/upload/mobile.css" media="(max-width: 440px)"/>

</head>
<body>

<main>

    <form class="Form" method="POST" action="/give">

        <div class="Photos-Upload-Bar">

            <!-- Photo 0 -->
            <div class="Frame">
                <div>
                    <img class="Icon" src="public/icons/svg/add_circle_black_24dp (1).svg" alt="">
                    <label class="Photo-Label" for="photo_0"></label>
                    <input class="Photo-Input" id="photo_0" name="photo_0" type="file" accept="image/png, image/jpeg">
                </div>
            </div>


            <!-- Photo 1 -->
            <div class="Frame">
                <div>
                    <img class="Icon" src="public/icons/svg/add_circle_black_24dp (1).svg" alt="">
                    <label class="Photo-Label" for="photo_1"></label>
                    <input class="Photo-Input" id="photo_1" name="photo_1" type="file" accept="image/png, image/jpeg">
                </div>
            </div>


            <!-- Photo 2 -->
            <div class="Frame">
                <div>
                    <img class="Icon" src="public/icons/svg/add_circle_black_24dp (1).svg" alt="">
                    <label class="Photo-Label" for="photo_2"></label>
                    <input class="Photo-Input" id="photo_2" name="photo_2" type="file" accept="image/png, image/jpeg">
                </div>
            </div>


            <!-- Photo 3 -->
            <div class="Frame">
                <div>
                    <img class="Icon" src="public/icons/svg/add_circle_black_24dp (1).svg" alt="">
                    <label class="Photo-Label" for="photo_3"></label>
                    <input class="Photo-Input" id="photo_3" name="photo_3" type="file" accept="image/png, image/jpeg">
                </div>
            </div>
        </div>


        <!-- Localization -->
        <label for="title"></label>
        <input class="Text-Input" id="title" type="text" name="title" placeholder="Title" required>

        <!-- Localization -->
        <label for="localization"></label>
        <input class="Text-Input" id="localization" type="text" name="localization" placeholder="Localization" readonly>

        <!-- Description -->
        <label for="description"></label>
        <textarea class="Text-Input Text-Area" id="description" name="description" placeholder="Description" maxlength="250"></textarea>

        <!-- FIXME: THERE IS ANOTHER DIV ABOVE.   -->
        <input type="submit" value="Create">

    </form>


</main>


<script>

    // Gets user localization;
    let btn = document.getElementById('localization');
    btn.onclick = () => {
        navigator.geolocation.getCurrentPosition((position, error) => {
            btn.value = `${position.coords['latitude']} , ${position.coords['longitude']}`;
        })
    }


    class Filled {

        ADD_ICON_PATH = 'public/icons/svg/add_circle_black_24dp (1).svg';

        click(Frame) {
            const input = Frame.getInput();
            input.value = null;
            const frame = Frame.getFrame();
            frame.setAttribute('style', 'background-color: #EFEFEF;');
            const img = Frame.getIcon();
            img.src = this.ADD_ICON_PATH;
            Frame.setState(new Empty());
        }
    }

    class Empty {


        BIN_ICON_PATH = 'public/icons/svg/delete_black_24dp.svg'

        click(Frame) {
            const input = Frame.getInput();
            input.click();

            const frame = Frame.getFrame();

            input.onchange = () => {
                const reader = new FileReader();

                reader.onloadend = () => {
                    frame.setAttribute('style', `background-image: url(${reader.result});`);
                    const img = Frame.getIcon();
                    img.src = this.BIN_ICON_PATH;
                }

                reader.readAsDataURL(input.files[0]);

                Frame.setState(new Filled());

            }
        }
    }

    class Frame {

        #state;
        #frame;

        constructor(frame) {
            this.#state = new Empty();
            this.#frame = frame;
            this.#frame.addEventListener('click', this.click.bind(this))
        }

        getInput() {
            return this.#frame.getElementsByTagName('input')[0];
        }

        getFrame() {
            return this.#frame;
        }

        getIcon() {
            return this.#frame.getElementsByTagName('img')[0];
        }

        click() {
            this.#state.click(this);
        }

        setState(state) {
            this.#state = state;
        }

    }


    document.querySelectorAll('.Frame').forEach(construction => {
        new Frame(construction);
    })

</script>

</body>
</html>

