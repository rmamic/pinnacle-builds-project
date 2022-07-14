<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinnacle builds | Custom PC</title>
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="styles/builder.css"/>
  <script src="scripts/builder.js" defer></script>
</head>
<body>
  <?php require_once "./src/header.php"?>
  <main>
    <nav>
      <ul class="infoTabs">
        <li id ="priceText">Total price: 0,00 kn</li>
        <li id="TDPText">0W</li>
        <li id="PSUText">0W MAX</li>
        <button id="addtocart">Add to your cart</button>
      </ul>
    </nav>
    <div class=builderBox>
      <ul class=compContainer>

        <li id="comp-cpu">
          <button type="button" class="pickCompClass desktopClass" id="cpu-button">
            <img src="images/componentCPU.png" height="64" width="64">
            <div class=componentText>
              <h1>CPU</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-motherboard">
          <button type="button" class="pickCompClass desktopClass" id="mobo-button">
            <img src="images/componentMOBO.png" height="64" width="64">
            <div class=componentText>
              <h1>Motherboard</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-ram">
          <button type="button" class="pickCompClass desktopClass" id="ram-button">
            <img src="images/componentRAM.png" height="64" width="64">
            <div class=componentText>
              <h1>RAM</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-cpu_fan">
          <button type="button" class="pickCompClass desktopClass" id="cool-button">
            <img src="images/componentCOOL.png" height="64" width="64">
            <div class=componentText>
              <h1>CPU Cooler</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-gpu">
          <button type="button" class="pickCompClass desktopClass" id="gpu-button">
            <img src="images/componentGPU.png" height="64" width="64">
            <div class=componentText>
              <h1>GPU</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-ssd">
          <button type="button" class="pickCompClass desktopClass" id="ssd-button">
            <img src="images/componentSSD.png" height="64" width="64">
            <div class=componentText>
              <h1>SSD</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-hdd">
          <button type="button" class="pickCompClass desktopClass" id="hdd-button">
            <img src="images/componentHDD.png" height="64" width="64">
            <div class=componentText>
              <h1>HDD</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-psu">
          <button type="button" class="pickCompClass desktopClass" id="psu-button">
            <img src="images/componentPSU.png" height="64" width="64">
            <div class=componentText>
              <h1>PSU</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li id="comp-pc_case">
          <button type="button" class="pickCompClass desktopClass" id="case-button">
            <img src="images/componentCASE.png" height="64" width="64">
            <div class=componentText>
              <h1>Case</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

      </ul>
      <div class="listBox">
        <div id="picker">
          <h1 id="pickerName">{CHOOSE_COMP}</h1>
          <ul id=compContainerMobile>

              <li id="comp-cpu-mobile">
                <button type="button" class="pickCompClass mobile" id="cpu-button-mobile">
                  <img src="images/componentCPU.png" height="64" width="64">
                  <div class=componentText>
                    <h1>CPU</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-motherboard-mobile">
                <button type="button" class="pickCompClass mobile" id="mobo-button-mobile" >
                  <img src="images/componentMOBO.png" height="64" width="64">
                  <div class=componentText>
                    <h1>Motherboard</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-ram-mobile">
                <button type="button" class="pickCompClass mobile" id="ram-button-mobile">
                  <img src="images/componentRAM.png" height="64" width="64">
                  <div class=componentText>
                    <h1>RAM</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-cpu_fan-mobile">
                <button type="button" class="pickCompClass mobile" id="cool-button-mobile">
                  <img src="images/componentCOOL.png" height="64" width="64">
                  <div class=componentText>
                    <h1>CPU Cooler</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-gpu-mobile">
                <button type="button" class="pickCompClass mobile" id="gpu-button-mobile">
                  <img src="images/componentGPU.png" height="64" width="64">
                  <div class=componentText>
                    <h1>GPU</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-ssd-mobile">
                <button type="button" class="pickCompClass mobile" id="ssd-button-mobile">
                  <img src="images/componentSSD.png" height="64" width="64">
                  <div class=componentText>
                    <h1>SSD</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-hdd-mobile">
                <button type="button" class="pickCompClass mobile" id="hdd-button-mobile">
                  <img src="images/componentHDD.png" height="64" width="64">
                  <div class=componentText>
                    <h1>HDD</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-psu-mobile">
                <button type="button" class="pickCompClass mobile" id="psu-button-mobile">
                  <img src="images/componentPSU.png" height="64" width="64">
                  <div class=componentText>
                    <h1>PSU</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>

              <li id="comp-pc_case-mobile">
                <button type="button" class="pickCompClass mobile" id="case-button-mobile">
                  <img src="images/componentCASE.png" height="64" width="64">
                  <div class=componentText>
                    <h1>Case</h1>
                    <h2>None</h2>
                  </div>
                </button>
              </li>
          </ul>
          
        </div>
        <ul id="list"></ul>
      </div>
    </div>
  </main>

  <div id="modal" class="infoTemplate">
    <div id="popup">
      <div id="pop-nav">
        <h1>Intel Core i9-12900K</h1>
        <span class="infoClose">&times;</span>
      </div>
      <img id="pop-img" height="200px" width="200px">
      <ul id="specList"></ul>
    </div>
  </div>

  <?php require_once "./src/footer.html" ?>
</body>

<div id="template" hidden>
  <div class="iconName">
      <img src="{IMG_SRC}" height="64" width="64">
      <h1>{COMP_NAME}</h1>
  </div>
  <div class="infoPick">
      <button id="infoButton" class="infoButt">ABOUT</button>
      <button class="pickButt">ADD</button>
  </div>
</div>

<div id="specTemplate" hidden>
  <h2>{SPEC_NAME}</h2>
  <p>{SPEC_INFO}</p>
</div>

</html>                                     