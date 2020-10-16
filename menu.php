<?php
    $tipo =  $_SESSION["tipo"];
    if($tipo === "admin"){
        echo "<ul class='nav nav-pills'>";
            echo "<li role='presentation'><a href='agenda.php'>HOME</a></li>";
            echo "<li role='presentation'><a href='usuario.php'>USUÁRIO</a></li>";
            echo "<li role='presentation'><a href='pessoa.php'>PESSOAS</a></li>";
            echo "<li role='presentation'><a href='expessoa.php'>PESSOAS APAGADAS</a></li>";
            echo "<li role='presentation'><a href='pedidos.php'>PEDIDOS</a></li>";
        echo "<li role='presentation'><a href='produtos.php'>PRODUTOS</a></li>";
        echo "<li role='presentation'><a href='cadprodutos.php'>CAD-PRODUTOS</a></li>";
        echo "</ul>";
    }
    else {
        echo "<ul class='nav nav-pills'>";
            echo "<li role='presentation'><a href='agenda.php'>HOME</a></li>";
            echo "<li role='presentation'><a href='pessoa.php'>PESSOAS</a></li>";
            echo "<li role='presentation'><a href='agenda.php'>HOME</a></li>";
            echo "<li role='presentation'><a href='pessoa.php'>PESSOAS</a></li>";
            echo "<li role='presentation'><a href='pedidos.php'>PEDIDOS</a></li>";
            echo "<li role='presentation'><a href='produtos.php'>PRODUTOS</a></li>";
        echo "</ul>";
    }
?>
