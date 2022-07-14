<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Pinnacle Builds | Sign up</title>
        <link rel="icon" href="./images/icon.png">
        <link rel="stylesheet" href="styles/regstyle.css">
    </head>
    <body>
        <?php require_once "./src/header.php"?>
        <div class="container">
            <form action="./src/includes/signup.inc.php" method="post" class="form" id="createAccount">
                <h1 class="form__title">Create Account</h1>
                <div class="form__message-form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" id="signupUsername" class="form__input" name="username" autofocus placeholder="Username">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="password" autofocus placeholder="Password">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="passwordrepeat" autofocus placeholder="Confirm Password">
                    <div class="form__input-error-message"></div>
                </div>
                <input class="form__button" type="submit" name="create" value="Sign up">
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "connectionfailed") {
                            echo "<p class='form__message'>Something went wrong, please try again later</p>";
                        }
                        else if ($_GET["error"] == "invalidusername") {
                            echo "<p class='form__message'>Choose proper username</p>";
                        }
                        else if ($_GET["error"] == "passwordtooshort") {
                            echo "<p class='form__message'>Password must be at least 6 characters long</p>";
                        }
                        else if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p class='form__message'>Your passwords don't match</p>";
                        }
                        else if ($_GET["error"] == "usernametaken") {
                            echo "<p class='form__message'>That username is already taken</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed" || $_GET["error"] == "end") {
                            echo "<p class='form__message'>Something went wrong, try again</p>";
                        }
                        else if ($_GET["error"] == "none") {
                            echo "<p class='form__message'>Account successfully created, you may now log in</p>";
                            echo `<p><a href="./">Log in now!</a></p>`;
                        }
                    }
                ?>
                <p class="form__text">
                    <a lass="form__link" href="./login.php" id="linkLogin">Already have an account? Log in.</a>
                </p>
            </form>
        </div>
        <?php require_once "./src/footer.html" ?>
    </body>
</html>