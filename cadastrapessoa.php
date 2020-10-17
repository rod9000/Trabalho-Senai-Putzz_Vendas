<?php
    include("conecta.php");
    $tipo = $_POST['tipopessoa'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $datanascimento = $_POST['datanascimento'];
    $profissao = $_POST['profissao'];    
    $cadpessoa = mysqli_query($conn, "SELECT * FROM pessoa WHERE nome='".$nome."'");
    if(mysqli_num_rows($cadpessoa) > 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário já cadastrado!');
        window.location.href = 'usuario.php';
        </script>";
        mysqli_close($conn);
    }
    $sql = "INSERT INTO pessoa(tipo,nome,endereco,cidade,estado,celular,email,datanascimento,profissao) VALUES ('$tipo','$nome','$endereco','$cidade','$estado','$celular','$email','$datanascimento','$profissao')";
    if(mysqli_query($conn, $sql)){
       
        echo "<script language='javascript' type='text/javascript'>
        alert('Pessoa cadastrada com sucesso!');
        window.location.href = 'pessoa.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Pessoa não foi cadastrada com sucesso!');
        window.location.href = 'pessoa.php';
        </script>";
    }
    mysqli_close($conn);
?>