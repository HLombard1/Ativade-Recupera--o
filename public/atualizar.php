<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$faixa_etaria = $_POST["faixa_etaria"];
$preco = $_POST["preco"];
$quantidade_estoque = $_POST["quantidade_estoque"];

$sql = "UPDATE brinquedos SET nome='$nome', categoria='$categoria', faixa_etaria='$faixa_etaria', preco='$preco', quantidade_estoque='$quantidade_estoque' WHERE id = '$id'";

mysqli_query($conexao, $sql);
header("Location: ../index.php");