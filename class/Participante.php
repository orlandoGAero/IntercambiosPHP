<?php
    require_once 'Conectar.php';
    class Participante {

        public function getFilaPar() {
			$Conexion = new dbConn();
			$query = $Conexion->query("SELECT idparticipante FROM participantes ORDER BY idparticipante DESC LIMIT 1;");
			$fila = $query->fetch(PDO::FETCH_NUM);
			return $fila;
		}
		
		public function relacionarGrupoPar($id_par, $id_grup) {

			try {
				$Conexion = new dbConn();
				$query = "INSERT INTO rel_grupo_participante(idparticipante,idgrupo)
				 		  VALUES (:IDp, :IDg)";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IDp', $id_par);
				$sql->bindParam(':IDg', $id_grup);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}
	
		}

        public function nuevoParticipante($id_par,$nombre,$apePa,$apeMa,$correo,$pin) {

            try {
				$Conexion = new dbConn();
				$query = "INSERT INTO participantes (idparticipante,nombre,apellidop,apellidom,correo,pin,fecha_registro)
                          VALUES (:idPar, :nom, :apeP, :apeM, :email, :pin, NOW());";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idPar', $id_par);
				$sql->bindParam(':nom', $nombre);
				$sql->bindParam(':apeP', $apePa);
				$sql->bindParam(':apeM', $apeMa);
				$sql->bindParam(':email', $correo);
				$sql->bindParam(':pin', $pin);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}

		}

		public function consultarParticipante($idGrupo) {
			try {
				$query = "SELECT par.nombre,par.apellidop,par.apellidom,par.fecha_registro
						FROM rel_grupo_participante rgp 
						INNER JOIN grupos grup ON grup.idgrupo = rgp.idgrupo
						INNER JOIN participantes par ON par.idparticipante = rgp.idparticipante
						WHERE grup.idgrupo = :IdGrupo ORDER BY par.idparticipante DESC LIMIT 1;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IdGrupo', $idGrupo);
				$sql->execute();
				$filaRtn = $sql -> rowCount();
				return $filaRtn; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function obtenerAmigo($idGrupo) {
			try {
				$query = "SELECT par.nombre,par.apellidop,par.apellidom
						FROM rel_grupo_participante rgp 
						INNER JOIN grupos grup ON grup.idgrupo = rgp.idgrupo
						INNER JOIN participantes par ON par.idparticipante = rgp.idparticipante
						WHERE grup.idgrupo = :IdGrupo AND par.fecha_registro < NOW() ORDER BY par.fecha_registro DESC LIMIT 1;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IdGrupo', $idGrupo);
				$sql->execute();
				$amigo = $sql -> fetch(PDO::FETCH_ASSOC);
				return $amigo; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function obtenerParticipantes($idGrupo) {
			try {
				$query = "SELECT par.nombre,par.apellidop,par.apellidom
						  FROM rel_grupo_participante rgp 
						  INNER JOIN grupos grup ON grup.idgrupo = rgp.idgrupo
						  INNER JOIN participantes par ON par.idparticipante = rgp.idparticipante
						  WHERE grup.idgrupo = :IdGrupo;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':IdGrupo', $idGrupo);
				$sql->execute();
				$participantes = $sql -> fetchAll(PDO::FETCH_ASSOC);
				return $participantes; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

    }
?>