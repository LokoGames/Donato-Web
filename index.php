<?php
    parse_ini_file("./pages/api/php.ini");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <title>Donato Construtora - Araçatuba, SP - Brasil</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href=".">
                <img src="images/dnt.png" alt="Logo" draggable="False">
                <h1>Donato Construtora</h1>
            </a>
            <div class="theme">
                <button class="theme-button" onclick="toggleDark();">
                    <i class="icon bi bi-brightness-high-fill"></i>
                </button>
            </div>
        </div>
    </header>
    <main>
        <div class="row">
            <?php 
                include "pages/render.php";
            ?>
        </div>
    </main>
    <footer>
        <h3>Copyright <b>&COPY;</b> Donato Construtora 2021</h3>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>