let userLocalization;

navigator.geolocation.getCurrentPosition(
    position => {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        userLocalization = new Localization(lng, lat);
    },
    error => {
        console.log('Error');
    }
)
