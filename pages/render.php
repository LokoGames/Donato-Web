<?php
$obraPath = "obras/";
$fi = new FilesystemIterator($obraPath, FilesystemIterator::SKIP_DOTS);
$count = iterator_count($fi);
for ($i = 0; $i < ($count); $i++) {
    $files = glob($obraPath . "$i/images/" . "*");
    $json = json_decode(file_get_contents($obraPath . "$i/info.json"));
    if ($files != false) {
        $nome = $json->{"nome"};
        $end = $json->{"end"};
        $img = $files[0];

        echo "
        <div class='card' onmouseover='toggleInfo(this);'>
            <img src='$img'>
                <a href='/pages/mais.php?id=$i' class='info hide'>
                    <h2>$nome</h2>
                    <h3>$end</h3>
                </a> 
        </div>";
    } else {
        die("Nenhuma Obra encontrada");
    }
}
?>