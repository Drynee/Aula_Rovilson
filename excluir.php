<?php
include('conn.php');

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM tbcliente WHERE codCliente = ?');
$stmt->execute([$id]);

header('Location: acesso_completo.php');
?>
