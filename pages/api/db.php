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

function addObra(string $nome, string $end, string $desc, int $preco, bool $sold)
{
    $handle = $GLOBALS["handle"];
    $sql = "INSERT INTO obras (nome,end,desc,preco,sold) VALUES ('$nome','$end','$desc','$preco', '$sold');";
    $stmnt = $handle->prepare($sql);
    $stmnt->execute();
}

function removeObra(int $id)
{
    $handle = $GLOBALS["handle"];
    $sql = "DELETE FROM obras WHERE id=$id";
    $stmnt = $handle->prepare($sql);
    $stmnt->execute();
    $id--;
    $obraPath = $_SERVER["DOCUMENT_ROOT"] . "\\obras\\$id\\";
    deleteDirectory($obraPath);
}

function getImages(int $id)
{
    $id--;
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
function deleteDirectory($dir)
{
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator(
        $it,
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($files as $file) {
        if ($file->isDir()) {
            rmdir($file->getRealPath());
        } else {
            unlink($file->getRealPath());
        }
    }
    rmdir($dir);
}

function editObra(int $id, string $nome, string $end, string $desc, int $preco, bool $sold = false)
{
    $handle = $GLOBALS["handle"];
    $sql = "UPDATE obras SET nome = '$nome', end = '$end', desc = '$desc', preco = '$preco', sold = '$sold' WHERE id = $id;";
    $statement = $handle->prepare($sql);
    return $statement->execute();
}
?>