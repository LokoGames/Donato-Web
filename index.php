<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <title>Donato Construtora - Araçatuba, SP</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="./index.php">
                <img src="images/dnt.png" alt="Logo" draggable="False">
                <h1>Donato Construtora</h1>
            </a>
        </div>
    </header>
    <main>
        <div class="row">
            <?php include "pages/render.php" ?>
            <?php include "pages/render.php" ?>

        </div>
        <div class="row">
            <div class="card">

            </div>
        </div>
    </main>
    <footer>
        <h3>Copyright <b>&COPY;</b> Donato Construtora 2021</h3>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>