<?php
    include("conecta.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM pessoas WHERE idpessoas='$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Pessoa apagada com sucesso!');
        window.location.href = 'pessoa.php';
        </script>";
    }
    else
    {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Pessoa não foi apagada com sucesso!');
        window.location.href = 'pessoa.php';
        </script>";
    }
    mysqli_close($conn);
?>