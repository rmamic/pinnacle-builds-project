<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Login / Sign up Form</title>
        <link rel="shortcut icon" href="/assets/favicon.ico">
        <link rel="stylesheet" href="styles/about.css">
        <script src="scripts/profile.js" defer></script>
    </head>
    <body>
        <?php require_once "./src/header.php"?>
        <main>
            <div class="about">
                <?php
                    echo "<h1>User: " . $_SESSION['username'] . "</h1>";
                ?>
                <div id='date'></div>
            </div>
        </main>
        <?php require_once "./src/footer.html" ?>
    </body>
</html>