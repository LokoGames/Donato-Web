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
    <link rel="stylesheet" href="../css/edit.css">
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
        $sold = $row["sold"];
        $results = getImages($id);
        $checked = ($sold) ?  "checked" : "";
        // var_dump($results);
        $imgs = "";
        for ($j = 0; $j < count($results); $j++) {
            $file = $results[$j];
            $imgs .= "<img src='data:image/png;base64, $file' draggable='false'/>";
        }
        echo "
        <form action='api/edit.php' method='POST' class='editForm' enctype='multipart/form-data'>
            <input name='id' type='text' value='$id' readonly>
            <input name='nome' type='text' value='$nome'>
            <input name='preco' type='number' value='$preco'>
            <input name='end' type='text' value='$end'>
            <label for='ve' class='venda' >Vendida</label>
            <input name='sold' id='ve' type='checkbox' $checked>
            <textarea name='desc'>$desc</textarea>
            <input type='submit' value='Alterar'>
        </form>";
    }
    ?>
</body>

</html>