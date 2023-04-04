<?php

class Mascota{
  private $nombre;
  private $tipo;
  private $sexo;
  private $peso;

  //Constrcutor (metodo - unica ejecucion)
  public function __CONSTRUCT($nombre,$tipo,$sexo,$peso){
    $this->nombre = $nombre;
    $this->tipo = $tipo;
    $this->sexo = $sexo;
    $this->peso = $peso;
  }

  public function __GET($atributo){
    return $this->$atributo;
  }

}

$mascota = new Mascota("Larry","Perro","Macho",10);

echo $mascota->__GET("nombre");
echo $mascota->__GET("tipo");
echo $mascota->__GET("sexo");
echo $mascota->__GET("peso");

