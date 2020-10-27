<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Putzz</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/nav2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <header>
        <div class="col-md-4 col-md-offset-4"><h3>Putzz Vendas </h3></div>
        <br/><br/>
        </header>
        <nav>
            <?php
                include("menu.php");
            ?>
        <br/>
        </nav>
        <section>
        <br/><br/>  
        <?php
            include("conecta.php");
            $id = $_GET['idprodutos'];
            $sql2 = mysqli_query($conn, "SELECT * FROM produtos WHERE idprodutos='$id'") or die(mysqli_error($conn));
            while($usuarios = mysqli_fetch_array($sql2)){
        ?>
        <div style="width: 65%; padding-left:5%;padding-top:5%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp;Edição de Produtos</h3></div>
                <div class="panel-body">
                    <form name="cadastraproduto" id="cadastraproduto" action="editarproduto.php?id=<?php echo $id; ?>" method="post">
                        <br/>
                        <label>Descrição</label>
                        <input type="text" name="descricao" value="<?php echo $usuarios['descricao']; ?>" maxlength="85" required="required" class="form-control">
                        <br/>
                        <label>Estoque</label>
                        <input type="int" name="estoque" value="<?php echo $usuarios['estoque']; ?>" maxlength="80" required="required" class="form-control">
                        <br/>
                        <label>valor</label>
                        <input type="decimal" name="valor" value="<?php echo $usuarios['valor']; ?>" maxlength="30" required="required" class="form-control">
                        <br/>
                        <label>Status</label>
                        <input type="tinyint" name="status_produto" value="<?php echo $usuarios['status_produto']; ?>" maxlength="1" required="required" class="form-control">
                        <input type="submit" value="Atualizar" class="btn btn-primary" />
                    </form>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                </div>    
        </div>
        </div>
        </section>
        <footer>
        <div style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: DodgerBlue; color: white; text-align: center;">Putzz Vendas  - Versão 1.0</div>
        </footer>
    </body>
</html>