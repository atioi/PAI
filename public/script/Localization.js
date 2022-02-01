class Localization {

    #latitude;
    #longitude;

    constructor(longitude, latitude) {
        this.#latitude = latitude;
        this.#longitude = longitude;
    }

    getLatitude() {
        return this.#latitude;
    }

    getLongitude() {
        return this.#longitude;
    }

    distance(localization) {

        const R = 6371;

        const lat_1 = localization.getLatitude();
        const lng_1 = localization.getLongitude();

        const lat_2 = this.getLatitude();
        const lng_2 = this.getLongitude();


        const p1 = lat_1 * Math.PI / 180;
        const p2 = lat_2 * Math.PI / 180;

        const p = (lat_2 - lat_1) * Math.PI / 180;
        const l = (lng_2 - lng_1) * Math.PI / 180;

        const a = Math.sin(p / 2) * Math.sin(p / 2) + Math.cos(p1) * Math.cos(p2) * Math.sin(l / 2) * Math.sin(l / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));


        return R * c; // = distance in meters

    }

}