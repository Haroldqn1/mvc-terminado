<?php

require_once "./conexion.php"

//MODELO = CONTIENE LA LOGICA
//extends : HERENCIA (POO) en PHP
class Curso extends Conexion{

  //Objeto que almacena la conexion que viene desde el padre(Conexion)
  private $accesoBD;

  //Constructor
  public function __CONSTRUCTOR(){

  }

  //Metodo listar cursos
  public function listarCursos(){


  }
}

?>