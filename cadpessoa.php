<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de Pessoas</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icon.ico" type="image/x-icon"/>
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
        <div style="width: 65%; padding-left:5%;padding-top:10%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp;Cadastro de Pessoas</h3></div>
                <div class="panel-body">
                    <form name="cadpessoa" id="cadpessoa" action="cadastrapessoa.php" method="post">
                        <label>Tipo da Pessoa</label>
                        <select name="tipopessoa" autofocus required="required" class="form-control">
                            <option value="vendedor">Vendedor</option>
                            <option value="cliente">Cliente</option>
                        </select>
                        <br/>
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite seu nome" maxlength="85" required="required" class="form-control">
                        <br/>
                        <label>Endereço</label>
                        <input type="text" name="endereço" placeholder="Digite seu endereço" maxlength="85" required="required" class="form-control">
                        <br/>
                        <label>Cidade</label>
                        <input type="text" name="cidade" placeholder="A cidade onde mora" maxlength="80" required="required" class="form-control">
                        <br/>
                        <label>CPF</label>
                        <input type="text" name="CPF" placeholder="Digite seu CPF" maxlength="80" required="required" class="form-control">
                        <br/>
                        <label>Telefone</label>
                        <input type="int" name="numero" placeholder="Número para contato" maxlength="30" required="required" class="form-control">
                        <br/>
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Digite seu email" maxlength="30" required="required" class="form-control">
                        <br/>
                        <input type="submit" value="Cadastrar" class="btn btn-primary" />
                    </form>
                </div>    
        </div>
        </div>
        </section>
        <footer>
        </footer>
    </body>
</html>