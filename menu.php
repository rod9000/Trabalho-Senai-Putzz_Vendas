
        <?php
        session_start();
        $tipo =  $_SESSION["tipo"];
        if ($tipo === "admin") {
          echo "<nav>";
          echo "<ul>";
          echo "<li><a href='main.php'>Home</a></li>";
          echo "<li>";
          echo "<a href='#0'>Pedidos</a>";
          echo  "<ul>";
          echo "<li><a href='pedidos.php'>pedidos</a></li>";
          echo  "<li><a href='vendas.php'>Vendas</a></li>";
          echo "</ul>";
          echo "</li>";
          echo "<li>";
          echo "<a href='#0'>Pessoas</a>";
          echo  "<ul>";
          echo "<li><a href='pessoa.php'>pessoas</a></li>";
          echo  "<li><a href='cadpessoa.php'>Cadastrar pessoas</a></li>";
          echo "</ul>";
          echo "</li>";
          echo "<li>";
          echo "<a href='#0'>Produtos</a>";
          echo  "<ul>";
          echo  "<li><a href='produtos.php'>Produtos</a></li>";
          echo  "<li><a href='cadproduto.php'>Cadastro de Produtos</a></li>";
          echo "</ul>";
          echo "</li>";
          echo  "<li><a href='#0'>Usuários</a>";
          echo  "<ul>";
          echo "<li><a>User:     " . $_SESSION['user'] . "</a></li>";
          echo  "<li><a href='usuario.php'>Cadastro de Usuários</a></li>";
          echo  "<li><a href='sair.php'>Sair</a></li>";
          echo "</ul>";
          echo "</li>";
          echo "</ul>";
          echo "</nav>";
        } else {
          echo "<nav>";
          echo "<ul>";
          echo "<li><a href='main.php'>Home</a></li>";
          echo "<li>";
          echo "<a href='#0'>Pedidos</a>";
          echo  "<ul>";
          echo "<li><a href='pedidos.php'>pedidos</a></li>";
          echo  "<li><a href='vendas.php'>Vendas</a></li>";
          echo "</ul>";
          echo "</li>";
          echo "<li>";
          echo "<a href='#0'>Pessoas</a>";
          echo  "<ul>";
          echo "<li><a href='pessoa.php'>pessoas</a></li>";
          echo  "<li><a href='cadpessoa.php'>Cadastrar pessoas</a></li>";
          echo "</ul>";
          echo "</li>";
          echo "<li>";
          echo "<a href='#0'>Produtos</a>";
          echo  "<ul>";
          echo  "<li><a href='produtos.php'>Produtos</a></li>";
          echo  "<li><a href='cadproduto.php'>Cadastro de Produtos</a></li>";
          echo "</ul>";
          echo "</li>";
          echo  "<li><a href='#0'>Usuários</a>";
          echo  "<ul>";
          echo "<li><a>User:     " . $_SESSION['user'] . "</a></li>";
          echo  "<li><a href='usuario.php'>Cadastro de Usuários</a></li>";
          echo  "<li><a href='sair.php'>Sair</a></li>";
          echo "</ul>";
          echo "</li>";
          echo "</ul>";
          echo "</nav>";
        }
        ?>
  
