function init() {
    let uid = getCookie("user_id");
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                renderDate(this.responseText);
            }
        }
    }

    xmlhttp.open("GET", `./src/profileHandler.php?action=load&user_id=${encodeURIComponent(uid)}`, true);
    xmlhttp.send();
}

function renderDate(date) {
    document.getElementById("date").textContent = "Date of creation: " + date;
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return false;
}

init();