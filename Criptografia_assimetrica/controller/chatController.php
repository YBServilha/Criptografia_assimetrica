<?php

function conectar($sql){
    $host = "localhost";
    $user = "root";
    $senha = "";
    $bd = "atv_criptografia_yan_danilo";

    $conn = new mysqli($host, $user, $senha, $bd);
    $execute = mysqli_query($conn, $sql);
    return $execute;
}

function pegar(){
    $sql = "SELECT * FROM mensagens";
    
    $res = conectar($sql);
    while ($row = mysqli_fetch_assoc($res)) {
        echo $row['codnome'] . ": " . $row['mensagem'] . "<br><br>";
    }
}
function descri(){
    $sql = "SELECT * FROM mensagens";
    
    $res = conectar($sql);
    while ($row = mysqli_fetch_assoc($res)) {
        echo $row['codnome'] . ": " . descriptografar($row['mensagem'], 3) . "<br><br>";
    }
}
function pegarChaves(){
    $sql = "select * from chaves";
    $resp = executar($sql);
    while($row = mysqli_fetch_assoc($resp)){
        return $row;
    }
}
function descriptografar($criptografado, $deslocamento) {
    return criptografar($criptografado, -$deslocamento);
}



function criptografar($mensagem, $deslocamento) {
    $criptografado = "";
    $tamanho = strlen($mensagem);
    for ($i = 0; $i < $tamanho; $i++) {
        $char = $mensagem[$i];
        if (ctype_alpha($char)) {
            $ascii_code = ord(strtolower($char));
            $ascii_code += $deslocamento;
            if ($ascii_code > 122) {
                $ascii_code -= 26;
            }
            $criptografado .= chr($ascii_code);
        } else {
            $criptografado .= $char;
        }
    }
    return $criptografado;
}






function incluir($codnome, $mensagem){
    $sql = "insert into mensagens(codnome, mensagem) values('$codnome', '$mensagem')";
    conectar($sql);
}


if(isset($_POST['mensagem'])){
    incluir($_POST['codNome'], criptografar($_POST['mensagem'], 3));
    /*$mensagem = 'Esta é uma mensagem confidencial!';
    $mensagem_criptografada = criptografar($mensagem, 3);
    echo 'Mensagem criptografada: ' . $mensagem_criptografada;
    $mensagem_descriptografada = descriptografar($mensagem_criptografada, 3);
    echo 'Mensagem descriptografada: ' . $mensagem_descriptografada;*/
    header('location: ../chat.php');
}






/*if(isset($_POST['keyPrivate'])){
    ?>
        <form action="chat.php" method="post" id="descri">
            <input type="hidden" value="descriptografar" name="descript">
        </form>
        <script>
            var btnDescript = document.getElementById('descri');
            btnDescript.submit();
            setTimeout(function() {
                document.location.href = './chat.php';
            }, 100);
        </script>
    <?php
    
}*/

?>