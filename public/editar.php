<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM brinquedos WHERE id=?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$brinquedos = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>Edite</h1>
    </header>

    <main>

        <h2>Edite o brinquedo <?php echo $brinquedos["nome"]?>!</h2>

        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $brinquedos["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $brinquedos["nome"]?>">

            <br>

            <label for="categoria">Categoria:</label>
            <select name="categoria">
                <option value="">Selecione</option>
                <option value="plastico" <?php echo ($brinquedos["categoria"] == "plastico") ? "selected" : "" ?>>plastico</option>
                <option value="pano" <?php echo ($brinquedos["categoria"] == "pano") ? "selected" : "" ?>>pano</option>
                <option value="maleavel" <?php echo ($brinquedos["categoria"] == "maleavel") ? "selected" : "" ?>>maleavel</option>
            </select>

            <br>

            <label for="faixa_etaria">Faixa Etária:</label>

            <select name="faixa_etaria">
                <option value="">Selecione</option>
                <option value="1-5" <?php echo ($brinquedos["faixa_etaria"] == "1-5") ? "selected" : "" ?>>1-5</option>
                <option value="6-7" <?php echo ($brinquedos["faixa_etaria"] == "6-7") ? "selected" : "" ?>>6-7</option>
                <option value="8-12" <?php echo ($brinquedos["faixa_etaria"] == "8-12") ? "selected" : "" ?>>8-12</option>
            </select>

            <br>

            <label for="preco">Preço:</label>
            <input type="text" name="preco" value="<?php echo $brinquedos["preco"]?>">

            <br>

            <label for="quantidade_estoque">Quantidade em Estoque:</label>
            <input type="text" name="quantidade_estoque" value="<?php echo $brinquedos["quantidade_estoque"]?>">

            <br>

            <button type="submit">Atualizar</button>

        </form>

    </main>

    <footer>

    </footer>

</body>

</html>