<?php
	/**
	* FUNCIÓN para conectar con la Base de Datos.
	*/
	class dbConn extends PDO
	{
		public function __construct()
		{
			try{
				//conexion servidor
				// parent::__construct('mysql:host=localhost;dbname=intercambios','desarrollo','entraradmin');
				//conexion local
				parent::__construct('mysql:host=localhost;dbname=intercambios','root','');
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				parent::query('SET NAMES utf8');
			}catch(Exception $ex){
				die('La Base de Datos no existe!');
			}
		}
	}
?>