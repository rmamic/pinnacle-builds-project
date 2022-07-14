<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Pinnacle Builds | Cart</title>
        <link rel="icon" href="./images/icon.png">
        <link rel="stylesheet" href="styles/cart.css">
        <script src="scripts/cart.js" defer></script>
    </head>
    <body>
        <?php require_once "./src/header.php"?>
        <main>

            <nav>
              <ul class="infoTabs">
                <li id ="priceText">Total price: 0 Kn</li>
                <button id="checkout">Checkout</button>
              </ul>
            </nav>

            <ul class="cart hidden"></ul>
            <div class="empty-cart">Your cart is empty. Go choose something and come back!</div>
            
        </main>
        <?php require_once "./src/footer.html" ?>
   </body>
 
</html>