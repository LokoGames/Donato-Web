<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dynamic/index.css">
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
        </div>
    </header>
    <main>
        <div class="sobre">
            
        </div>
        <h1>Conheça nossos trabalhos!</h1>
        <div class="obras">
            <?php
            include "pages/render.php";
            ?>
        </div>
    </main>
    <script src="js/main.js"></script>
</body>

</html>