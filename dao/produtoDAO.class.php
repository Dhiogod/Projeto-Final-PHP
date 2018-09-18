<?php
  require_once 'conexaobanco.class.php';
  class ProdutoDAO{

    private $conexao = null;

    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct(){ }

    public function cadastrarProduto($prod){

      try {
          $stat = $this->conexao->prepare("insert into produto(idItem,nomeItem,valor,tipo,anoLanc,empresa)values(null,?,?,?,?,?)");

          $stat->bindValue(1, $prod->nomeItem);
          $stat->bindValue(2, $prod->valor);
          $stat->bindValue(3, $prod->tipo);
          $stat->bindValue(4, $prod->anoLanc);
          $stat->bindValue(5, $prod->empresa);

          $stat->execute();

       } catch (PDOException $e) {
         echo 'Erro ao cadastrar Produto.';
      }
    }

    public function procurarInfoProd(){
      try{
        $stat = $this->conexao->query("select * from produto");
        $dex = $stat->fetchAll(PDO::FETCH_CLASS, 'Produto');
        return $dex;
      }catch(PDOException $e){
        echo "Erro ao buscar informação do Produto.";

      }
    }

  }
