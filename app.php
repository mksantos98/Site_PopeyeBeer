<?php
    function login($login, $senha) {
        $cn = openConnection();
        $login = param($cn, $login);
        $senha = param($cn, $senha);

        $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = MD5('$senha');";

        $r = get($cn, $sql);
        closeConnection($cn);

        if(!is_null($r)) {
            session_start();
            $_SESSION["id"] = $r["id"];
            $_SESSION["nome"] = $r["nome"];
            $_SESSION["email"] = $r["email"];
            header("location:index.php");
        } else {
            echo "<script>alert('Erro ao digitar login e senha!');</script";
        }
    }
?>