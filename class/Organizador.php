<?php
    require_once 'Conectar.php';
    class Organizador {

		public function getFilaOrg() {
			$Conexion = new dbConn();
			$query = $Conexion->query("SELECT idorganizador FROM organizadores ORDER BY idorganizador DESC LIMIT 1");
			$fila = $query->fetch(PDO::FETCH_NUM);
			return $fila;
        }

        public function nuevoOrganizador($id_org,$nombre,$apellido,$correo,$pin) {

            try {
				$Conexion = new dbConn();
				$query = "INSERT INTO organizadores (idorganizador,nombre,apellido,correo,pin,fecha_registro)
                          VALUES (:idOrg, :nom, :ape, :email, :pin, NOW());";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idOrg', $id_org);
				$sql->bindParam(':nom', $nombre);
				$sql->bindParam(':ape', $apellido);
				$sql->bindParam(':email', $correo);
				$sql->bindParam(':pin', $pin);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		
		}

		public function obtenerOrganizador($idGrupo) {
			try {
				$query = "SELECT org.nombre,org.apellido,org.pin
							FROM rel_grupo_organizador rgo 
							INNER JOIN grupos gru ON gru.idgrupo = rgo.id_grup
							INNER JOIN organizadores org ON org.idorganizador = rgo.id_org
							WHERE gru.idgrupo = :IdGrupo;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IdGrupo', $idGrupo);
				$sql->execute();
				$organizador = $sql -> fetch(PDO::FETCH_ASSOC);
				return $organizador; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function obtenerOrganizadorxPin($pinO) {
			try {
				$query = "SELECT idorganizador,nombre,apellido
						  FROM organizadores
						  WHERE pin = :pinOrg;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':pinOrg', $pinO);
				$sql->execute();
				$idorg = $sql -> fetch(PDO::FETCH_ASSOC);
				return $idorg; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function obtenerOrganizadorCerrar($idGrupo) {
			try {
				$query = "SELECT org.idorganizador,org.nombre,org.apellido,org.fecha_registro
							FROM rel_grupo_organizador rgo 
							INNER JOIN grupos gru ON gru.idgrupo = rgo.id_grup
							INNER JOIN organizadores org ON org.idorganizador = rgo.id_org
							WHERE gru.idgrupo = :IdGrupo;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IdGrupo', $idGrupo);
				$sql->execute();
				$organizador = $sql -> fetchAll(PDO::FETCH_ASSOC);
				return $organizador; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function iniciarPanel($pin) {
			try {
				$query = "SELECT nombre,apellido,pin 
						  FROM organizadores 
						  WHERE pin = :Pin;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':Pin', $pin);
				$sql->execute();
				$organizador = $sql -> fetch(PDO::FETCH_ASSOC);
				return $organizador; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function relacionarAmigoOrg($id_org,$pinA) {

            try {
				$Conexion = new dbConn();
				$query = "INSERT INTO amigo_secreto_organizador(id_organizador,pin_amigo)
						VALUES (:idOrg, :pinAmigo) ";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idOrg', $id_org);
				$sql->bindParam(':pinAmigo', $pinA);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}

		}

		public function obtenerPinAmigo($idOrg) {
			try {
				$query = "SELECT pin_amigo
						  FROM amigo_secreto_organizador
						  WHERE id_organizador = :idO;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idO', $idOrg);
				$sql->execute();
				$pinA = $sql -> fetch(PDO::FETCH_ASSOC);
				return $pinA; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}
    }
?>