<?php
    session_start();
    //if($_SESSION["status"] !="OK"){
    //    header('location:index.php');
    //}
    //if($_SESSION["tipo"] !="admin"){
    //    header('location:agenda.php');
    //}
    ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de usuarios</title>
        <meta charset = "UTF-8"/>
        <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/nav2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <header>
        <br/><br/>
        </header>
        <nav>
            <?php
                include("menu.php");
            ?>
        </nav>
        <section>
        <br/><br/>
        <div style="width: 35%; float:left;padding-top:5%; padding-left:5%;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Cadastro de Usuários</h3></div>
                <div class="panel-body">
                    <form name="usuario" id="cadusuario" action="cadusuario.php" method="post">
                    <label>Nome</label> 
                    <input type="text" name="nome" placeholder="Digite o seu nome" maxlength="30" autofocus required="required" class="form-control" />
                    <br/>
                    <label>Login</label> 
                    <input type="text" name="login" placeholder="Digite o seu login" maxlength="30"  required="required" class="form-control" />
                    <br/>
                    <label>Senha</label> 
                    <input type="password" name="senha" placeholder="Digite a sua senha" maxlength="30"  required="required" class="form-control" />
                    <br/>
                    <label>Tipo do usuário</label>
                    <select name="tipo" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="normal">Vendedor</option>
                    </select>
                    <br/>
                    <input type="submit" value="Cadastrar" class="btn btn-primary" />
                    </form>
                </div>    
        </div>
        </div>
        <div style="width: 45%; float:right;padding-top:5%; padding-right:5%;">
        <?php
            include("conecta.php");
            echo "<h4>Usuários Cadastrados</h4>";
            $sql = mysqli_query($conn, "SELECT * FROM usuarios");
            echo "<table class='table table-hover'>";
            echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Login</th>";
                echo "<th>Tipo</th>";
                echo "<th>Ações</th>";
            echo "</tr>";
            while($usuario = mysqli_fetch_array($sql)){
            echo "<tr>";
                $id = $usuario['idusuarios'];
                echo "<td>".$usuario['nome']."</td>";
                echo "<td>".$usuario['login']."</td>";
                echo "<td>".$usuario['tipo']."</td>";
                echo "<td><a href='editausuario.php?idusuarios=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagausuario.php?idpessoa=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
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