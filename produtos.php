<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:menu.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>PRODUTOS</title>
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
        <div style="width: 50%; padding-left:15%; padding-right:20%; padding-top:10%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Pesquisar Produtos</h3></div>
                <div class="panel-body">
                    <form name="procura" id="procura" action="procura.php" method="post">
                    <label></label> 
                    <input type="text" name="procura" placeholder="Digite um Nome ou o codigo" maxlength="30" autofocus required="required" class="form-control" />
                    <br/>
                    <input type="submit" value="Procurar" class="btn btn-primary" />
                    </form>
                </div>    
        </div>
        </div>
        <br/>
        <hr/>
        <br/>
            <center><a href="cadproduto.php"><button class="btn btn-primary"><b>Cadastrar Produto</b></button></a></center>
        <br/>
        <div style="width: 85%; padding-left:5%; padding-right:5%;">
        <?php
                include("conecta.php");
                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                $sql = mysqli_query($conn, "SELECT * FROM produtos") or die (mysqli_error($conn));
                $total = mysqli_num_rows($sql);
                $registros = 4;
                $numpaginas = ceil($total / $registros);
                $inicio = ($registros * $pagina) - $registros;
                $cmd = mysqli_query($conn, "SELECT * FROM produtos LIMIT $inicio,$registros");
                $total = mysqli_num_rows($cmd);
                echo "<h4>Produtos Cadastrados</h4>";
                echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>produto</th>";
                echo "<th>valor</th>";
                echo "<th>estoque</th>";
                echo "</tr>";
                while($produtos= mysqli_fetch_array($cmd)){
                echo "<tr>";
                $id = $produtos['idprodutos'];
                echo "<td>".$produtos['idprodutos']."</td>";
                echo "<td>".$produtos['descricao']."</td>";
                echo "<td>".$produtos['valor']."</td>";
                echo "<td>".$produtos['estoque']."</td>";
                    echo "<td><a href='verpessoa.php?id=$id'><button type='submit' class='btn btn-primary'>Ver</button></a>&nbsp;&nbsp;<a href='editarpessoa.php?id=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagapessoa.php?id=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
                echo "</tr>";
                }
                echo "</table>";
                    for($i = 1; $i <  $numpaginas + 1; $i++){
                    echo "<a href='produtos.php?pagina=$i'>".$i." | </a>";
                }
                mysqli_close($conn);
            ?>
            </br></br></br>
        </div>
        </section>
        <footer>
        <div style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: DodgerBlue; color: white; text-align: center;">Putzz vendas - Surpreenda-se</div>
        </footer>
    </body>
</html>