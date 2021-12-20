console.log('JS Profile');

const disconnect_btn = document.getElementById('disconnect-btn');
const update_btn = document.getElementById('update-btn');
const create_gig_btn = document.getElementById('create-gig-btn');
const update_gig_btn = document.getElementsByClassName('update-gig-btn');
const delete_gig_btn = document.getElementsByClassName('delete-gig-btn');

disconnect_btn.addEventListener('click',
    () => {
        var formdata = new FormData();
        formdata.append("type", "disconnect");

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/disconnet", requestOptions)
            .then(response => response.text())
            .then(result => displayresponse(result.split(' | ')[1]))
            .then(() => setTimeout(() => { window.location = 'http://localhost:8000'; }, snackbar_redirect_timeout))
            .catch(error => console.log('error', error));
    },
    false
);

update_btn.addEventListener('click',
    () => {
        var formdata = new FormData();
        formdata.append("name", document.getElementById('profile-name').value);
        formdata.append("password", document.getElementById('profile-password').value);
        formdata.append("wallet", document.getElementById('profile-wallet').value);
        formdata.append("id", document.getElementById('profile-id').value);
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
        formdata.append("category", document.getElementById('gig-create-category').value.toUpperCase());
        formdata.append("id_user", document.getElementById('gig-create-id_user').value);
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

for (let element of update_gig_btn) {

    element.addEventListener('click',
        (event) => {
            let id_gig = event.target.id.split('-')[2];
            var formdata = new FormData();
            formdata.append("price", document.getElementById(`gig-${id_gig}-price`).value);
            formdata.append("description", document.getElementById(`gig-${id_gig}-description`).value);
            formdata.append("category", document.getElementById(`gig-${id_gig}-category`).value);
            formdata.append("id_gig", id_gig);
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
};

for (let element of delete_gig_btn) {

    element.addEventListener('click',
        (event) => {
            let id_gig = event.target.id.split('-')[2];
            var formdata = new FormData();
            formdata.append("id_gig", id_gig);
            formdata.append("type", "delete");

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
};