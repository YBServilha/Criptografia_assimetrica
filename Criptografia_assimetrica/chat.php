<?php
include_once 'controller/chatController.php';

function verificarChavePrivada($keyPrivate){
    $sql = "select * from chaves where key_private = '$keyPrivate'";
    $res = conectar($sql);
    if(mysqli_num_rows($res) > 0) {
        //echo "Credenciais válidas";
        $res = descri();
    }else{
        $res = pegar();
        echo $res;
    } 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="css/chatStyle.css">
</head>
<body>
    <h1>Chat</h1>
    <main>
        <div class="mensagens">
        <?php

            //$res = pegar();
            //echo $res;
            //$res = descri();
            //echo $res;

            /*if(isset($_POST['descript'])){
                $res = descri();
                echo $res;
            }else{
                $res = pegar();
                echo $res;
            }*/
            
            if(isset($_POST['keyPrivate'])){
                verificarChavePrivada($_POST['keyPrivate']);
                //echo 'funcionou';
            }else{
                $res = pegar();
                echo $res;
            }

        ?>
        </div>
        <form action="controller/chatController.php" method="post">
            <input type="text" name="codNome" placeholder="Insira seu codnome" id="cod-nome" required>
            <input type="text" name="mensagem" placeholder="Insira sua mensagem" id="mensagem-cript" required>
            <input type="submit" value="Enviar">
        </form>
        <h2>Para descriptografar o chat insira a chave privada:</h2>
        <div class="descriptografar">
            
            <form action="chat.php" method="post" id="form-descriptografar">
                <input type="text" placeholder="Chave privada..." name="keyPrivate" id="chave-privada" required>
                <input type="submit" value="Descriptografar" id="btn-descript">
            </form>
        </div>
        <a href="index.php" id="voltarHome">Voltar para a home</a>
    </main>
</body>
</html>