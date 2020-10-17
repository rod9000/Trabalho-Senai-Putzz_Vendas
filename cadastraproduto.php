<?php
    include("conecta.php");
    $tipo = $_POST['tipoproduto'];
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $estoque = $_POST['quantidade'];
    $descricao = $_POST['descricao'];  
    $valor = $_POST['valor']; 
  
    $sql = "INSERT INTO produtos(tipo,nome,codigo,estoque,descricao,valor) VALUES ('$tipo','$nome','$codigo','$estoque','$descricao','$valor')";
    if(mysqli_query($conn, $sql)){
       
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto cadastrado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto não foi cadastrado com sucesso!');
        window.location.href = 'cadproduto.php';
        </script>";
    }
    mysqli_close($conn);
?> q