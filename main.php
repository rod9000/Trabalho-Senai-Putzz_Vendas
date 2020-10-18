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
        <link rel="shortcut icon" href="imagens/icomush.ico" type="images/icons/favicon.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        
        <header>          
        </header>
        <nav>
            <div class="col-xs-8 col-xs-offset-2">
                <div class="col-xs-6 col-xs-offset-0">
                    <?php
                        include("menu.php");
                    ?>
                  
                </div>
                <div class="col-xs-4 col-xs-offset-1">
                    <?php
                    echo "<div style='position: fixed; left:10;  qwidth: 100%;  color: white; text-align: center;'>";
                        echo "<span class='glyphicon glyphicon-user' style='color:white' aria-hidden='true'></span>";
                        echo $_SESSION["user"];
                        echo "<a href='sair.php' style='text-decoration: none;color:#20ff28; font-weight: bold;'>&nbsp;&nbsp;Sair</a>";
                        echo "</div>";
                    ?>
                </div>
            </div>
        </nav>
        <section>
            <br/><br/>
        <div style="width: 30%; float:left; padding-left:2%; padding-right:2%">
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
        <div style="width: 30%; float:left; padding-left:2%; padding-right:2%">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;Físicas / Jurídicas</h3></div>
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
        <div style="width: 30%; float:left; padding-left:2%; padding-right:2%">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span>&nbsp;Aniversariantes do Mês</h3></div>
                <div class="panel-body">
                    <?php
                        include("conecta.php");
                        $sql = mysqli_query($conn, "SELECT * from pessoas where month(datanascimento) = month(CURRENT_DATE())");
                        while($aniversario = mysqli_fetch_array($sql)){
                            $id = $aniversario['id'];
                            echo "<a href='verpessoa.php?id=$id'>".$aniversario['nome']."</a>&nbsp;&nbsp;&nbsp;&nbsp;";
                            $data = date_create($aniversario['datanascimento']);
                            echo date_format($data, 'd/m/Y');
                            echo "<br/>";
                        }
                        mysqli_close($conn);
                    ?>
                    <br/><br/>
                </div>    
        </div>
        </div>
            <br/><br/>
        </section>
        <footer>
            </footer>
                    </div>

</html>