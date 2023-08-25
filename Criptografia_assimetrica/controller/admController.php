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

function validar($email, $senha){
    $sql = "select * from adm where email = '$email' and senha = '$senha'";
    $res = conectar($sql);
    if(mysqli_num_rows($res) > 0) {
        //echo "Credenciais válidas";
        header('location:../chaves.php');
    } else {
        echo "Credenciais inválidas";
        header('location:../index.php');
    }
}

if(isset($_POST['senha'])){
    validar($_POST['email'], $_POST['senha']);
}

?>