const login = document.getElementById('btn-login');
const home_logo = document.getElementById('span-home');
const back_admin = document.getElementById('btn-back-admin');

login.addEventListener(
    'click',
    () => {
        is_connected = login.innerHTML !== "Login";
        direction = is_connected ? 'http://localhost:8000/profile' : 'http://localhost:8000/login';
        window.location = direction;
    },
    false,
)

home_logo.addEventListener(
    'click',
    () => {
        window.location = 'http://localhost:8000/'
    },
    false,
)

back_admin.addEventListener('click', () => {
    var formdata = new FormData();
    formdata.append("id", document.getElementById("admin-id").value);

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