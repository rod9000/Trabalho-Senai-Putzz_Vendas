<?php
    session_start();
    if($_SESSION["tipo"] !="admin"){
        header('location:agenda.php');
    }
    include("conecta.php");
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $sql = "UPDATE usuario SET nome='$nome', login='$login', senha='$senha', tipo='$tipo' WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Usuário atualizado com sucesso!');
        window.location.href = 'usuario.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Usuário não foi atualizado com sucesso!');
        window.location.href = 'usuario.php';
        </script>";
    }
    mysqli_close($conn);
?>