console.log('JS Register');
const register_user = document.getElementById('register-btn');


register_user.addEventListener(
    'click',
    () => {
        var formdata = new FormData();
        formdata.append("name", document.getElementById('register-name').value);
        formdata.append("password", document.getElementById('register-password').value);
        formdata.append("wallet", document.getElementById('register-wallet').value);
        formdata.append("type", "create");

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/register", requestOptions)
            .then(response => response.text())
            .then(result => displayresponse(result.split(' | ')[1]))
            .then(() => setTimeout(() => { window.location = 'http://localhost:8000/login'; }, snackbar_redirect_timeout))
            .catch(error => console.log('error', error));
    },
    false,
)