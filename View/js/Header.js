const login = document.getElementById('btn-login')
const home_logo = document.getElementById('span-home')

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