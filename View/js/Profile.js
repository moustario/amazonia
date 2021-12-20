console.log('JS Profile');

// TODO add all the buttons that got deleted
// TODO disconnect request

update_btn.addEventListener('click',
    () => {
        var formdata = new FormData();
        formdata.append("name", document.getElementById('profile-name').value);
        formdata.append("password", document.getElementById('profile-password').value);
        formdata.append("wallet", document.getElementById('profile-wallet').value);
        formdata.append("id", document.getElementById('profile-id').value)
        formdata.append("type", "update");

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/profile", requestOptions)
            .then(response => response.text())
            .then(result => displayresponse(result.split(' | ')[1]))
            .then(() => setTimeout(() => { window.location = 'http://localhost:8000/profile'; }, snackbar_redirect_timeout))
            .catch(error => console.log('error', error));
    },
    false
);

create_gig_btn.addEventListener('click',
    () => {
        var formdata = new FormData();
        formdata.append("price", document.getElementById('gig-create-price').value);
        formdata.append("description", document.getElementById('gig-create-description').value);
        formdata.append("category", document.getElementById('gig-create-category').value);
        formdata.append("id_user", document.getElementById('gig-create-id_user').value)
        formdata.append("type", "create");

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/gig", requestOptions)
            .then(response => response.text())
            .then(result => displayresponse(result.split(' | ')[1]))
            .then(() => setTimeout(() => { window.location = 'http://localhost:8000/'; }, snackbar_redirect_timeout))
            .catch(error => console.log('error', error));
    },
    false
);

update_gig_btn.addEventListener('click',
    () => {
        var formdata = new FormData();
        formdata.append("price", document.getElementById('gig-price').value);
        formdata.append("description", document.getElementById('gig-description').value);
        formdata.append("category", document.getElementById('gig-category').value);
        formdata.append("id_gig", document.getElementById('gig-id_gig').value)
        formdata.append("type", "update");

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/gig", requestOptions)
            .then(response => response.text())
            .then(result => displayresponse(result.split(' | ')[1]))
            .then(() => setTimeout(() => { window.location = 'http://localhost:8000/profile'; }, snackbar_redirect_timeout))
            .catch(error => console.log('error', error));
    },
    false
);