<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Cliente</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
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
        <h1 class="jumbotron bg-danger">Cadastro de Clientes</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Sistema</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
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

        <form name="cadlivro" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome do cliente" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="numidade" placeholder="Idade" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtuf" placeholder="Estado" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtcpf" placeholder="CPF" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtemail" placeholder="E-mail" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <!-- FALTA CÓDIGO -->
        <?php
          if(isset($_POST['cadastrar'])){
            include_once 'modelo/cliente.class.php';
            include_once "dao/clienteDAO.class.php";
            include_once "util/helper.class.php";
            include_once 'util/padronizacao.class.php';
            include_once 'util/validacao.class.php';

            $qtdErros = 0;

            if(!Validacao::validarNome($_POST['txtnome'])){
              $qtdErros++;
              Helper::h1("Nome inválido");
            }
            if(!Validacao::validarIdade($_POST['numidade'])){
              $qtdErros++;
              Helper::h1("Idade inválida");
            }
            if(!Validacao::validarUF($_POST['txtuf'])){
              $qtdErros++;
              Helper::h1("Estado inválido");
            }
            if(!Validacao::validarCPF($_POST['txtcpf'])){
              $qtdErros++;
              Helper::h1("CPF inválido");
            }
            if(!Validacao::validarEmail($_POST['txtemail'])){
              $qtdErros++;
              Helper::h1("Email inválido");
            }

            if($qtdErros == 0){
            $cli = new Cliente();
            $cli->nomeCliente = $_POST['txtnome'];
            $cli->idade = $_POST['numidade'];
            $cli->UF = $_POST['txtuf'];
            $cli->CPF = $_POST['txtcpf'];
            $cli->email = $_POST['txtemail'];


            $cliDAO = new ClienteDAO();
            $cliDAO->cadastrarCliente($cli);
            unset($_POST);
            Helper::h1("Cliente cadastrado com sucesso!");
            }
          }
        ?>
      </div>
  </body>
</html>
