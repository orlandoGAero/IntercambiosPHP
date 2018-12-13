<?php
    require_once 'Conectar.php';
    class Grupo {

		public function getFilaGrupo() {
			$Conexion = new dbConn();
			$query = $Conexion->query("SELECT idgrupo FROM grupos ORDER BY idgrupo DESC LIMIT 1");
			$fila = $query->fetch(PDO::FETCH_NUM);
			return $fila;
		}

        public function nuevoGrupo($id_grupo, $grupo, $codigo_grupo, $fecha) {

            try {
				$Conexion = new dbConn();
				$query = "INSERT INTO grupos(idgrupo,nombre,codigo,fecha)
						  VALUES(:idg, :nombre, :code, :fecha);";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idg', $id_grupo);
				$sql->bindParam(':nombre', $grupo);
				$sql->bindParam(':code', $codigo_grupo);
				$sql->bindParam(':fecha', $fecha);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		

		}

		public function relacionarGrupoOrg($id_org, $id_grup) {

			try {
				$Conexion = new dbConn();
				$query = "INSERT INTO rel_grupo_organizador(id_org,id_grup)
				 		  VALUES (:IDo, :IDg)";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IDo', $id_org);
				$sql->bindParam(':IDg', $id_grup);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}
	
		}
		
		public function obtenerGrupo($nombre) {
			try {
				$query = "SELECT idgrupo,nombre,fecha FROM grupos WHERE codigo = :nomGrupo;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':nomGrupo', $nombre);
				$sql->execute();
				$grupo = $sql -> fetch(PDO::FETCH_ASSOC);
				return $grupo; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}
    }
?>