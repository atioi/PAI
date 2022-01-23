class Item {

    #title;
    #description;
    #localization;
    #photos;

    constructor(title, description, localization, photos) {
        this.#title = title;
        this.#description = description;
        this.#localization = localization;
        this.#photos = photos;

        return this.create();
    }

    create() {
        const item = document.createElement('div');
        item.className = 'Item';

        const info = this.info();

        info.append(this.title())
        info.append(this.localization());

        item.append(this.photo());
        item.append(info);

        item.addEventListener('click', this.click);


        return item;
    }

    click() {
        console.log('hello');
    }



    info() {
        const info = document.createElement('div');
        info.className = 'Info';
        return info;
    }

    title() {
        const title = document.createElement('p');

        title.innerText = this.#title;
        title.className = 'Title';

        return title;
    }

    localization() {
        const localization = document.createElement('p');

        localization.innerText = '9km';
        localization.className = 'Localization';

        return localization;
    }

    photo() {
        const photo = document.createElement('img');
        photo.className = 'Photo';
        photo.alt = 'photo';
        photo.src = this.#photos[0];
        return photo;
    }

}

