console.log('JS Admin');
const switch_btn = document.getElementsByClassName('switch-btn');

for (let element of switch_btn) {

    element.addEventListener('click', (event) => {
        var formdata = new FormData();
        var id = event.target.id.split('-')[1];
        formdata.append("id", id);

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/admin/switch", requestOptions)
            .then(response => response.text())
            .then(result => displayresponse(result.split(' | ')[1]))
            .then(() => setTimeout(() => { window.location = 'http://localhost:8000/profile'; }, snackbar_redirect_timeout))
            .catch(error => console.log('error', error));
    }, false)
};