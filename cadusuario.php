<?php
    include("conecta.php");
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE nome='".$nome."' AND login='".$login."'");
    if(mysqli_num_rows($usuario) > 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário já cadastrado!');
        window.location.href = 'usuario.php';
        </script>";
        mysqli_close($conn);
    }
    $sql = "INSERT INTO usuario(nome,login,senha,tipo) VALUES ('$nome','$login','$senha','$tipo')";
    if(mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');
        window.location.href = 'usuario.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário não foi cadastrado com sucesso!');
        window.location.href = 'usuario.php';
        </script>";
    }
    mysqli_close($conn);
?>