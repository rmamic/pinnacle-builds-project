const compClassDict = {
    2 : "CPU",
    3 : "CPU Cooler",
    4 : "RAM",
    5 : "Motherboard",
    6 : "PSU",
    7 : "SSD",
    8 : "HDD",
    9 : "GPU",
    10 : "Case"
}

function init() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                let prebuiltArray = JSON.parse(this.responseText);
                console.log(prebuiltArray);
                renderPrebuilt(prebuiltArray);
            }
        }
    }
    xmlhttp.open("GET", `./src/prebuiltRequestHandler.php?action=load`, true);
    xmlhttp.send();
}

function renderPrebuilt(prebuiltArray) {
    for (let key in prebuiltArray) {
        let prebuilt = prebuiltArray[key];
        let componentList = document.createElement('ul');
        componentList.id = "componentList";
        let compName = prebuilt[0];
        let compPrice = prebuilt[1];
        for (let i = 2; i < prebuilt.length; i++) {
            componentList.innerHTML += `<li class="compElem">
                                            <h2>${compClassDict[i]}</h2>
                                            <p>${prebuilt[i]}</p>
                                        </li>`;
        }

        let prebuiltEl = document.createElement('li');
        prebuiltEl.classList.add("article-card");
        prebuiltEl.innerHTML = `  <div class="box-nav">
                                    <h1>${compName}</h1>
                                    
                                </div>
                                <img class="cart-img" src="./images/dbpic/pc_case/${prebuilt[10]}.jpg" height="200px" width="200px">
                                ${componentList.innerHTML}
                                <div class="comp-price">Price: ${compPrice} Kn</div>
                                <div class="botun-pozicija">
                                    <button class="botun"  type="submit" name="submit">BUY</button>
                                </div>
                              `;

        document.getElementById("article-container").appendChild(prebuiltEl);
    }
    let buy_buttons = document.getElementsByClassName("botun");
    for (let i = 0; i < buy_buttons.length; i++) {
        buy_buttons[i].addEventListener("click", addToCart);
    }
}

function addToCart(e) {
    let button = e.target;
    let card = button.parentElement.parentElement;
    console.log(card);

    let confName = card.querySelector("h1").textContent;
    let uid = getCookie("user_id");

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                console.log("yay");
            }
        }
    }

    xmlhttp.open("GET", `./src/cartHandler.php?action=add&name=${encodeURIComponent(confName)}&user_id=${uid}`, true);
    xmlhttp.send();
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