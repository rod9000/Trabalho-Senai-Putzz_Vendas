<?php
    include("conecta.php");
    $codigo = $_POST['codigo'];
    $estoque = $_POST['estoque'];
    $descricao = $_POST['descricao'];  
    $valor = $_POST['valor']; 
  
    $sql = "INSERT INTO produtos(idprodutos,estoque,descricao,valor) VALUES ('$codigo','$estoque','$descricao','$valor')";
    if(mysqli_query($conn, $sql)){
       
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto cadastrado com sucesso!');
        window.location.href = 'cadproduto.php';
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