<?php
class Produto{

  private $idItem;
  private $nomeItem;
  private $valor;
  private $tipo;
  private $anoLanc;
  private $empresa;

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
    Produto: $this->nomeItem
    Valor: $this->valor
    Tipo: $this->tipo
    Ano de Lançamento: $this->anoLanc
    Empresa: $this->empresa
    ");
  }


}
