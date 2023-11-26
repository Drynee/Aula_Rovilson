<?php 

//A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

//Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['login'])) {
    //Destrói a sessão por segurrança
    session_destroy();
    //Redireciona o visitante de volta pro login
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
    Acesso Restrito




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
        <form method="POST"> <br>
        <label for="nomeCliente">Digite o Nome do Cliente para Buscá-lo:</label> <br><br>
        <input type="text" name="nomeCliente" required><br>
        <input type="submit" value="Buscar">
        </form>
    
</body>
</html>