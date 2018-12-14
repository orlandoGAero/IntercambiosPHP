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
				$query = "SELECT org.nombre,org.apellido,org.fecha_registro
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
    }
?>