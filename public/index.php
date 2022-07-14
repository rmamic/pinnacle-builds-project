<!DOCTYPE html>
<html>

    <head>
        <meta charset="uft-8">
        <title>Pinnacle Builds</title>
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="icon" href="images/icon.png">
    </head>
    <body>  
      <?php require_once "./src/header.php"?>
      <main>
          <div class="slidershow middle">

              <div class="slides">

                <div id="startBuild">
                  <h1>Custom PCs</h1>
                  <h1>Made Easy</h1>
                  <a href="builder.php"><button id="goBuilder">Start your build!</button></a>
                </div>

                <input type="radio" name="r" id="r1" checked>
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <input type="radio" name="r" id="r4">
                <input type="radio" name="r" id="r5">

                <div class="slide s1">
                  <img src="images/customPCExotic.png" alt="1"/>
                </div>

                <div class="slide">
                  <img src="images/customPCWhite.png" alt="2"/>
                </div>

                <div class="slide">
                  <img src="images/PCSetup.png" alt="3"/>
                </div>

                <div class="slide">
                  <img src="images/customPCFractal.png" alt="4"/>
                </div>

                <div class="slide">
                  <img src="images/customPCAir.png" alt="5"/>
                </div>

                  <div class="navigation-auto">
                  <div class="auto-btn1"></div>
                  <div class="auto-btn2"></div>
                  <div class="auto-btn3"></div>
                  <div class="auto-btn4"></div>
                  <div class="auto-btn5"></div>
                  </div>
              </div>

              <div class="navigation">
                <label for="r1" class="bar"></label>
                <label for="r2" class="bar"></label>
                <label for="r3" class="bar"></label>
                <label for="r4" class="bar"></label>
                <label for="r5" class="bar"></label>
              </div>

            </div>
            <div id="article-container">
            <article class="article-card">
              <div class="article-image-pre">
                <div class="article-content">
                  <h3 class="title">Prebuilts</h3>
                  <p class="paragraph">
                      No clue where to start on a build? Fear not! We've got you covered. 
                  </p>
                  <p class="paragraph">
                      Choose from an array of already finished configurations, ready for whatever you need!
                      No matter your needs, there is bound to be something that suits you.
                  </p>
                </div>
              </div>
            </article>

            <article class="article-card">
              <div class="article-image-cus">
                  <div class="article-content">
                        <h3 class="title">The Builder</h3>
                        <p class="paragraph">
                          The Builder is your go-to if you want the freedom of putting together your own components,
                          but would still rather leave the actual building part to someone else.
                        </p>
                        <p class="paragraph">
                          Our team of experienced engineers will gather the components of your choosing and build the PC you've
                          always dreamed of.
                        </p>
                  </div>
              </div>
            </article>
            </div>
      </main>
      <?php require_once "./src/footer.html" ?>
      <script src="scripts/index.js"></script>
    </body>
</html>