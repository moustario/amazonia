displayresponse = (response, timeout = 1000) => {
    var snack = document.getElementById("snackbar");
    snack.innerHTML = response;
    snack.className = "show";

    setTimeout(() => { snack.className = snack.className.replace("show", ""); }, timeout);
}

const snackbar_redirect_timeout = 1200;