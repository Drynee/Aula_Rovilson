<?php

// A sessão precisa ser iniciada em cada página diferente

if (!isset($_SESSION)) session_start();

// Verifica se não há a variável de sessão que identifica o usuário
if (!isset($_SESSION['login'])) {
    //Destrói sessão por segurança
    session_destroy();
    //Redireciona o visitante de volta pro logib
    header("Location: index.php");
    exit;
}
?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acesso</title>
</head>
<body>
    Acesso Completo<br>
    <?php
        $usuario = $_SESSION['login'];
        echo "$usuario, você está logado";   
    ?>
    <br><br>
    <a href="cadastro.php">Clique Aqui para Cadastrar um Novo Cliente</a> <br> <br>
    <a href="acesso_restrito.php">Clique Aqui para Acessar o Modo Restrito - Apenas Consultas</a> <br> <br>

    <?php
        include("conn.php");

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nomeCliente = $_POST['nomeCliente'];

            $stmt = $pdo->prepare('SELECT * FROM tbcliente WHERE nomeCliente=?');
            $stmt->execute([$nomeCliente]);

            if($row = $stmt->fetch()){
                echo "<table>";
                echo "<tr>
                    <th> Nome </th>
                    <th> Telefone </th>
                    <th> Celular </th>
                    <th> Endereço </th>
                    <th> Email </th>
                    <th> Opções </th>
                </tr>";
                    echo "<tr>";
                    echo "<td>{$row['nomeCliente']}</td>";
                    echo "<td>{$row['telCliente']}</td>";
                    echo "<td>{$row['celCliente']}</td>";
                    echo "<td>{$row['endCliente']}</td>";
                    echo "<td>{$row['emailCliente']}</td>";
                    echo "<td>
                                <a href='editar.php?id={$row['codCliente']}'>Editar</a>
                                <a href='excluir.php?id={$row['codCliente']}'>Excluir</a> <br>
                         </td>";
                    echo "</tr>";
                echo "</table>";
            } else{
                echo "Contato inexistente";
            }
        }
    ?>


    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <form method="POST"> <br>
        <label for="nomeCliente">Digite o Nome do Cliente para Buscá-lo:</label> <br><br>
        <input type="text" name="nomeCliente" required><br>
        <input type="submit" value="Buscar">
        </form>
    
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tbCliente');
        while ($row = $stmt->fetch()){
            echo "<tr>";
            echo "<td>{$row['nomeCliente']}</td>";
            echo "<td>{$row['telCliente']}</td>";
            echo "<td>{$row['celCliente']}</td>";
            echo "<td>{$row['endCliente']}</td>";
            echo "<td>{$row['emailCliente']}</td>";
            echo "<td>
                        <a href='editar.php?id={$row['codCliente']}'>Editar</a>
                        <a href='excluir.php?id={$row['codCliente']}'>Excluir</a>
                 </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
