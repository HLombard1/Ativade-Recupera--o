<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM brinquedos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

$brinquedo =mysqli_fetch_assoc($resultado);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form action="" method="POST">

        <label for="nome">Nome</label>
        <input type="text" name="nome"></label>

        <br>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <option value="">Selecione</option>
            <option value="plastico">plastico</option>
            <option value="pano">pano</option>
            <option value="maleavel">maleavel</option>
        </select>

        <br>

        <label for="faixa_etaria">Faixa etaria</label>
        <select name="faixa_etaria">
            <option value="">Selecione</option>
            <option value="plastico">1-5</option>
            <option value="pano">6-7</option>
            <option value="maleavel">8-12</option>
        </select>

        <br>

        <label for="preco">Preço</label>
        <input type="float" name="preco"></label>

        <br>

        <label for="quantidade_estoque">Quantidade no estoque</label>
        <input type="number" name="quantidade_estoque"></label>

        <br>

        <button type="submit">Cadastrar</button>

    </form>
</body>
</html>
