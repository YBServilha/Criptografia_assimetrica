<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/indexStyle.css">
</head>
<body>
    <h1>Chat criptografado</h1>
    <main>
        <form action="controller/admController.php" method="post">
            <h1>Gerar chaves</h1>
            <input type="text" placeholder="Seu email" name="email" value="adm@gmail.com">
            <input type="password" placeholder="Sua senha" name="senha" value="123" >
            <input type="submit" value="Entrar">
        </form>
        <form action="controller/entrarChatController.php" method="post">
            <h1>Entrar no chat</h1>
            <input type="text" placeholder="Chave pública" name="chavePublica">
            <input type="submit" value="Entrar">
        </form>
    </main>
</body>
</html>