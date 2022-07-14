const dictSName = {
    "quantity" : "In stock:",
    "unit_price" : "Price:",
    "socket" : "Socket:",
    "cores" : "Cores:",
    "threads" : "Threads:",
    "clock_speed" : "CPU clock speed:",
    "boost_clock_speed" : "CPU boost clock speed:",
    "stock_included" : "CPU fan included?",
    "tdp" : "TDP:",
    "form" : "Form factor:",
    "chipset" : "Chipset:",
    "safe_cpu_tdp" : "Recommended safe tdp of cpu:",
    "ddr" : "Memory type:",
    "memory_size" : "Memory capacity:",
    "frequency" : "Memory frequency:",
    "length" : "Length:",
    "boost_clock" : "GPU boost clock speed:",
    "memory_capacity" : "Memory capacity:",
    "memory_type" : "Memory type:",
    "format" : "Drive format:",
    "interface" : "SSD interface:",
    "seq_write_speed" : "Sequiential write speed:",
    "seq_read_speed" : "Sequiential read speed:",
    "capacity" : "Storage space:",
    "rotation_speed" : "HDD rotation speed:",
    "power" : "Power delivery:",
    "isfullymodular" : "Fully modular?",
    "fan" : "PSU fan size:",
    "certificate" : "PSU efficency rating:",
    "height" : "Height:",
    "width" : "Width:",
    "weight" : "Weight:",
    "gpu_length" : "Maximum GPU length:",
    "cooler_height" : "Maximum CPU cooler heigth:"
}

const dictSInfo = {
    "quantity" : "",
    "unit_price" : " Kn",
    "socket" : "",
    "cores" : "",
    "threads" : "",
    "clock_speed" : "GHz",
    "boost_clock_speed" : "GHz",
    "stock_included" : "",
    "tdp" : "W",
    "form" : "",
    "chipset" : "",
    "safe_cpu_tdp" : "W",
    "ddr" : "",
    "memory_size" : "GB",
    "frequency" : "MHz",
    "length" : "mm",
    "boost_clock" : "MHz",
    "memory_capacity" : "GB",
    "memory_type" : "",
    "format" : "",
    "interface" : "",
    "seq_write_speed" : "Mbps",
    "seq_read_speed" : "Mbps",
    "capacity" : "GB",
    "rotation_speed" : "RPM",
    "power" : "W",
    "isfullymodular" : "",
    "fan" : "mm",
    "certificate" : "",
    "height" : "mm",
    "width" : "mm",
    "weight" : "kg",
    "gpu_length" : "mm",
    "cooler_height" : "mm"
}

const picked = {
    "cpu":"",
    "motherboard":"",
    "ram":"",
    "cpu_fan":"",
    "gpu":"",
    "ssd":"",
    "hdd":"",
    "psu":"",
    "pc_case":""
}

let selectComps = new Array();

window.addEventListener('resize',widthCheck);
document.getElementById("cpu-button").addEventListener("click", fetchCPU);
document.getElementById("mobo-button").addEventListener("click", fetchMOBO);
document.getElementById("ram-button").addEventListener("click", fetchRAM);
document.getElementById("cool-button").addEventListener("click", fetchCool);
document.getElementById("gpu-button").addEventListener("click", fetchGPU);
document.getElementById("ssd-button").addEventListener("click", fetchSSD);
document.getElementById("hdd-button").addEventListener("click", fetchHDD);
document.getElementById("psu-button").addEventListener("click", fetchPSU);
document.getElementById("case-button").addEventListener("click", fetchCase);
document.getElementById("addtocart").addEventListener("click", addToCart);

document.getElementById("cpu-button-mobile").addEventListener("click", fetchCPU);
document.getElementById("mobo-button-mobile").addEventListener("click", fetchMOBO);
document.getElementById("ram-button-mobile").addEventListener("click", fetchRAM);
document.getElementById("cool-button-mobile").addEventListener("click", fetchCool);
document.getElementById("gpu-button-mobile").addEventListener("click", fetchGPU);
document.getElementById("ssd-button-mobile").addEventListener("click", fetchSSD);
document.getElementById("hdd-button-mobile").addEventListener("click", fetchHDD);
document.getElementById("psu-button-mobile").addEventListener("click", fetchPSU);
document.getElementById("case-button-mobile").addEventListener("click", fetchCase);

let tdp = document.getElementById("TDPText");
let price = document.getElementById("priceText");
let infoTemplate = document.getElementById('modal');

function widthCheck(){
    let pickerContent=document.getElementById("pickerName");
    let mobilePicker=document.getElementById("compContainerMobile");

    if(document.documentElement.clientWidth<769){
        pickerContent.style.display="none";
        mobilePicker.style.display="flex";
    }
    else{
        pickerContent.style.display="block";
        mobilePicker.style.display="none";
    }

}

function fetchCPU() {
    fetchComponents("cpu");
    replacePickName("Choose CPU:");
}

function fetchMOBO() {
    fetchComponents("motherboard");
    replacePickName("Choose motherboard:");
}

function fetchRAM() {
    fetchComponents("ram");
    replacePickName("Choose RAM:");
}

function fetchCool() {
    fetchComponents("cpu_fan");
    replacePickName("Choose CPU cooler:");
}

function fetchGPU() {
    fetchComponents("gpu");
    replacePickName("Choose GPU:");
}

function fetchSSD() {
    fetchComponents("ssd");
    replacePickName("Choose SSD:");
}

function fetchHDD() {
    fetchComponents("hdd");
    replacePickName("Choose HDD:");
}

function fetchPSU() {
    fetchComponents("psu");
    replacePickName("Choose PSU:");
}

function fetchCase() {
    fetchComponents("pc_case");
    replacePickName("Choose PC Case:");
}

fetchCPU();

//ask backend if you want to edit this function
function fetchComponents(component) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try {
                list = JSON.parse(this.responseText);
            }
            catch(err) {
                cpu_list.innerHTML += err;
                list = "";
            }
            finally {
                componentCallBack(list, component);
            }
        }
    }

    xmlhttp.open("GET", "./src/componentRequestHandler.php?component=" + component, true);
    xmlhttp.send();
}

function clearComponents() {
    document.getElementById('list').innerHTML = '';
}

function componentCallBack(list, component) {
    clearComponents();
    renderComponents(list, component);
}

function renderComponents(component_array, component) {
    for (let key in component_array) {

        item = component_array[key];
        var child = document.createElement('li');
        child.setAttribute('class', 'component');
        child.innerHTML = document.getElementById('template').innerHTML;

        child.innerHTML = child.innerHTML.replace(/{IMG_SRC}/g, `./images/dbpic/${component}/${item["model"]}.jpg`);
        child.innerHTML = child.innerHTML.replace(/{COMP_NAME}/g, item["model"]);

        let infoButton = child.getElementsByClassName("infoButt")[0];
        infoButton.addEventListener("click", fetchInfo);
        let pickButton = child.getElementsByClassName("pickButt")[0]
        pickButton.addEventListener("click", addComponent);

        infoButton.setAttribute('class', `infoButt`);
        pickButton.setAttribute('class', `pickButt ${component}`);

        if (component == "cpu") {
            for (let i = 0; i < selectComps.length; i++) {
                if (selectComps[i][0] == "motherboard") {
                    if (item["socket"] != selectComps[i][1]) {
                        child.classList.add("no");
                    }
                    break;
                }
                else if (selectComps[i][0] == "ram") {
                    if ((item["socket"] == "LGA 1700" && selectComps[i][1] == "DDR4") || (item["socket"] != "LGA 1700" && selectComps[i][1] == "DDR5")) {
                        child.classList.add("no");
                    }
                    break;
                }
            }
        }
        else if (component == "motherboard") {
            for (let i = 0; i < selectComps.length; i++) {
                if (selectComps[i][0] == "cpu") {
                    if (item["socket"] != selectComps[i][1]) {
                        child.classList.add("no");
                    }
                    break;
                }
                else if (selectComps[i][0] == "ram") {
                    if ((item["socket"] == "LGA 1700" && selectComps[i][1] == "DDR4") || (item["socket"] != "LGA 1700" && selectComps[i][1] == "DDR5")) {
                        child.classList.add("no");
                    }
                    break;
                }
            }
        }
        else if (component == "ram") {
            for (let i = 0; i < selectComps.length; i++) {
                if (selectComps[i][0] == "motherboard" || selectComps[i][0] == "cpu") {
                    if ((selectComps[i][1] == "LGA 1700" && item["ddr"] == "DDR4") || (selectComps[i][1] != "LGA 1700" && item["ddr"] == "DDR5")) {
                        child.classList.add("no");
                    }
                    break;
                }
            }
        }
        else if (component == "gpu") {
            for (let i = 0; i < selectComps.length; i++) {
                if (selectComps[i][0] == "pc_case") {
                    if (item["length"] >= selectComps[i][1][0]) {
                        child.classList.add("no");
                    }
                    break;
                }
            }
        }
        else if (component == "cpu_fan") {
            for (let i = 0; i < selectComps.length; i++) {
                if (selectComps[i][0] == "pc_case") {
                    if (item["length"] >= selectComps[i][1][1]) {
                        child.classList.add("no");
                    }
                    break;
                }
            }
        }
        else if (component == "pc_case") {
            for (let i = 0; i < selectComps.length; i++) {
                if (selectComps[i][0] == "gpu") {
                    if (item["gpu_length"] <= selectComps[i][1]) {
                        child.classList.add("no");
                    }
                }
                else if (selectComps[i][0] == "cpu_fan") {
                    if (item["cooler_height"] <= selectComps[i][1]) {
                        child.classList.add("no");
                    }
                }
            }
        }
        
        if(picked[component]==item["model"])
        {
            pickButton.parentElement.parentElement.style.border = "solid 1px rgb(155, 17, 17)";
            pickButton.textContent = "ADDED";
            pickButton.style.pointerEvents = "none";
        }

        if(pickButton.parentElement.parentElement.className == "component no"){
            pickButton.style.pointerEvents = "none";
        }


        document.getElementById('list').appendChild(child);
    }
 }

function replacePickName(parameter) {
    document.getElementById('pickerName').textContent = parameter;
    let mobileButtons=document.getElementsByClassName("pickCompClass mobile");
    
    for(let el of mobileButtons){
        el.style.display="none";
    }

    document.getElementById(`cpu-button-mobile`).style.display="flex";
}

function addComponent(e) {

    let pickButtons = document.getElementsByClassName("pickButt");

    for(let i = 0; i < pickButtons.length; i++){
        pickButtons[i].textContent = "ADD";
        pickButtons[i].parentElement.parentElement.style.border = "none";
        console.log(pickButtons[i].parentElement.parentElement.className);
        if(pickButtons[i].parentElement.parentElement.className == "component no"){
            pickButtons[i].style.pointerEvents = "none";
        }
        else{
            pickButtons[i].style.pointerEvents = "auto";
        }
            
    }

    let button = e.target;
    let item = button.parentElement.parentElement.getElementsByClassName('iconName')[0];
    let model = item.querySelector("h1").textContent;
    let compType = button.classList[1];
    
    picked[compType]=model;

    button.parentElement.parentElement.style.border = "solid 1px rgb(155, 17, 17)";
    button.textContent = "ADDED";
    button.style.pointerEvents = "none";

    let componentButton = document.getElementById(`comp-${compType}`);

    let componentButtonMobile = document.getElementById(`comp-${compType}-mobile`);

    componentButton.querySelector("h2").textContent = model;
    componentButton.querySelector("img").src = item.querySelector("img").src;

    componentButtonMobile.querySelector("h2").textContent = model;
    componentButtonMobile.querySelector("img").src = item.querySelector("img").src;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                if (compType == "pc_case") {
                    list = JSON.parse(this.responseText);
                }
                else {
                    list = this.responseText;
                }
                for (let i = 0; i < selectComps.length; i++) {
                    if (selectComps[i][0] == compType) {
                        selectComps.splice(i, 1);
                        break;
                    }
                }
                selectComps.push([compType, list]);
                console.log(selectComps);
            }
        }
    }
    xmlhttp.open("GET", `./src/infoRequestHandler.php?action=add&model=${encodeURIComponent(model)}
                            &component=${encodeURIComponent(compType)}`, true);
    xmlhttp.send();

    calculatePrice();
    calculatePower();
}

function fetchInfo(e) {
    let fetchButton = e.target;
    let item = fetchButton.parentElement.parentElement;

    let model = item.querySelector("h1").textContent;
    let component = item.getElementsByClassName("pickButt")[0].classList[1];

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                list = JSON.parse(this.responseText);
                infoCallback(list, component);
            }
        }
    }
    xmlhttp.open("GET", `./src/infoRequestHandler.php?action=info&model=${encodeURIComponent(model)}
                            &component=${encodeURIComponent(component)}`, true);
    xmlhttp.send();
}

function infoCallback(list, component) {
    clearInfo();
    renderInfo(list, component);
}

function renderInfo(list, component) {
    infoTemplate.style.display = "block";

    infoTemplate.querySelector("img").src = `./images/dbpic/${component}/${list["model"].trim()}.jpg`;
    infoTemplate.querySelector("h1").innerHTML = list["model"].trim();

    for (key in list) {
        if (key != "model" && key != "id") {
            let attribute = list[key];

            let specChild = document.createElement('li');
            specChild.setAttribute('class', 'specElem');
            specChild.innerHTML = document.getElementById('specTemplate').innerHTML;
            
            specChild.innerHTML = specChild.innerHTML.replace(/{SPEC_NAME}/g, dictSName[key]);
            specChild.innerHTML = specChild.innerHTML.replace(/{SPEC_INFO}/g, attribute+dictSInfo[key]);

            document.getElementById('specList').appendChild(specChild);
        }
    }
}

function clearInfo() {
    document.getElementById('specList').innerHTML = "";
}

document.getElementsByClassName("infoClose")[0].addEventListener("click", function() {
    infoTemplate.style.display = "none";
});

function calculatePrice() {
    
    let pick_comps = document.getElementsByClassName("desktopClass");
    let price_txt = document.getElementById("priceText");
    let totalPrice = 0;

    for (let i = 0; i < pick_comps.length; i++) {
        let pick_comp = pick_comps[i];
        let model = pick_comp.querySelector("h2").textContent;
        if (model != "None") {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        let price = parseInt(this.responseText);
                        totalPrice += price;

                        price_txt.textContent = `Total price: ${totalPrice},00 Kn`;
                    }
                }
            }
            xmlhttp.open("GET", `./src/priceRequestHandler.php?model=${encodeURIComponent(model)}`, true);
            xmlhttp.send();
        }
    }
}

function priceRequest(model) {
    
}

function calculatePower() {
    let pick_comps = document.getElementsByClassName("desktopClass");
    let tdp_txt = document.getElementById("TDPText");
    let totalTDP = 0;

    for (let i = 0; i < pick_comps.length; i++) {
        let pick_comp = pick_comps[i];
        let model = pick_comp.querySelector("h2").textContent;
        let component = pick_comp.parentElement.id.replace("comp-", "");
        if (model != "None") {
            if (component == "gpu" || component == "cpu" || component == "psu") {
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText) {
                            let power = parseInt(this.responseText);
                            if (component == "psu") {
                                let psu_text = document.getElementById("PSUText");
                                psu_text.textContent = `${power}W MAX`;
                            }
                            else {
                                totalTDP += power;
                                tdp_txt.textContent = `${totalTDP}W`;
                            }
                        }
                    }
                }
                xmlhttp.open("GET", `./src/powerRequestHandler.php?model=${encodeURIComponent(model)}
                                        &component=${encodeURIComponent(component)}`, true);
                xmlhttp.send();
            }
            else {
                totalTDP += 5;
    
                tdp_txt.textContent = `${totalTDP}W`;
            }
        }
    }
}

function addToCart() {
    let pick_comps = document.getElementsByClassName("desktopClass");
    let price = document.getElementById("priceText").textContent.replace("Total price: ", "").replace(",00 Kn", "");
    let componentModels = "";

    for (let i = 0; i < pick_comps.length; i++) {
        let pick_comp = pick_comps[i];
        let model = pick_comp.querySelector("h2").textContent;

        if (model == "None") {
            break;
        }

        componentModels += `&comp_${i}=${encodeURIComponent(model)}`;
    }

    let uid = getCookie("user_id");

    if (!uid) {
        uid = 1002; //guest ID
    }

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                let status = this.responseText;
                console.log(status);
            }
        }
    }
    xmlhttp.open("GET", `./src/cartHandler.php?action=save&user_id=${encodeURIComponent(uid)}
                        &price=${encodeURIComponent(price)}&${componentModels}`, true);
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

fetchCPU();
widthCheck();