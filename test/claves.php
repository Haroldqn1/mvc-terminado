<?php

//Tabla
$claveUsuario = "SENATI";

//1. Muy poco usado
$claveMD5 = md5($claveUsuario);

//2. Eleva los caracteres a 40
$claveSHA = sha1($claveUsuario);

//3. El mas usado y siempre muta la clave
$claveHASH = password_hash($claveUsuario, PASSWORD_BCRYPT);

//Clave acceso (LOGIN)
$claveAcceso = "SENATI";

//var_dump($claveHASH);

//Validar clave HASH
if (password_verify($claveAcceso,$claveHASH)){
  echo "Acceso correcto";
}
