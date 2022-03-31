<?php

$GLOBALS["handle"] = new PDO("sqlite:" . $_SERVER["DOCUMENT_ROOT"] . "/donato");

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
    $row = $res->fetch(\PDO::FETCH_ASSOC);
    return $row;
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

function getImages(int $id)
{
    $obraPath = $_SERVER["DOCUMENT_ROOT"] . "\\obras\\$id\\";

    $res = array();
    $files = scandir($obraPath);

    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            $file = $obraPath . $file;
            $b64Img = base64_encode(file_get_contents($file));
            array_push($res, $b64Img);
        }
    }
    return $res;
}
?>