<?php 
    include "db.php";
    if(isset($_GET["obraId"]) && getId($_GET["obraId"])){
        $obraId = $_GET["id"];
    }else {
        die("Obra não encontrada");
    }
    if(isset($_GET["imageId"]) && checkImage($obraId, $_GET["imageId"])){
        $imageId = $_GET["id"];
    }else {
        die("Imagem não encontrada");
    }

    deleteImage($obraId, $imageId);

?>