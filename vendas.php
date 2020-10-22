<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>VENDAS</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="imagens/icomush.ico" type="images/icon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/nav2.css">
  <link rel="stylesheet" type="text/css" href="css/vendas.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
  <nav>
    <?php
    include("menu.php");
    ?>
  </nav>
  <div style="padding-top:10%;">
  <div class="prod">
    <label>Codigo</label>
    <input type="text" name="endereco" value="<?php echo $codigo['codigo']; ?>" maxlength="85" required="required" class="form-control">
    <br />
    <label for="">Produto</label>
    <select id="produto">
      <option value="vendedor">$descricao</option>
      <option value="cliente">Cliente</option>
    </select>
    <script>
      $(document).ready(function() {
        $('#produto').select2();
      });
    </script>
    </br>
    <label>Valor</label>
    <input type="text" name="valor" value="<?php echo $valor['valor']; ?>" maxlength="85" required="required" class="form-control">
    <br />
    <label>Quantidade em Estoque</label>
    <input type="text" name="estoque" value="<?php echo $estoque['estoque']; ?>" maxlength="85" required="required" class="form-control">
    <br />
    <label>Quantidade a vender</label>
    <input type="text" name="qtdvenda" value="<?php echo $qtdvenda; ?>" maxlength="85" required="required" class="form-control">
    <br />
    <label>Status</label>
    <input type="text" name="status" value="<?php echo $status['status_produto']; ?>" maxlength="85" required="required" class="form-control">
    <br />
    <button type='submit' class='btn btn-success'>Adicionar</button>
  </div>
  


  <div style="width: 45%;float:right; padding-right:50%;">

    <table class='table table-hover'>
      <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Total</th>
      </tr>

      <tr>

        <td>".$usuario['descricao']."</td>";
        <td>".$usuario['valor']."</td>";
        <td>".$usuario['qtdvenda']."</td>";
        <td>".$usuario['status_produto']."</td>";
        <td>".$usuario['$total']."</td>";
        <td><a href='editausuario.php?id=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagausuario.php?id=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>
      </tr>
  </div>
    </div>

</body>
</html>