<?php
    session_start();
    if($_SESSION["tipo"] !="admin"){
        header('location:agenda.php');
    }
    include("conecta.php");
    $id = $_GET['id'];
    $tipo = $_POST['tipopessoa'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $datanascimento = $_POST['datanascimento'];
    $profissao = $_POST['profissao'];
    $sql = "UPDATE pessoa SET tipo='$tipo', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', celular='$celular', email='$email', datanascimento='$datanascimento', profissao='$profissao' WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Pessoa atualizada com sucesso!');
        window.location.href = 'pessoa.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Pessoa não foi atualizada com sucesso!');
        window.location.href = 'pessoa.php';
        </script>";
    }
    mysqli_close($conn);
?>