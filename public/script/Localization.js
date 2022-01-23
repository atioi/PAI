class Localization {

    #latitude;
    #longitude;
    #radius = 6371;

    constructor(longitude, latitude) {
        this.#latitude = latitude;
        this.#longitude = longitude;
    }

    getLatitude(){
        return this.#latitude;
    }

    getLongitude(){
        return this.#longitude;
    }

    distance(localization) {
        localization.getLatitude();
        localization.getLongitude();
        


    }

}