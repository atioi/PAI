let portrait_input = document.getElementById('portrait_input');
portrait_input.onchange = getAvatar;


function getAvatar(event) {

    let file = event.target.files[0];
    upload(file);

}


function upload(avatar) {

    let formData = new FormData()
    formData.append('avatar', avatar);

    fetch('/portrait', {
        method: 'POST',
        body: formData
    }).then(r => {
        console.log(r);
    });

}


