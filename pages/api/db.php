<?php
parse_ini_file("./php.ini");
$handle = new SQLite3("../../donato");
function getAll()
{
    global $handle;
    $sql = "SELECT * FROM obras;";
    $res = $handle->query($sql);
    return $res;
}

function getId(int $id)
{
    global $handle;
    $sql = "SELECT * FROM obras WHERE id=$id;";
    $res = $handle->query($sql);
    return $res;
}

function addObra(string $nome, string $end, string $desc, int $preco)
{
    global $handle;
    $sql = "INSERT INTO obras (nome,end,desc,preco) VALUES ($nome, $end, $desc, $preco);";
    $res = $handle->query($sql);
    return $res;
}
function removeObra(int $id)
{
    global $handle;
    $sql = "DROP FORM obras WHERE id=$id";
    $res = $handle->query($sql);
    return $res;
}
?>