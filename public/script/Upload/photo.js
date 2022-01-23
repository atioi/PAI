// Gets user localization;

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

                const layer = Frame.getLayer();
                layer.classList.add('red');

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

    getLayer() {
        return this.#frame.children[0];
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
