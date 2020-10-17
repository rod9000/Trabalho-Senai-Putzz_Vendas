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
            </br>
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
        <br/><br/></br>
        <div style="width: 85%; padding-left:10%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Pesquisar</h3></div>
                <div class="panel-body">
                    <form name="procura" id="procura" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label>Nome</label> 
                    <input type="text" name="procura" placeholder="Digite um nome ou uma letra" maxlength="30" autofocus class="form-control" />
                    <br/>
                    <input type="submit" value="Procurar" class="btn btn-primary" />
                </div>    
        </div>
        </div>
        <br/>
        <hr/>
        <div align="center">
            <?php
                include("conecta.php");
                $letra = mysqli_query($conn, "SELECT DISTINCT LEFT(nome, 1) AS letra from pessoas ORDER BY letra");
                while($letras = mysqli_fetch_array($letra)){
                    $inicial = strtoupper($letras['letra']);
                    echo '<button type="submit" class="btn btn-primary" value="'.$inicial.'" name="letra"><b>'.$inicial.'</b></button>|';
                }
            ?>
        </div>
            </form>
        <br/>
        <center><a href="cadpessoa.php"><button class="btn btn-primary"><b>Cadastrar Pessoa</b></button></a></center>
        <br/>
        <div style="width: 85%; padding-left:5%; padding-right:5%;">
        <?php
            if(!isset($_POST['procura']) && !isset($_POST['letra'])){
                echo "Faça a sua pesquisa!";
            } else{
                if(isset($_POST['letra'])){
                    $busca2 = trim($_POST['letra']);
                } else {
                    $busca2 = "";
                }
                $busca = trim($_POST['procura']);
                $cases = array($busca, $busca2);
                switch($cases){
                    case($cases[0] !=="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM pessoas WHERE nome LIKE '".$busca."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case($cases[1] !== ""):
                        $sql = mysqli_query($conn, "SELECT * FROM pessoas WHERE nome LIKE '".$busca2."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case($cases[0] =="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM pessoas ORDER BY nome") or die (mysqli_error($conn));
                    break;
                }
            echo "<h4>Pessoas Cadastradas</h4>";
            echo "<table class='table table-hover'>";
            echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>CPF</th>";
                echo "<th>E-mail</th>";
                echo "<th>Tipo</th>";
                echo "<th>Ações</th>";
            echo "</tr>";
            while($pessoa = mysqli_fetch_array($sql)){
            echo "<tr>";
                $id = $pessoa['idpessoas'];
                echo "<td>".$pessoa['nome']."</td>";
                echo "<td>".$pessoa['cpf']."</td>";
              
                echo "<td><a href='verpessoa.php?id=$id'><button type='submit' class='btn btn-primary'>Ver</button></a>&nbsp;&nbsp;<a href='editarpessoa.php?id=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagapessoa.php?id=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
            echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
        }
        ?>
        </div>
        </section>
        <footer>
        
        </footer>
    </body>
</html>