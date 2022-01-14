<?php
if (isset($_GET["id"])) {
    if ($_GET["id"] != "" && checkId($_GET["id"]) == true) {
        $id = $_GET["id"];
    } else {
        die("Id not found");
    }
} else {
    die("parameter id not specified!");
}
function checkId(int $id = 0)
{
    $rootPath = "../obras/";
    $fi = new FilesystemIterator($rootPath, FilesystemIterator::SKIP_DOTS);
    $count = iterator_count($fi);
    return ($id < $count);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo json_decode(file_get_contents("../obras/$id/info.json"))->{"nome"}; ?></title>
    <link rel="stylesheet" href="../css/mais.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../images/dnt.png" alt="Logo" draggable="False">
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
        <div class="image">
            <img id="displayImg" draggable="false">
            <div class="icons">
                <?php
                $rootPath = "../obras/$id/";
                $imagePath = $rootPath . "images/";
                $json = json_decode(file_get_contents($rootPath . "info.json"));
                $fi = new FilesystemIterator($imagePath, FilesystemIterator::SKIP_DOTS);
                $count = iterator_count($fi);
                for ($i = 0; $i < $count; $i++) {
                    $files = glob($imagePath . "*");
                    echo "<img src='$files[$i]' draggable='false' onclick='setImage(this, $i);' class='images'>";
                }
                ?>
                <button onclick="changeImg()">></button>
            </div>
        </div>
        <div class="info">
            <?php
            $rootPath = "../obras/$id/";
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