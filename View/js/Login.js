console.log('JS Login');
const register = document.getElementById('register-link');
const login_btn = document.getElementById('login-btn');

register.addEventListener(
    'click',
    () => {
        window.location = 'http://localhost:8000/register'
    },
    false,
)

login_btn.addEventListener('click', () => {
    var formdata = new FormData();
    formdata.append("name", document.getElementById('login-name').value);
    formdata.append("password", document.getElementById('login-password').value);

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    fetch("http://localhost:8000/login", requestOptions)
        .then(response => response.text())
        .then(result => displayresponse(result.split(' | ')[1]))
        .then(() => setTimeout(() => { window.location = 'http://localhost:8000/'; }, snackbar_redirect_timeout))
        .catch(error => console.log('error', error));
}, false)