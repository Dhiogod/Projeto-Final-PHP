<?php
class Validacao{

  public static function validarNome($v){
    $exp = "/^[A-Za-záÁÉéíÍóÓúÚãÃÕõñÑâÂôÔüçÇ]{2,20}[A-Za-záÁÉéíÍóÓúÚãÃÕõñÑâÂôÔüçÇ ]{0,20}$/";
    return preg_match($exp,$v);
  }

  public static function validarAnoLanc($v){
    $exp = "/^[0-9]{4}$/";
    return preg_match($exp,$v);
  }

  public static function validarIdade($v){
    $exp = "/^[0-9]{1,3}$/";
    return preg_match($exp,$v);
  }

  public static function validarEmail($v){
    $exp = "/^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$/";
    return preg_match($exp,$v);
  }

  public static function validarCPF($v){
    $exp = "/^[0-9]{11}$/";
    return preg_match($exp,$v);
  }

  public static function validarUF($v){
      $exp = "/^[A-Z]{2}$/";
      return preg_match($exp,$v);
    }

  public static function validarTXT($v){
      $exp = "/^[a-zA-Z ]{2,50}$/";
      return preg_match($exp,$v);
    }
}
