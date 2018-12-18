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
				$query = "SELECT par.nombre,par.apellidop,par.apellidom,par.pin
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

		public function obtenerAmigoxPinAmigo($pinA) {
			try {
				$query = "SELECT nombre,apellidop,apellidom
							FROM participantes
							WHERE pin = :pinAmigo;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':pinAmigo', $pinA);
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

		public function obtenerParticipanteDuplicado($nom,$apPat,$apMat,$idGrupo) {
			try {
				$query = "SELECT par.nombre,par.apellidop,par.apellidom
						FROM rel_grupo_participante rgp 
						INNER JOIN grupos grup ON grup.idgrupo = rgp.idgrupo
						INNER JOIN participantes par ON par.idparticipante = rgp.idparticipante					
						WHERE par.nombre = :Nombre 
						AND par.apellidop = :apP 
						AND par.apellidom = :apM 
						AND grup.idgrupo = :IdGrupo;
				";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':Nombre', $nom);
				$sql->bindParam(':apP', $apPat);
				$sql->bindParam(':apM', $apMat);
				$sql->bindParam(':IdGrupo', $idGrupo);
				$sql->execute();
				$filas = $sql -> rowCount();
				return $filas; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function relacionarAmigo($id_par,$pinA) {

            try {
				$Conexion = new dbConn();
				$query = "INSERT INTO amigo_secreto(id_participante,pin_amigo)
						VALUES (:idPar, :pinAmigo); ";
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idPar', $id_par);
				$sql->bindParam(':pinAmigo', $pinA);
				$result = $sql->execute();
				
				return $result;
			} catch(PDOException $e) {
				print $e->getMessage();
			}

		}

		public function verInfo($pin) {
			try {
				$query = "SELECT idparticipante,nombre,apellidop,apellidom,pin 
						  FROM participantes
						  WHERE pin = :Pin;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':Pin', $pin);
				$sql->execute();
				$participante = $sql -> fetch(PDO::FETCH_ASSOC);
				return $participante; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

		public function obtenerPinAmigoPart($idPart) {
			try {
				$query = "SELECT pin_amigo
						FROM amigo_secreto
						WHERE id_participante = :idP;";
				$Conexion = new dbConn();
				$sql = $Conexion->prepare($query);
				$sql->bindParam(':idP', $idPart);
				$sql->execute();
				$pinA = $sql -> fetch(PDO::FETCH_ASSOC);
				return $pinA; 
			} catch(PDOException $e) {
				print $e->getMessage();
			}
		}

    }
?>