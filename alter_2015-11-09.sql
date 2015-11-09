# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.23)
# Base de datos: alter
# Tiempo de Generación: 2015-11-09 13:46:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla belcorp_usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `belcorp_usuarios`;

CREATE TABLE `belcorp_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pais` varchar(5) DEFAULT NULL,
  `jerarquia` varchar(5) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `ingresos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `belcorp_usuarios` WRITE;
/*!40000 ALTER TABLE `belcorp_usuarios` DISABLE KEYS */;

INSERT INTO `belcorp_usuarios` (`id`, `name`, `lastName`, `email`, `pais`, `jerarquia`, `password`, `ingresos`)
VALUES
	(6,'miguel','aliaga','maliaga.pantoja@gmail.com','AE','sec','12345678',6);

/*!40000 ALTER TABLE `belcorp_usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
