<?php
        include('conn.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = $_POST['id'];
            $nomeCliente = $_POST['nomeCliente'];
            $telCliente = $_POST['telCliente'];

            $stmt=$pdo->prepare('UPDATE tbcliente SET nomeCliente = ?, telCliente = ? WHERE codCliente = ?');
            $stmt->execute([$nomeCliente, $telCliente, $id]);   

            header('Location: index.php');
        }
        
        $id = $_GET['id'];
        $stmt = $pdo->prepare('SELECT * FROM tbcliente WHERE codCliente = ?');
        $stmt->execute([$id]);
        $cliente = $stmt->fetch();

        ?>


<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['codCliente']; ?>">
        <label for="nomeCliente">Nome do Cliente:</label>
        <input type="text" name="nomeCliente" value="<?php echo $cliente['nomeCliente']; ?>"> <required><br>

        <label for="telCliente">Telefone do Cliente:</label>
        <input type="text" name="telCliente" value="<?php echo $cliente['telCliente'];?>"> <required><br>

        <label for="celCliente">Celular do Cliente:</label>
        <input type="text" name="celCliente" value="<?php echo $cliente['celCliente'];?>"> <required><br>

        <label for="endCliente">Endereço do Cliente:</label>
        <input type="text" name="endCliente" value="<?php echo $cliente['endCliente'];?>"> <required><br>

        <label for="emailCliente">Email do Cliente:</label>
        <input type="text" name="emailCliente" value="<?php echo $cliente['emailCliente'];?>"> <required><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>
