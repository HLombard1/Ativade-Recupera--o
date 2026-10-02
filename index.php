<!-- Estou curingando professor -->
<?php

    include "infra/conexao.php";
    $brinquedos = mysqli_query($conexao, "SELECT * FROM brinquedos");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nome = $_POST["nome"];
        $categoria = $_POST["categoria"];
        $faixa_etaria = $_POST["faixa_etaria"];
        $preco = $_POST["preco"];
        $quantidade_estoque = $_POST["quantidade_estoque"];

        $sql = "INSERT INTO brinquedos(nome, categoria, faixa_etaria, preco, quantidade_estoque) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sssdi",
            $nome,
            $categoria,
            $faixa_etaria,
            $preco,
            $quantidade_estoque
        );

        mysqli_stmt_execute($stmt);

    };



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Brinquedos</title>
</head>
<body>
    <h1>Cadastre um Brinquedo!</h1>

    <form action="" method="POST">

        <label for="nome">Nome</label>
        <input type="text" name="nome" required></label>

        <br>

        <label for="categoria">Categoria</label>
        <select name="categoria" required>
            <option value="">Selecione</option>
            <option value="plastico">plastico</option>
            <option value="pano">pano</option>
            <option value="maleavel">maleavel</option>
        </select>
        
        <br>

        <label for="faixa_etaria">Faixa etaria</label>
        <select name="faixa_etaria" required>
            <option value="">Selecione</option>
            <option value="1-5">1-5</option>
            <option value="6-7">6-7</option>
            <option value="8-12">8-12</option>
        </select>

        <br>

        <label for="preco">Preço</label>
        <input type="float" name="preco" required></label>

        <br>

        <label for="quantidade_estoque">Quantidade no estoque</label>
        <input type="number" name="quantidade_estoque" required></label>

        <br>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Livros Cadastrados</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Faixa Etaria</th>
            <th>Preco</th>
            <th>Quantidade de Estoque</th>
        </tr>

        <?php while ($brinquedo = mysqli_fetch_assoc($brinquedos)) { ?>
            <tr>
                <td><?php echo $brinquedo["id"] ?></td>
                <td><?php echo $brinquedo["nome"] ?></td>
                <td><?php echo $brinquedo["categoria"] ?></td>
                <td><?php echo $brinquedo["faixa_etaria"] ?></td>
                <td><?php echo $brinquedo["preco"] ?></td>
                <td><?php echo $brinquedo["quantidade_estoque"] ?></td>
                
                <td>
                    <a href="public/editar.php?id=<?php echo $brinquedo["id"] ?>">Editar</a>
                    <a href="public/excluir.php?id=<?php echo $brinquedo["id"] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>