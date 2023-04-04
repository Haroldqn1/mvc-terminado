<?php

class Persona{

  private $apelldios;
  private $nombres;
  private $estadoCivil;
  private $numeroHijos;
  private $telefono; 

  //metodos magicos
  public function __GET($atributo){ 
    return $this->$ atributo;
  }

  public function __SET($atributo,$valor){
    $this->$atributo = $valor;
  }
}
$persona1 = new Persona();

$persona1->__SET("apellidos","QUISPE NAPA");
$persona1->__SET("nombres","Harold Efrain");
$persona1->__SET("telefono","904207665");

echo $persona1->__GET("apellidos");
echo $persona1->__GET("nombres");
echo $persona1->__GET("telefono");