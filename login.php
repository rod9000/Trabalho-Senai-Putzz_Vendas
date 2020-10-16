<?php
    //Iniciar uma sessão
    session_start();
    include("conecta.php");
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $logar = mysqli_query($conn, "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die(mysqli_connect_error());
    if(mysqli_num_rows($logar)>0){
        $usuario = mysqli_fetch_array($logar);
        $_SESSION["user"] = $usuario['nome'];
        $_SESSION["status"] = "OK";
        $_SESSION["tipo"] = $usuario['tipo'];
        echo "<script type='text/javascript'>
        location.href='menu.php';
        </script>";
    }
    else {
        echo "<script type='text/javascript'>
        alert('Login ou senha incorretos! Tente novamente!');
        location.href='index.php';
        </script>";
    }
    mysqli_close($conn);
?>