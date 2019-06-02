-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.36-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para intercambios
CREATE DATABASE IF NOT EXISTS `intercambios` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `intercambios`;

-- Volcando estructura para tabla intercambios.amigo_secreto
CREATE TABLE IF NOT EXISTS `amigo_secreto` (
  `id_amigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_participante` int(11) DEFAULT NULL,
  `pin_amigo` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_amigo`),
  KEY `id_participante` (`id_participante`),
  CONSTRAINT `amigo_secreto_ibfk_1` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`idparticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla intercambios.amigo_secreto_organizador
CREATE TABLE IF NOT EXISTS `amigo_secreto_organizador` (
  `id_amigo_org` int(11) NOT NULL AUTO_INCREMENT,
  `id_organizador` int(11) DEFAULT NULL,
  `pin_amigo` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_amigo_org`),
  KEY `ref_org_amigo` (`id_organizador`),
  CONSTRAINT `ref_org_amigo` FOREIGN KEY (`id_organizador`) REFERENCES `organizadores` (`idorganizador`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla intercambios.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `idgrupo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla intercambios.organizadores
CREATE TABLE IF NOT EXISTS `organizadores` (
  `idorganizador` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `pin` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`idorganizador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla intercambios.participantes
CREATE TABLE IF NOT EXISTS `participantes` (
  `idparticipante` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidop` varchar(45) DEFAULT NULL,
  `apellidom` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `pin` varchar(45) DEFAULT NULL,
  `fecha_registro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idparticipante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla intercambios.rel_grupo_organizador
CREATE TABLE IF NOT EXISTS `rel_grupo_organizador` (
  `id_gru_org` int(11) NOT NULL AUTO_INCREMENT,
  `id_org` int(11) DEFAULT NULL,
  `id_grup` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_gru_org`),
  KEY `id_org` (`id_org`),
  KEY `rel_grupo_organizador_ibfk_2` (`id_grup`),
  CONSTRAINT `rel_grupo_organizador_ibfk_1` FOREIGN KEY (`id_org`) REFERENCES `organizadores` (`idorganizador`),
  CONSTRAINT `rel_grupo_organizador_ibfk_2` FOREIGN KEY (`id_grup`) REFERENCES `grupos` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla intercambios.rel_grupo_participante
CREATE TABLE IF NOT EXISTS `rel_grupo_participante` (
  `id_gru_par` int(11) NOT NULL AUTO_INCREMENT,
  `idparticipante` int(11) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  PRIMARY KEY (`id_gru_par`),
  KEY `rel_grupo_participante_ibfk_1` (`idparticipante`),
  KEY `rel_grupo_participante_ibfk_2` (`idgrupo`),
  CONSTRAINT `rel_grupo_participante_ibfk_1` FOREIGN KEY (`idparticipante`) REFERENCES `participantes` (`idparticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rel_grupo_participante_ibfk_2` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
