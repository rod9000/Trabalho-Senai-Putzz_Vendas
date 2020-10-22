    
        <?php
    $tipo =  $_SESSION["tipo"];
    if($tipo === "admin"){
        echo "<ul class='nav nav-pills'>";
            echo "<li role='presentation'><a href='main.php'>HOME</a></li>";
            echo "<li role='presentation'><a href='usuario.php'>USUÁRIO</a></li>";
            echo "<li role='presentation'><a href='pessoa.php'>PESSOAS</a></li>";
            echo "<li role='presentation'><a href='expessoa.php'>PESSOAS APAGADAS</a></li>";
            echo "<li role='presentation'><a href='pedidos.php'>PEDIDOS</a></li>";
            echo "<li role='presentation'><a href='produtos.php'>PRODUTOS</a></li>";
            echo "<li role='presentation'><a href='cadprodutos.php'>CAD-PRODUTOS</a></li>";


    }
    else {   
        echo "<ul>";
        echo "<nav class='navbar'>";  
            echo "<li role='presentation'><a class='ref-btn' href='main.php'>HOME</a></li>";
            echo "<li role='presentation'><a class='ref-btn' href='pedidos.php'>PEDIDOS</a></li>";            
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'>PESSOAS ";
            echo "<i class='fa fa-caret-down'></i>";
            echo "</button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='pessoa.php'>Pessoas</a>";
            echo "<a href='cadpessoa.php'>Cadastro de Pessoas</a>";           
            echo "</div>";
            echo "</div>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'>PRODUTOS";
            echo "<i class='fa fa-caret-down'></i>";
            echo "</button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='produtos.php'>Produtos</a>";
            echo "<a href='cadproduto.php'>Cadastro de Produtos</a>";  
            echo "</div>";
            echo "</div>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'>USUARIO";
            echo "<i class='fa fa-caret-down'></i>";
            echo "</button>";
            echo "<div class='dropdown-content'>";
            echo "<div class='col-xs-4 col-xs-offset-0'>";            
            echo "<span class='glyphicon glyphicon-user' style='color:black' aria-hidden='true'></span>";
            echo $_SESSION["user"];
            echo "</br>";
            echo "</div>";
            echo "<a href='usuario.php'>Cadastrar Usuario</a>";
            echo "<a href='sair.php'>Sair</a>";
            echo "</div>";
            echo "</div>";
         echo "</nav>";   
         echo"</ul>";
}
?>
