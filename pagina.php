<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Agenda 2.0</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <header>
            <div class="col-md-4 col-md-offset-4"><h3>Agenda 2.0 - TDS - SENAI</h3></div>
            <br/><br/>
        </header>
        <nav>
            <hr/>
            <div class="col-xs-8 col-xs-offset-2">
                <div class="col-xs-6 col-xs-offset-0">
                    <?php
                        include("menu.php");
                    ?>
                </div>
                <div class="col-xs-4 col-xs-offset-1">
                    <?php
                        echo "<span class='glyphicon glyphicon-user' aria-hidden='true'></span>";
                        echo $_SESSION["user"];
                        echo "<a href='sair.php' style='text-decoration: none; font-weight: bold;'>&nbsp;&nbsp;Sair</a>";
                    ?>
                </div>
            </div>
        </nav>
        <section>
            <hr/>
            <br/><br/>
        <div style="width: 30%; float:left; padding-left:2%; padding-right:2%">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp;Dados da Agenda</h3></div>
                <div class="panel-body">
                    <?php
                    include("conecta.php");
                    $usuario = mysqli_query($conn, "SELECT count(*) as usuarios from usuario");
                    $numero = mysqli_fetch_array($usuario)
                    ?>
                    Usuários Cadastrados 
                    <?php echo "<b>".$numero['usuarios']."</b>";?>
                    <?php mysqli_close($conn); ?>
                    <br/><br/>
                    <?php
                    include("conecta.php");
                    $pessoa = mysqli_query($conn, "SELECT count(*) as pessoas from pessoa");
                    $numero = mysqli_fetch_array($pessoa)
                    ?>
                    Pessoas Cadastradas 
                    <?php echo "<b>".$numero['pessoas']."</b>"; ?>
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
                    $juridica = mysqli_query($conn, "SELECT count(*) as juridica from pessoa WHERE tipo='jurídica'");
                    $numero = mysqli_fetch_array($juridica)
                    ?>
                    Pessoas Jurídicas Cadastradas 
                    <?php echo "<b>".$numero['juridica']."</b>";?>
                    <?php mysqli_close($conn); ?>
                    <br/><br/>
                    <?php
                    include("conecta.php");
                    $fisica = mysqli_query($conn, "SELECT count(*) as fisica from pessoa WHERE tipo='física'");
                    $numero = mysqli_fetch_array($fisica)
                    ?>
                    Pessoas Físicas Cadastradas 
                    <?php echo "<b>".$numero['fisica']."</b>";?>
                    <?php mysqli_close($conn); ?>
                    <br/>
                </div>    
        </div>
        </div>
        <div style="width: 30%; float:left; padding-left:2%; padding-right:2%">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span>&nbsp;Aniversariantes do Mês</h3></div>
                <div class="panel-body">
                    <?php
                        include("conecta.php");
                        $sql = mysqli_query($conn, "SELECT * from pessoa where month(datanascimento) = month(CURRENT_DATE())");
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
            <br/>
            <hr/>
            <div style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: DodgerBlue; color: white; text-align: center;">Agenda 2.0 Desenvolvido em Aula - Versão 1.0</div>
        </footer>
    </body>
</html>