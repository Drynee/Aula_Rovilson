<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09/11 - Autenticação de Usuário</title>
</head>
<body>
    <h1> Aula 09/11 - Autenticação de Usuário </h1>
    <hr/>

    <form method="post" action="verificaLogin.php">
        <label for="txtLogin"> Login: </label><br/>
        <input type="text" name="txtLogin" required/><br/>

        <label for="txtSenha"> Senha: </label><br/>
        <input type="text" name="txtSenha" required/><br/>

        <input type="submit" name="btnEnviar" value="Enviar"/><br/>
    </form>
</body>
</html>