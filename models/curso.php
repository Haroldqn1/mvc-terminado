<?php

require_once "conexion.php";

//MODELO = CONTIENE LA LOGICA
//extends : HERENCIA (POO) en PHP
class Curso extends Conexion{

  //Objeto que almacena la conexion que viene desde el padre(Conexion)
  //y la comparira con todoso los metodos(CRUD+)
  private $accesoBD;

  //Constructor, INICIALIZAR
  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  //Metodo listar cursos
  public function listarCursos(){
    try{
      //1:PREPARAMOS LA CONSULTA
      $consulta = $this->accesoBD->prepare("CALL spu_cursos_listar()");
      //2:EJECUTAMOS LA CONSULTA
      $consulta->execute();
      //3:DEVOLVEMOS LA CONSULTA(array asociativo)
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  //----------------------
  public function registrarCurso(){
    try{

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  //------------------------------
  public function eliminarCurso(){
    try{

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  //---------------------------
  public function actualizarCurso(){
    try{

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}

?>