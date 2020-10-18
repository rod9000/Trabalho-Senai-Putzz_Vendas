<?php
    session_start();
    if($_SESSION["tipo"] !="admin"){
        header('location:agenda.php');
    }
    include("conecta.php");
    $id = $_GET['idusuarios'];
    $sql = "DELETE FROM usuarios WHERE idusuarios='$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Usuário apagado com sucesso!');
        window.location.href = 'usuario.php';
        </script>";
    }
    else
    {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Usuário não foi apagado com sucesso!');
        window.location.href = 'usuario.php';
        </script>";
    }
    mysqli_close($conn);
?>