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

function validar($chavePublica){
    $sql = "select * from chaves where key_public = '$chavePublica'";
    $res = conectar($sql);
    if(mysqli_num_rows($res) > 0) {
        //echo "Credenciais válidas";
        header('location:../chat.php');
    } else {
        //echo "Credenciais inválidas";
        header('location:../index.php');
    }
}

if(isset($_POST['chavePublica'])){
    validar($_POST['chavePublica']);
}


?>