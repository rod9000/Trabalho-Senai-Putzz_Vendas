<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
            <meta charset = "UTF-8"/>
            <link rel="shortcut icon" href="imagens/putzz.ico" type="image/x-icon"/>         
            <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/nav2.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        </head>
    <body>
        
        <header>          
        </header>
        <nav>
                    <?php
                        include("menu.php");
                    ?>
        </nav>
        <section>
            <br/><br/>
        <div style="width: 30%; float:left; padding-left:10%;padding-top:10%; padding-right:2%">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp;Dados do Sistema</h3></div>
                <div class="panel-body">
                    <?php
                    include("conecta.php");
                    $usuario = mysqli_query($conn, "SELECT count(*) as usuarios from usuarios");
                    $numero = mysqli_fetch_array($usuario)
                    ?>
                    Usuários Cadastrados 
                    <?php echo "<b>".$numero['usuarios']."</b>";?>
                    <?php mysqli_close($conn); ?>
                    <br/><br/>
                    <?php
                    include("conecta.php");
                    $pessoa = mysqli_query($conn, "SELECT count(*) as pessoas from pessoas");
                    $numero = mysqli_fetch_array($pessoa)
                    ?>
                    Pessoas Cadastradas 
                    <?php echo "<b>".$numero['pessoas']."</b>"; ?>
                    <?php mysqli_close($conn); ?>
                    <br/>
                    <?php
                    include("conecta.php");
                    $produto = mysqli_query($conn, "SELECT count(*) as produtos from produtos");
                    $numero2 = mysqli_fetch_array($produto)
                    ?>
                    </br>
                    Produtos Cadastrados 
                    <?php echo "<b>".$numero2['produtos']."</b>"; ?>
                    <?php mysqli_close($conn); ?>
                    <br/>
                </div>    
        </div>
        </div>
        <div style="width: 40%; float:right; padding-left:2%;padding-top:10%;  padding-right:15%">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;Pedidos </h3></div>
                <div class="panel-body">
                    <?php
                    include("conecta.php");
                    $pedidos = mysqli_query($conn, "SELECT count(*) as pedidos from pedidos");
                    $numero = mysqli_fetch_array($pedidos)
                    ?>
                    Quantidade de Pedidos Cadastrados 
                    <?php echo "<b>".$numero['pedidos']."</b>";?>
                    <?php mysqli_close($conn); ?>
                </div>    
        </div>
        </div>  
            <br/><br/>
        </section>
        <footer>
            </footer>
                    </div>

</html>