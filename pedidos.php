<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>pagina pedidos 1.0</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/nav2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <header>
        <div class="col-md-4 col-md-offset-4"><h3>pagina pedidos 1.0 - TDS - SENAI</h3></div>
        <br/><br/>
        </header>
        <nav>
            <?php
                include("menu.php");
            ?>
        </nav>
        <section>
        <br/><br/></br>
        <div style="width: 85%; padding-left:10%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Pesquisar pedidos</h3></div>
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
            </form>
        <br/>
        <center><a href="vendas.php"><button class="btn btn-primary"><b>Vender</b></button></a></center>
        <br/>
        < <br/>
        <div style="width: 85%; padding-left:5%; padding-right:5%;">
        <?php
                include("conecta.php");
                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                $sql = mysqli_query($conn, "SELECT * FROM pedidos") or die (mysqli_error($conn));
                $total = mysqli_num_rows($sql);
                $registros = 4;
                $numpaginas = ceil($total / $registros);
                $inicio = ($registros * $pagina) - $registros;
                $cmd = mysqli_query($conn, "SELECT * FROM pedidos LIMIT $inicio,$registros");
                $total = mysqli_num_rows($cmd);
                echo "<h4>Produtos Cadastrados</h4>";
                echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>Data do pedido</th>";
                echo "<th>valor</th>";
                echo "<th>Status</th>";
                echo "</tr>";
                while($pedidos= mysqli_fetch_array($cmd)){
                echo "<tr>";
                $id = $pedidos['idpedidos'];
                echo "<td>".$pedidos['idpedidos']."</td>";
                echo "<td>".$pedidos['data_pedido']."</td>";
                echo "<td>".$pedidos['valor']."</td>";
                echo "<td>".$pedidos['status_pedido']."</td>";
                    echo "<td><a href='verpessoa.php?id=$id'><button type='submit' class='btn btn-primary'>Ver</button></a>&nbsp;&nbsp;<a href='editarproduto.php?idprodutos=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagarproduto.php?idprodutos=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
                echo "</tr>";
                }
                echo "</table>";
                    for($i = 1; $i <  $numpaginas + 1; $i++){
                    echo "<a href='pedidos.php?pagina=$i'>".$i." | </a>";
                }
                mysqli_close($conn);
            ?>
            </br></br></br>
        </div>
        </section>
        <footer>
        
        </footer>
    </body>
</html>

