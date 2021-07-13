<?php
if (isset($_GET["id"])) {
    if ($_GET["id"] != "") {
        $id = $_GET["id"];
    } else {
        die("Id not found");
    }
} else {
    die("parameter id not specified!");
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            echo json_decode(file_get_contents("../images/obras/$id/info.json"))->{"nome"};

    ?></title>
    <link rel="stylesheet" href="../css/mais.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../images/dnt.png" alt="Logo" draggable="False">
                <h1>Donato Construtora</h1>
            </a>
        </div>
    </header>
    <main>
        <div class="image">
            <img id="displayIgm" draggable="false">
            <div class="icons">
                <?php
                    $rootPath = "../images/obras/$id/";
                    $imagePath = $rootPath . "images/";
                    $json = json_decode(file_get_contents($rootPath . "info.json"));
                    $fi = new FilesystemIterator($imagePath, FilesystemIterator::SKIP_DOTS);
                    $count = iterator_count($fi);
                    for ($i=0; $i < $count; $i++) {
                        $files = glob($imagePath . "*");
                        echo "<img src='$files[$i]' draggable='false' onclick='document.getElementById(`displayIgm`).src = this.src;'>";
                    }
                ?>
            </div>
        </div>
        <div class="info">
            <?php
            $rootPath = "../images/obras/$id/";
            $json = json_decode(file_get_contents($rootPath . "info.json"));
            echo "<div class='top'>
                <h1 id='nome'>" . $json->{"nome"} . "</h1>
                <p id='preco'> " . $json->{"preco"} . "</p>
            </div>
            <h2 id='end'>" . $json->{"end"} . "</h2>
            <h3 id='desc'>" . $json->{"desc"} . "</h3>";
            ?>
        </div>
    </main>
    <script src="../js/mais.js"></script>
</body>

</html>