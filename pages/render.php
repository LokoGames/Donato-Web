<?php
include $_SERVER["DOCUMENT_ROOT"] . "/pages/api/db.php";

$rows = array(getAll());
if ($rows && count($rows) > 0) {
    $sem = $rows[0];
    for ($i = 0; $i < count($sem); $i++) {
        $row = $sem[$i];
        $id = intval($row["id"]);
        $nome = $row["nome"];
        $end = $row["end"];
        $desc = $row["desc"];
        $preco = $row["preco"];
        $results = getImages($i);
        $imgs = "";
        if ($results != false) {
            $imgs .= "<img src='data:image/png;base64, $results[0]' draggable='false'/>";
        }
        echo "
        <a class='card' href='/pages/mais.php?id=" . ($i + 1) . "' onmouseover='toggleInfo(this)'>
            $imgs
            <div class='info hide' onmouseout='toggleInfo(this)'>
            <h1>$nome</h1>
            <h1>$preco</h1>
            <h2>$end</h2>
            </div>
        </a>";
    }
} else {
    echo "<tr><td><h1> Nenhuma obra encontrada!</h1></td></tr>";
}
?>