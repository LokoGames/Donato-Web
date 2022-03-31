<?php
include $_SERVER["DOCUMENT_ROOT"] . "/pages/api/db.php";

if (isset($_GET["id"])) {
    if ($_GET["id"] != "" && checkId($_GET["id"]) == true) {
        $id = $_GET["id"];
    } else {
        die("Id not found");
    }
} else {
    die("parameter id not specified!");
}

$rows = array(getId($id));
// var_dump($rows);
if ($rows && count($rows) > 0) {
    $sem = $rows;
    for ($i = 0; $i < count($sem); $i++) {
        $row = $sem[$i];
        $id = intval($row["id"]);
        $GLOBALS["nome"] = $row["nome"];
        $GLOBALS["end"] = $row["end"];
        $GLOBALS["desc"] = $row["desc"];
        $GLOBALS["preco"] = $row["preco"];
        $GLOBALS["results"] = getImages($id-1);
        // var_dump($results);
        $imgs = "";
        for ($j = 0; $j < count($results); $j++) {
            $file = $results[$j];
            $imgs .= "<img src='data:image/png;base64, $file' draggable='false'/>";
        }
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $GLOBALS["nome"]  ?> - Donato Construtora</title>
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
        </div>
    </header>
    <main>
        <div class="images">
            <img id="displayImg" draggable="false">
            <div class="icons">
                <?php
                foreach ($results as $file) {
                    echo "<img src='data:image/png;base64, $file' draggable='false' onclick='setImage(this, $i);' class='image'>";
                }
                ?>
                <button onclick="changeImg()">></button>
            </div>
        </div>
        <div class="info">
            <?php
            echo "<div class='top'>
                <h1 id='nome'>" . $GLOBALS["nome"] . "</h1>
                <p id='preco'> R$ " . $GLOBALS["preco"] . "</p>
            </div>
            <h2 id='end'>" . $GLOBALS["end"] . "</h2>
            <h3 id='desc'>" . $GLOBALS["desc"] . "</h3>";
            ?>
        </div>
    </main>
    <script src="../js/mais.js"></script>
</body>

</html>