<?php

$GLOBALS["handle"] = new PDO("sqlite:" . $_SERVER["DOCUMENT_ROOT"] ."/donato");

function getAll()
{
    $handle = $GLOBALS["handle"];
    $sql = "SELECT * FROM obras";
    $res = $handle->query($sql);
    $row = $res->fetchAll(\PDO::FETCH_ASSOC);
    return $row;
}

function checkId(int $id = 0)
{
    $res = getId($id);
    return ($res != false);
}

function getId(int $id)
{
    $handle = $GLOBALS["handle"];
    $sql = "SELECT * FROM obras WHERE id=$id;";
    $res = $handle->query($sql);
    if($res != false){
        return json_encode($res);
    }else{
        return false;
    }
}

function addObra(string $nome, string $end, string $desc, int $preco)
{
    $handle = $GLOBALS["handle"];
    $sql = "INSERT INTO obras (nome,end,desc,preco) VALUES ('$nome','$end','$desc','$preco');";
    $stmnt = $handle->prepare($sql);
    $stmnt->execute();
}

function removeObra(int $id)
{
    $handle = $GLOBALS["handle"];
    $sql = "DELETE FROM obras WHERE id=$id";
    $stmnt = $handle->prepare($sql);
    $stmnt->execute();
}
function getImages(int $id){
    $obraPath = $_SERVER["DOCUMENT_ROOT"] . "\\obras\\$id\\";
    // $fi = new FilesystemIterator($obraPath, FilesystemIterator::SKIP_DOTS);
    $files = glob($obraPath . "*");
    return ($files != false) ? $files : array();
}
?>