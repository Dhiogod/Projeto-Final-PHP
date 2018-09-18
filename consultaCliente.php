<?php
include_once "modelo/cliente.class.php";
include_once "dao/clienteDAO.class.php";
include_once "util/helper.class.php";
$cliDAO = new ClienteDAO();
$clientes = $cliDAO->procurarInfoCli();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Consulta de Cliente</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <style>
    .jumbotron{
      font-family: "Century Gothic";
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="jumbotron bg-danger">Consulta de Produtos</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Sistema</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadProduto.php">Cadastro de Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultaProduto.php">Consulta de Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadCliente.php">Cadastro de Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultaCliente.php">Consulta de Clientes</a>
          </li>
        </ul>
      </div>
    </nav>
      <h2>Consulta de clientes</h2>
      <?php
      if(count($clientes) == 0){
        echo "<h4>Sem clientes cadastrados no banco!</h4>";
        die();
      }
      ?>
      <div class="table responsive">
        <table class="table table-bordered table-hover table condensed">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Idade</th>
              <th>CPF</th>
              <th>Estado</th>
              <th>E-mail</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Idade</th>
              <th>CPF</th>
              <th>Estado</th>
              <th>E-mail</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              foreach($clientes as $c){
              echo "<tr>";
              echo "<td>$c->idCliente</td>";
              echo "<td>$c->nomeCliente</td>";
              echo "<td>$c->idade</td>";
              echo "<td>$c->CPF</td>";
              echo "<td>$c->UF</td>";
              echo "<td>$c->email</td>";
              echo "</td>";
             }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
