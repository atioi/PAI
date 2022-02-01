const items_container = document.getElementById('items-container');


class Localization {

    #lng;
    #lat;

    constructor(lng, lat) {
        this.#lat = lat;
        this.#lng = lng;
    }

    lat() {
        return this.#lat;
    }

    lng() {
        return this.#lng;
    }

    distance(localization) {

        const R = 6371.0710; // Radius of the Earth in miles
        const rlat1 = this.lat() * (Math.PI / 180); // Convert degrees to radians
        const rlat2 = localization.lat() * (Math.PI / 180); // Convert degrees to radians
        const difflat = rlat2 - rlat1; // Radian difference (latitudes)
        const difflon = (localization.lng() - this.lng()) * (Math.PI / 180); // Radian difference (longitudes)

        return 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));

    }

}


class Item {

    #title;
    #localization
    #photos

    constructor(title, localization, photos) {
        this.#title = title;
        this.#localization = new Localization(localization['lng'], localization['lat']);
        this.#photos = photos;
    }

    photo(i) {
        return this.#photos[i];
    }

    render(parent) {
        const div = document.createElement('div')

        const info = document.createElement('div');
        info.className = 'Info';

        const img = document.createElement('img');
        const h3 = document.createElement('h3');
        const p = document.createElement('p');

        const noImage = '/public/icons/image_not_supported_black_18dp.svg'

        img.setAttribute('src', this.photo(0));

        img.onerror = () => {
            img.src = noImage;
            img.className = 'Error-Image';
        }

        div.className = 'Item';
        h3.innerText = this.#title;

        // FIXME: --->
        navigator.geolocation.getCurrentPosition(success => {
            const user = new Localization(success.coords.longitude, success.coords.latitude);
            p.innerText = `${Math.round(this.#localization.distance(user))} KM`;
        }, error => {

        })
        // FIXME: <---

        p.className = 'Distance';

        info.append(h3);
        info.append(p);

        div.append(img);
        div.append(info);
        parent.append(div);
    }

}


// Waiting block appears when fetchItems function is called,
// and disappears when when the result of fetchItem asyn await function is caught.
const waitingBlock = document.createElement('div')
waitingBlock.className = 'Waiting-Block';
items_container.append(waitingBlock);

const waitingBlockSubDiv = document.createElement('div');
waitingBlockSubDiv.append(document.createElement('div'));

waitingBlock.append(waitingBlockSubDiv);


async function fetchItems() {
    const response = await fetch('/items');
    const json = await response.json();
    return json.map(item => new Item(item['title'], item['localization'], item['photos']));
}

fetchItems()
    .then(items => {
        waitingBlock.remove();
        items.forEach(item => item.render(items_container))
    })
    .catch(error => console.error(error));

