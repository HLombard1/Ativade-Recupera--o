<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$faixa_etaria = $_POST["faixa_etaria"];
$preco = $_POST["preco"];
$quantidade_estoque = $_POST["quantidade_estoque"];

$sql = "UPDATE brinquedos 
        SET nome=?, categoria=?, faixa_etaria=?, preco=?, quantidade_estoque=? 
        WHERE id=?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sssdis",
    $nome,
    $categoria,
    $faixa_etaria,
    $preco,
    $quantidade_estoque,
    $id
);

mysqli_stmt_execute($stmt);

header("Location: ../index.php");