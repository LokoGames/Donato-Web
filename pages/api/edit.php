<?php
include "db.php";
if (isset($_POST["id"]) && checkId($_POST["id"])) {
    $id = $_POST["id"];
} else {
    echo "Invalid id!";
}


if (isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["end"]) && isset($_POST["preco"]) && isset($_POST["desc"])) {
    $nome = $_POST["nome"];
    $end = $_POST["end"];
    $preco = $_POST["preco"];
    $desc = $_POST["desc"];
    $sold = intval(isset($_POST["sold"]));
    // var_dump(isset($_POST["sold"]));

    // $sql = "UPDATE obras SET nome = '$nome', end = '$end', desc = '$desc', preco = $preco, sold = $sold WHERE id = $id;";
    // echo $sql;

    // echo "Altering ";
    // echo "Novo nome: $nome";
    // echo "Novo Preço: $preco";
    // echo "Nova Descrição: $desc";
    // echo "Disponível: $sold ";

    editObra($id, $nome, $end, $desc, $preco, $sold);

    exit(header("Location: ../../admin"));
} else {
    echo "Parameter missing!";
}
?>