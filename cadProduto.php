<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Produto</title>
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
        <h1 class="jumbotron bg-danger">Cadastro de Produtos</h1>

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

        <form name="cadlivro" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome do produto" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtvalor" placeholder="Valor do Produto" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtanolanc" placeholder="Ano de Lançamento" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtempresa" placeholder="Empresa Distribuidora" class="form-control">
          </div>
          <div class="form-group">
            <select name="seltipo" class="form-control">
              <option value="-----------">-------------------</option>
              <option value="Jogo de Tabuleiro">Jogo de tabuleiro</option>
              <option value="Jogo de videogame">Jogo de videogame</option>
              <option value="Quadrinho/Mangá">Quadrinho/Mangá</option>
              <option value="Cardgame">Cardgame</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <!-- FALTA CÓDIGO -->
        <?php
        if(isset($_POST['cadastrar'])){
            include_once "modelo/produto.class.php";
            include_once "dao/produtoDAO.class.php";
            include_once "util/helper.class.php";
            include_once 'util/padronizacao.class.php';
            include_once 'util/validacao.class.php';

            $qtdErros = 0;

            if(!Validacao::validarNome($_POST['txtnome'])){
              $qtdErros++;
              Helper::h1("Nome inválido");
            }
            if(!Validacao::validarAnoLanc($_POST['txtanolanc'])){
              $qtdErros++;
              Helper::h1("Ano inválido");
            }
            if(!Validacao::validarNome($_POST['txtempresa'])){
              $qtdErros++;
              Helper::h1("Empresa inválida");
            }
            if(!Validacao::validarNome($_POST['seltipo'])){
              $qtdErros++;
              Helper::h1("Tipo inválido");
            }

            if($qtdErros == 0){
            $prod = new Produto();
            $prod->nomeItem = $_POST['txtnome'];
            $prod->valor = $_POST['txtvalor'];
            $prod->anoLanc = $_POST['txtanolanc'];
            $prod->empresa = $_POST['txtempresa'];
            $prod->tipo = $_POST['seltipo'];

            $prodDAO = new ProdutoDAO();
            $prodDAO->cadastrarProduto($prod);
            unset($_POST);
            Helper::h1("Produto cadastrado com sucesso!");
            }
          }
        ?>
      </div>
  </body>
</html>
