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
    let uid = getCookie("user_id");
    if (uid) {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText) {
                    let cartArray = JSON.parse(this.responseText);
                    console.log(cartArray);
                    if (cartArray) {
                        document.getElementsByClassName("cart")[0].classList.remove("hidden");
                        document.getElementsByClassName("empty-cart")[0].classList.add("hidden");
                        renderCart(cartArray);
                    }
                }
            }
        }
        xmlhttp.open("GET", `./src/cartHandler.php?action=load&user_id=${encodeURIComponent(uid)}`, true);
        xmlhttp.send();
    }
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

function renderCart(cartArray) {
    for (let key in cartArray) {
        let cartObj = cartArray[key];
        let componentList = document.createElement('ul');
        componentList.id = "componentList";
        let compPrice = cartObj[1];

        let h1string = `Build ID: ${key}`;
        if (cartObj[0] != "") {
            h1string = cartObj[0];
        }

        for (let i = 2; i < cartObj.length; i++) {
            componentList.innerHTML += `<li class="compElem">
                                            <h2>${compClassDict[i]}</h2>
                                            <p>${cartObj[i]}</p>
                                        </li>`;
        }

        let cartElem = document.createElement('li');
        cartElem.classList.add("cartTemplate");
        cartElem.innerHTML = `  <div class="box-nav">
                                    <h1>${h1string}</h1>
                                    <span class="itemRemove">&times;</span>
                                </div>
                                <img class="cart-img" src="./images/dbpic/pc_case/${cartObj[10]}.jpg" height="200px" width="200px">
                                ${componentList.innerHTML}
                                <div class="comp-price">Price: ${compPrice} Kn</div>
                              `;

        cartElem.getElementsByClassName("itemRemove")[0].addEventListener("click", removeFromCart);
        document.getElementsByClassName("cart")[0].appendChild(cartElem);
    }

    renderPrice();
}

function renderPrice() {
    let price = 0;
    let total_price = document.getElementById("priceText");
    let cartElems = document.getElementsByClassName("cartTemplate");

    for (let i = 0; i < cartElems.length; i++) {
        let conf = cartElems[i];
        let currentPrice = parseInt(conf.getElementsByClassName("comp-price")[0].textContent.replace("Price: ", "").replace(" Kn", ""));

        price += currentPrice;
    }

    total_price.textContent = "Total price: " + price + " Kn";
}

function removeFromCart(e) {
    let card = e.target.parentElement.parentElement;
    let name = card.querySelector("h1").textContent;
    let uid = getCookie("user_id");
    let flag = 0;

    if (name.includes("Build")) {
        name = name.slice(10);
        flag = 1;
    }

    console.log(name);

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                document.getElementsByClassName("cart")[0].removeChild(card);
                renderPrice();
                
                window.confirm(`${card.querySelector("h1").textContent} has been removed from your cart.`);
                if (!document.getElementsByClassName("cart")[0].children.length) {
                    document.getElementsByClassName("cart")[0].classList.add("hidden");
                    document.getElementsByClassName("empty-cart")[0].classList.remove("hidden");
                }
            }
        }
    }

    xmlhttp.open("GET", `./src/cartHandler.php?action=delete&user_id=${encodeURIComponent(uid)}&conf=${name}&flag=${flag}`, true);
    xmlhttp.send();
}

init();