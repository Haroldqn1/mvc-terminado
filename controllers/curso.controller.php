<?php
require_once '../models/curso.php';

if(isset($_POST['operacion'])){
  $curso = new Curso();
  
  if($_POST['operacion'] == 'listar'){

    $datosObtenidos = $curso->listarCursos();
    echo json_encode($datosObtenidos);
  }
}