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
        include('conn.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nomeCliente = $_POST['nomeCliente'];
            $telCliente = $_POST['telCliente'];
            $celCliente = $_POST['celCliente'];
            $endCliente = $_POST['endCliente'];
            $emailCliente = $_POST['emailCliente'];

            $stmt = $pdo->prepare('INSERT INTO tbcliente(nomeCliente, telCliente, celCliente, endCliente, emailCliente) VALUES (?,?,?,?,?)');
            $stmt->execute([$nomeCliente, $telCliente, $celCliente, $endCliente, $emailCliente]);

            header('Location: acesso_completo.php');
        }
        
        ?>


<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Cliente</title>
</head>
<body>
<h2>Adicionar Cliente</h2>
    <form method="POST">
        <label for="nomeCliente">Nome do Cliente:</label>
        <input type="text" name="nomeCliente" required><br>

        <label for="telCliente">Telefone do Cliente:</label>
        <input type="text" name="telCliente" required><br>

        <label for="celCliente">Celular do Cliente:</label>
        <input type="text" name="celCliente" required><br>

        <label for="endCliente">Endereço do Cliente:</label>
        <input type="text" name="endCliente" required><br>

        <label for="emailCliente">Email do Cliente:</label>
        <input type="text" name="emailCliente" required><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
