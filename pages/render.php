<?php
$obraPath = "images/obras/";
$fi = new FilesystemIterator($obraPath, FilesystemIterator::SKIP_DOTS);
$count = iterator_count($fi);
for ($i = 0; $i < $count; $i++) {
    $files = glob($obraPath . "$i/images/" . "*");
    $json = json_decode(file_get_contents($obraPath . "$i/info.json"));
    if ($files != false) {
        echo "<div class='card'>
                                <a href='/pages/mais.php?id=$i'> <img src='$files[0]'> </a>
                                <h1> " . $json->{'nome'} . "</h1>
                                <p>" . $json->{"end"} . "</p>
                                <p>" . $json->{"preco"} . "</p>
                                <a href='/pages/mais.php?id=$i'>Ver Mais</a>
                            </div>";
    } else {
        echo "<div class='card'><h1>No images found</h1><div>";
    }
}
?>