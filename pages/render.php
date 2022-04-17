<?php
include $_SERVER["DOCUMENT_ROOT"] . "/pages/api/db.php";

$rows = getAll();
if ($rows && count($rows) > 0) {
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
        $id = intval($row["id"]);
        if(getId($id)){
            $nome = $row["nome"];
            $end = $row["end"];
            $desc = $row["desc"];
            $preco = $row["preco"];
            $results = getImages($id);
            $sold = $row["sold"];
            $imgs = "";
            if ($results != false) {
                $imgs .= "<img src='data:image/png;base64, $results[0]' draggable='false'/>";
            }
            echo "
                <a title='$nome' class='card " . (($sold) ? "sold": "") . "' href='/pages/mais.php?id=" . ($id) . "' onmouseover='toggleInfo(this)'>
                    $imgs
                    <div class='info hide' onmouseout='toggleInfo(this)'>
                        <h1>$nome</h1>
                        <h2>$end</h2>
                        <h3>$preco</h3>
                    </div>
                </a>";
        }
    }
} else {
    echo "<h2 class='noObra'> Nenhuma obra encontrada!</h2>";
}
?>