<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Donato Construtora</title>
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
        <div class="presentation">
            <?php
            $obraPath = "images/obras/";
            $fi = new FilesystemIterator($obraPath, FilesystemIterator::SKIP_DOTS);
            $count = iterator_count($fi);
            for ($i = 0; $i < $count; $i++) {
                $files = glob($obraPath . "$i/images/" . "*");
                $json = json_decode(file_get_contents($obraPath . "$i/info.json"));
                if ($files !== false) {
                    echo "<div class='card'>
                                 <img src='$files[0]'>
                                <h1> " . $json->{'nome'} . "</h1>
                                <p>" . $json->{"end"} ."</p>
                                <p>" . $json->{"preco"} . "</p>
                                <a href='/pages/mais.php?id=$i'>Ver Mais</a>
                            </div>";
                } else {
                    echo "<h1>No images found</h1>";
                }
            }
            ?>
        </div>
        <h2>Sobre Nós</h2>
    </main>
    <footer>
        <div>
            <h3>Copyrigth ₢ Donato Construtora 2021</h3>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>