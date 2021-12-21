console.log("JS Home");
const purchase_btn = document.getElementsByClassName('purchase-btn');

for (let element of purchase_btn) {

    element.addEventListener('click',
        (event) => {
            let id_gig = event.target.id.split('-')[1];
            var formdata = new FormData();
            formdata.append("id_user", document.getElementById(`gig-${id_gig}-id_user`).value);
            formdata.append("id_gig", id_gig);
            formdata.append("type", "create");

            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("http://localhost:8000/buy", requestOptions)
                .then(response => response.text())
                .then(result => displayresponse(result.split(' | ')[1]))
                // .then(() => setTimeout(() => { window.location = 'http://localhost:8000/profile'; }, snackbar_redirect_timeout))
                .catch(error => console.log('error', error));
        },
        false
    );
};