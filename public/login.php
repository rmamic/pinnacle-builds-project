<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Pinnacle Builds | Login</title>
        <link rel="icon" href="./images/icon.png">
        <link rel="stylesheet" href="styles/regstyle.css">
    </head>
    <body>
        <?php require_once "./src/header.php"?>
        <div class="container">
            <form action="./src/includes/login.inc.php" method="post" class="form" id="login">
                <h1 class="form__title">Login</h1>
                <div class="form__message-form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" class="form__input" name="username" autofocus placeholder="Username" required>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="password" autofocus placeholder="Password" required>
                    <div class="form__input-error-message"></div>
                </div>
                <input class="form__button" type="submit" name="submit" value="Login">
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "connectionfailed") {
                            echo "<p class='form__message'>Something went wrong, please try again later</p>";
                        }
                        else if ($_GET["error"] == "wrongsignin") {
                            echo "<p class='form__message'>Incorrect username/password</p>";
                        }
                    }
                ?>
                <p class="form__text">
                    <a lass="form__link" href="./signup.php" id="linkCreateAccount"> Don't have an account? Create one!</a>
                </p>
            </form>
        </div>
        <?php require_once "./src/footer.html" ?>
    </body>
</html>