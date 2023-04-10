<?php
require_once '../models/curso.php';

if(isset($_POST['operacion'])){
  $curso = new Curso();
  
  if($_POST['operacion'] == 'listar'){

    $datosObtenidos = $curso->listarCursos();
    //En esta ocasion NO enviaremos un objeto JSON, en su lugar
    //el controlador renderizara las filas que necesita <tbdy></tbdy>
    //echo json_encode($datosObtenidos);

    //Paso 1: Verificar que el objeto contenga datos
    if($datosObtenidos){
      $numeroFila = 1;
      //PASO 2 : Recorrer todo el objeto
      foreach($datosObtenidos as $curso){
        // paso 3: Ahora construimos las filas
        echo"
        <tr>
          <td>{$numeroFila}</td>
          <td>{$curso['nombrecurso']}</td>
          <td>{$curso['especialidad']}</td>
          <td>{$curso['complejidad']}</td>
          <td>{$curso['fechainicio']}</td>
          <td>{$curso['precio']}</td>
          <td>
          <a href='#' data-idcurso='{$curso['idcurso']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash-fill'></i></a>
          <a href='#' data-idcurso='{$curso['idcurso']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
          </td>
        </tr>
        ";
        $numeroFila++;
      } //FIN DEL FOREACH
    }

  }

  if($_POST['operacion'] == 'registrar'){
    //Paso 1: Recoger los datos que nos envia la vista(FORM, Utilizando AJAX)
    $datosForm = [
      "nombrecurso"    => $_POST['nombrecurso'],
      "especialidad"  => $_POST['especialidad'],
      "complejidad"   => $_POST ['complejidad'],
      "fechainicio"   => $_POST['fechainicio'],
      "precio"        => $_POST['precio']
    ];

    //Paso 02: Enviar el arreglo como parametro del metodo registrar
    $curso->registrarCurso($datosForm);
  }

  if ($_POST['operacion'] == 'eliminar'){
    $curso->eliminarCurso($_POST['idcurso']);
  }

  if ($_POST['operacion'] == 'obtenercurso'){
    $registro = $curso->getCurso($_POST['idcurso']);
    echo json_encode($registro);
  }
}