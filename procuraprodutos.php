<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Putzz Vendas</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/nav2.css">
    </head>
    <body>
        <header>
        <div class="col-md-4 col-md-offset-4"><h3>Putzz Vendas - TDS - SENAI</h3></div>
        <br/><br/>
        </header>
        <nav>
            <?php
                include("menu.php");
            ?>
        </nav>
        <section>
        <br/><br/>
        <div style="width: 85%; padding-left:5%; padding-right:5%;">
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
                $letra = mysqli_query($conn, "SELECT DISTINCT LEFT(nome, 1) AS letra from produtos ORDER BY letra");
                while($letras = mysqli_fetch_array($letra)){
                    $inicial = strtoupper($letras['letra']);
                    echo '<button type="submit" class="btn btn-primary" value="'.$inicial.'" name="letra"><b>'.$inicial.'</b></button>|';
                }
            ?>
        </div>
            </form>
        <br/>
        <center><a href="cadproduto.php"><button class="btn btn-primary"><b>Cadastrar Produtos</b></button></a></center>
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
                        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE descricao LIKE '".$busca."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case($cases[1] !== ""):
                        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE descricao LIKE '".$busca2."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case($cases[0] =="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM produtos ORDER BY descricao") or die (mysqli_error($conn));
                    break;
                }
            echo "<h4>Pessoas Cadastradas</h4>";
            echo "<table class='table table-hover'>";
            echo "<tr>";
                echo "<th>código</th>";
                echo "<th>Descrição</th>";
                echo "<th>Estoque</th>";
                echo "<th>Valor</th>";
            echo "</tr>";
            while($produtos = mysqli_fetch_array($sql)){
            echo "<tr>";
                $id = $produtos['idprodutos'];
                echo "<td>".$produtos['nome']."</td>";
                echo "<td>".$produtos['descricao']."</td>";
                echo "<td>".$produtos['estoque']."</td>";
                echo "<td>".$produtos['valor']."</td>";
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
        <div style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: DodgerBlue; color: white; text-align: center;">Putzz Vendas Desenvolvido em Aula - Versão 1.0</div>
        </footer>
    </body>
</html>