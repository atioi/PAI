let form = document.getElementById('item-uploading-form');

form.addEventListener('submit', event => {

    event.preventDefault();
    const formData = new FormData(event.target);
    const data = JSON.stringify({

        'title': formData.get('title'),
        'description': formData.get('description'),
        'cords': formData.get('localization'),
        'photo_0': convertFileToJSON(formData.get('photo-00')),
        'photo_1': convertFileToJSON(formData.get('photo-01')),
        'photo_2': convertFileToJSON(formData.get('photo-02')),
        'photo_3': convertFileToJSON(formData.get('photo-03'))

    });


    send(data)
        .then(response => {
            console.log(response.body);
        })
        .catch(error => {
            console.log(error);
        });

})


async function send(data) {
    return await fetch('/upload_item', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: data
    })
}


function convertFileToJSON(file) {
    return {
        'name': file.name,
        'size': file.size,
        'type': file.type
    }
}


