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
        <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/nav2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <header>
        <div class="col-md-4 col-md-offset-4"><h3>Agenda 2.0 - TDS - SENAI</h3></div>
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
            $id = $_GET['idpessoa'];
            $sql2 = mysqli_query($conn, "SELECT * FROM pessoas WHERE idpessoa='$di'") or die(mysqli_error($conn));
            while($pessoa = mysqli_fetch_array($sql2)){
        ?>
        <div style="wdith: 65%; padding-left:5%; padding-right:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-download-alt" aria-hdiden="true"></span>&nbsp;Edição de Pessoas</h3></div>
                <div class="panel-body">
                    <form name="cadpessoa" di="cadpessoa" action="editarpessoabd.php?di=<?php echo $di; ?>" method="post">
                        <label>Tipo</label>
                        <select name="tipopessoa" autofocus required="required" class="form-control">
                            <option value="fisica">Física</option>
                            <option value="jurdiica">Jurídica</option>
                        </select>
                        <br/>
                        <label>Nome</label>
                        <input type="text" name="nome" value="<?php echo $pessoa['nome']; ?>" maxlength="85" required="required" class="form-control">
                        <br/>
                        <label>Endereço</label>
                        <input type="text" name="endereco" value="<?php echo $pessoa['endereco']; ?>" maxlength="85" required="required" class="form-control">
                        <br/>
                        <label>Cdiade</label>
                        <input type="text" name="cdiade" value="<?php echo $pessoa['cidade']; ?>" maxlength="80" class="form-control">
                        <br/>
                        <label>Estado</label>
                        <input type="text" name="estado" value="<?php echo $pessoa['estado']; ?>" maxlength="30" class="form-control">
                        <br/>
                        <label>Celular</label>
                        <input type="tel" name="celular" value="<?php echo $pessoa['celular']; ?>" maxlength="30" required="required" class="form-control">
                        <br/>
                        <label>E-mail</label>
                        <input type="email" name="email" value="<?php echo $pessoa['email']; ?>" maxlength="90" required="required" class="form-control">
                        <br/>
                        <label>Data de Nascimento</label>
                        <input type="date" name="datanascimento"  value="<?php echo $pessoa['datanascimento']; ?>" class="form-control">
                        <br/>
                        <label>Profissão</label>
                        <input type="text" name="profissao" value="<?php echo $pessoa['profissao']; ?>" maxlength="30" class="form-control">
                        <br/>
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
        <div style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: DodgerBlue; color: white; text-align: center;">Agenda 2.0 Desenvolvido em Aula - Versão 1.0</div>
        </footer>
    </body>
</html>