<?php
class Cliente{

  private $idCliente;
  private $nomeCliente;
  private $idade;
  private $UF;
  private $CPF;
  private $email;


  public function __construct(){}
  public function __destruct(){}

  public function __get($a){
    return $this->$a;
  }

  public function __set($a,$v){
    $this->$a = $v;
  }

  public function __toString(){
    return nl2br("
    Nome: $this->nomeCliente
    E-mail: $this->email
    CPF: $this->CPF
    Estado: $this->UF
    Idade: $this->idade
      ");
  }


}
