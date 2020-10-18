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
        <br/>
        </nav>
        <section>
        <br/><br/>
        <div style="width: 85%; padding-left:5%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Pesquisar</h3></div>
                <div class="panel-body">
                    <form name="procura" id="procura" action="procura.php" method="post">
                    <label>Nome</label> 
                    <input type="text" name="procura" placeholder="Digite um nome ou uma letra" maxlength="30" autofocus required="required" class="form-control" />
                    <br/>
                    <input type="submit" value="Procurar" class="btn btn-primary" />
                    </form>
                </div>    
        </div>
        </div>
        <br/>
        <hr/>
        <div align="center">
        <?php
                include("conecta.php");
                $letra = mysqli_query($conn, "SELECT DISTINCT LEFT(nome, 1) AS letra from pessoa ORDER BY letra");
                echo '<form action="pessoa2.php" method="POST">';
                while($letras = mysqli_fetch_array($letra)){
                    $inicial = strtoupper($letras['letra']);
                    echo '<button type="submit" class="btn btn-primary" value="'.$inicial.'" name="letra"><b>'.$inicial.'</b></button>|';
                }
                echo '</form>';
                mysqli_close($conn);
            ?>
        </div>
        <br/>
        <center><a href="cadpessoa.php"><button class="btn btn-primary"><b>Cadastrar Pessoa</b></button></a></center>
        <br/>
        <div style="width: 85%; padding-left:5%; padding-right:5%;">
        <?php
            include("conecta.php");
            echo "<h4>Pessoas Pesquisadas por Nome</h4>";
            $nome = $_POST['procura'];
            $sql = mysqli_query($conn, "SELECT * FROM pessoa WHERE nome LIKE '%".$nome."%'");
            echo "<table class='table table-hover'>";
            echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Celular</th>";
                echo "<th>E-mail</th>";
                echo "<th>Tipo</th>";
                echo "<th>Ações</th>";
            echo "</tr>";
            while($pessoa = mysqli_fetch_array($sql)){
            echo "<tr>";
                $id = $pessoa['id'];
                echo "<td>".$pessoa['nome']."</td>";
                echo "<td>".$pessoa['celular']."</td>";
                echo "<td>".$pessoa['email']."</td>";
                echo "<td>".$pessoa['tipo']."</td>";
                echo "<td><a href='verpessoa.php?id=$id'><button type='submit' class='btn btn-primary'>Ver</button></a>&nbsp;&nbsp;<a href='editarpessoa.php?id=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagapessoa.php?id=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
            echo "</tr>";
            }
            mysqli_close($conn);
        ?>
        </div>
        </section>
        <footer>
        <div style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: DodgerBlue; color: white; text-align: center;">Agenda 2.0 Desenvolvido em Aula - Versão 1.0</div>
        </footer>
    </body>
</html>