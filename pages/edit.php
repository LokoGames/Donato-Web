<?php
include "api/db.php";
if (isset($_GET["id"]) && getId($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Obra - Donato Construtora</title>
</head>

<body>
    <?php
    $rows = array(getId($id));
    // var_dump($rows);
    if ($rows && count($rows) > 0) {
        $row = $rows[0];
        $id = intval($row["id"]);
        $nome = $row["nome"];
        $end = $row["end"];
        $desc = $row["desc"];
        $preco = $row["preco"];
        $results = getImages($id);
        // var_dump($results);
        $imgs = "";
        for ($j = 0; $j < count($results); $j++) {
            $file = $results[$j];
            $imgs .= "<img src='data:image/png;base64, $file' draggable='false'/>";
        }
        echo "<div>
            <h1>$id</h1>
            <h2>$nome</h2>
            <h2>$end</h2>
            <h2>$preco</h2>
            <h3>$desc</h3>
        </div>";
    }
    ?>
</body>

</html>