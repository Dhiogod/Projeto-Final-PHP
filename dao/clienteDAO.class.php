<?php
  require_once 'conexaobanco.class.php';
  class ClienteDAO{

    private $conexao = null;

    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct(){ }

    public function cadastrarCliente($cli){

      try {
          $stat = $this->conexao->prepare("insert into cliente(idCliente,nomeCliente,idade,UF,CPF,email)values(null,?,?,?,?,?)");

          $stat->bindValue(1, $cli->nomeCliente);
          $stat->bindValue(2, $cli->idade);
          $stat->bindValue(3, $cli->UF);
          $stat->bindValue(4, $cli->CPF);
          $stat->bindValue(5, $cli->email);

          $stat->execute();

       } catch (PDOException $e) {
         echo 'Erro ao cadastrar cliente.';
      }
    }

    public function procurarInfoCli(){
      try{
        $stat = $this->conexao->query("select * from cliente");
        $dex = $stat->fetchAll(PDO::FETCH_CLASS, 'Cliente');
        return $dex;
      }catch(PDOException $e){
        echo "Erro ao buscar informação do cliente.";

      }
    }

  }
