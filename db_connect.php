<?php
//CONEXÃO COM BANCO DE DADOS//
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "projeto";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
    echo "Falha na Conexão: " . mysqli_connect_error();
}
?>