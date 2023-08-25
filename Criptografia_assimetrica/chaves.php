<?php
function executar($sql){
    $host = "localhost";
    $user = "root";
    $senha = "";
    $bd = "atv_criptografia_yan_danilo";

    $conn = new mysqli($host, $user, $senha, $bd);

    $execute = mysqli_query($conn, $sql);
    return $execute;
}
function pegarChaves(){
    $sql = "select * from chaves";
    $resp = executar($sql);
    while($row = mysqli_fetch_assoc($resp)){
        return $row;
    }
}
function gerarChaves(){

    $sql1 = "select * from chaves";
    $res = executar($sql1);
    $code = random_bytes(5);
    $keyPublic = bin2hex($code);
    $code = random_bytes(5);
    $keyPrivate = bin2hex($code);

    $keys = array(
        0 => $keyPublic,
        1 => $keyPrivate,
    );
    if(mysqli_num_rows($res) > 0) {
        //echo "Credenciais válidas";
    ?>
    <script>
        alert('Sua chave ja foi criada');
    </script>
    <?php
    $res = pegarChaves();
    return $res;
    exit();
    } else {
        //echo 'incluindo';

        $sql = "INSERT INTO chaves(key_public, key_private) VALUES('$keys[0]','$keys[1]');";
        executar($sql);

        return $keys;   
    }

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves</title>
    <link rel="stylesheet" href="css/chavesStyle.css">
</head>
<body>
    <h1>Chaves</h1>
    <main>
        <div class="chaves">
            <?php
                
                $keys = gerarChaves();
                $getKeys = pegarChaves();
            ?>
            <p><span class="titulo-chaves">Sua chave pública:</span> <?php echo $getKeys['key_public']; echo '<br>'; echo '<br>'; echo '<span class="titulo-chaves">Sua chave privada: </span> '; echo $getKeys['key_private']?></p>

        </div>
        <form action="chaves.php" method="post" id="myform">
            <input type="hidden" name="chaves">
            <input type="submit" value="Gerar chaves" id="btnGerarChaves">
        </form>
        <a href="index.php" id="voltarHome">Voltar para a home</a>
    </main>
    
</body>
</html>