CREATE DATABASE senati;
 USE senati; 
 
  CREATE TABLE cursos(
idcurso 	INT AUTO_INCREMENT PRIMARY KEY,
nombrecurso 	VARCHAR(50) 	NOT NULL,
especialidad 	VARCHAR(70)	NOT NULL,
complejidad 	CHAR(1) 	NOT NULL DEFAULT 'B',
fechainicio 	DATE 		NOT NULL,
precio 		DECIMAL(7,2) 	NOT NULL,
fechacreacion 	DATETIME 	NOT NULL DEFAULT NOW(),
fechaupdate   	DATETIME 	NULL,
estado		CHAR(1)		NOT NULL DEFAULT '1'
 )ENGINE = INNODB;
 
 INSERT INTO cursos (nombrecurso,especialidad,complejidad,fechainicio,precio) VALUES
	('Java','ETI','M','2023-05-10',180),
	('Desarrollo Web','ETI','B','2023-05-20',190),
	('Excel financiero','Administracion','A','2023-04-14',250),
	('ERP SAP','Administracion','A','2023-05-11',400),
	('Inventor','Mecanica','M','2023-05-29',380);

SELECT * FROM cursos;

-- STORE PROCEDURE
-- Un precedimiento almacenado es un PROGRAMA que se ejecuta desde el
-- motot de BD y que permite recibir valores de entrada, reaizar
-- diferentes tipos de calculo y entregar un salida

DELIMITER $$ -- El $$ hace referencia fin del ciclo
CREATE PROCEDURE spu_cursos_listar()
BEGIN
	SELECT 	idcurso,
		nombrecurso,
		especialidad,
		complejidad,
		fechainicio,
		precio
	 FROM cursos
	 WHERE estado = '1'
	 ORDER BY idcurso DESC;
END $$
CALL spu_cursos_listar()


-- PAR REGISTRAR CURSOS
DELIMITER $$
CREATE PROCEDURE spu_registrar_cursos(
	IN _nombrecurso 	VARCHAR(50),
	IN _especialidad 	VARCHAR(70),
	IN _complejidad 	CHAR(1),
	IN _fechainicio 	DATE,
	IN _precio			DECIMAL(7,2)
)
BEGIN
	INSERT INTO cursos(nombrecurso,especialidad,complejidad,fechainicio,precio)
	VALUES (_nombrecurso,_especialidad,_complejidad,_fechainicio,_precio);
END $$

CALL spu_registrar_cursos('Python','ETI','B','2023-05-10','150');

CALL spu_cursos_listar()

-- PROCEDIMIENTO ELIMINAR

CALL spu_cursos_eliminar();


-- Lumes 10 de Abril 2023
-- Actualizar
DELIMITER $$
CREATE PROCEDURE spu_cursos_recuperar_id(IN _idcurso INT)
BEGIN
	SELECT * FROM cursos WHERE idcurso = _idcurso;
END;

CALL spu_cursos_recuperar_id(3);


DELIMITER $$
CREATE PROCEDURE spu_cursos_actualizar
(
	IN _idcurso			INT,
	IN _nombrecurso	VARCHAR(50),
	IN _especialidad	VARCHAR(70),
	IN _complejidad	CHAR(1),
	IN _fechainicio	DATE,
	IN	_precio			DECIMAL(7,2)
)
BEGIN
	UPDATE cursos SET
	nombrecurso 	= _nombrecurso,
	especialidad 	= _especialidad,
	complejidad 	= _complejidad,
	fechainicio 	= _fechainicio,
	precio 			= _precio,
	fechaupdate 	= NOW()
	WHERE idcurso = _idcurso;
END $$

CALL spu_cursos_actualizar(10,'Orientacion a la IA','ETI','A','2023-05-11','250');

SELECT * FROM cursos;


CREATE TABLE usuarios
(
	idusuario 		INT AUTO_INCREMENT PRIMARY KEY,
	nombreusuario	VARCHAR(30) 	NOT NULL,
	claveacceso 	VARCHAR(90) 	NOT NULL,
	apellidos		VARCHAR(30)		NOT NULL,
	nombres			VARCHAR(30)		NOT NULL,
	nivel 			CHAR(1) 			NOT NULL DEFAULT 'A',
	estado			CHAR(1)			NOT NULL DEFAULT '1',
	fecharegistro 	DATETIME 		NOT NULL DEFAULT NOW(),
	fechaupdate		DATETIME 		NULL,
	CONSTRAINT un_nombreusuario_usa UNIQUE(nombreusuario)
)ENGINE = INNODB;

INSERT INTO usuarios (nombreusuario,claveacceso,apellidos,nombres) VALUES 	('HAROLD','123456','Quispe Napa','Harold Efrain'),
				('Carlos','123456','Flores Almeyda','Carlos Juan');
				
SELECT * FROM usuarios;

























