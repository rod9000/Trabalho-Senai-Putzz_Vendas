<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de Produtos</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <header>
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
        <div style="width: 65%; padding-left:5%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp;Cadastro de Produtos</h3></div>
                <div class="panel-body">
                    <form name="cadproduto" id="cadproduto" action="cadastraproduto.php" method="post">
                        <label>Código</label>
                        <input type="int" name="codigo" placeholder="Digite o código" maxlength="85" required="required" class="form-control">
                        <br/>
                        <label>Estoque</label>
                        <input type="int" name="estoque" placeholder="Digite o estoque" maxlength="10" required="required" class="form-control">
                        <br/>
                        <label>Descrição</label>
                        <input type="text" name="descricao" placeholder="Coloque a descrição do produto" maxlength="100" required="required" class="form-control">
                        <br/>
                        <label>Valor</label>
                        <input type="text" name="valor" placeholder="Coloque o valor do produto" maxlength="100" required="required" class="form-control">
                        </br>
                        <input type="submit" value="Cadastrar" class="btn btn-primary"/>
                    </form>
                </div>    
        </div>
        </div>
        </section>
        <footer>
    </body>
</html>