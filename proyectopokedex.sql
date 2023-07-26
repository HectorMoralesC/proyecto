-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para proyectopokedex
DROP DATABASE IF EXISTS `proyectopokedex`;
CREATE DATABASE IF NOT EXISTS `proyectopokedex` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `proyectopokedex`;

-- Volcando estructura para tabla proyectopokedex.capturas
DROP TABLE IF EXISTS `capturas`;
CREATE TABLE IF NOT EXISTS `capturas` (
  `id_captura` int(11) NOT NULL AUTO_INCREMENT,
  `id_entrenador` int(11) NOT NULL DEFAULT 0,
  `id_pokemon` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_captura`),
  KEY `FK_capturas_entrenador` (`id_entrenador`),
  KEY `FK_capturas_pokedex` (`id_pokemon`),
  CONSTRAINT `FK_capturas_entrenador` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenador` (`id_entrenador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_capturas_pokedex` FOREIGN KEY (`id_pokemon`) REFERENCES `pokedex` (`number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectopokedex.capturas: ~12 rows (aproximadamente)
REPLACE INTO `capturas` (`id_captura`, `id_entrenador`, `id_pokemon`) VALUES
	(1, 1, 28),
	(2, 12, 49),
	(3, 1, 10),
	(5, 1, 6),
	(7, 12, 51),
	(11, 12, 10),
	(12, 12, 3),
	(14, 12, 2),
	(15, 12, 8),
	(16, 12, 15),
	(17, 12, 5),
	(18, 12, 2);

-- Volcando estructura para tabla proyectopokedex.entrenador
DROP TABLE IF EXISTS `entrenador`;
CREATE TABLE IF NOT EXISTS `entrenador` (
  `id_entrenador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `nivel` int(11) NOT NULL DEFAULT 0,
  `pass` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_entrenador`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectopokedex.entrenador: ~2 rows (aproximadamente)
REPLACE INTO `entrenador` (`id_entrenador`, `nombre`, `nivel`, `pass`) VALUES
	(1, 'Mihai', 5, '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'),
	(12, 'Héctor', 1, '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

-- Volcando estructura para tabla proyectopokedex.pokedex
DROP TABLE IF EXISTS `pokedex`;
CREATE TABLE IF NOT EXISTS `pokedex` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL DEFAULT '0',
  `type` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectopokedex.pokedex: ~51 rows (aproximadamente)
REPLACE INTO `pokedex` (`number`, `name`, `type`) VALUES
	(1, 'Bulbasaur', 'Grass/Poison'),
	(2, 'Ivysaur', 'Grass/Poison'),
	(3, 'Venusaur', 'Grass/Poison'),
	(4, 'Charmander', 'Fire'),
	(5, 'Charmeleon', 'Fire'),
	(6, 'Charizard', 'Fire/Flying'),
	(7, 'Squirtle', 'Water'),
	(8, 'Wartortle', 'Water'),
	(9, 'Blastoise', 'Water'),
	(10, 'Caterpie', 'Bug'),
	(11, 'Pikachu', 'Electric'),
	(12, 'Raichu', 'Electric'),
	(13, 'Sandshrew', 'Ground'),
	(14, 'Sandslash', 'Ground'),
	(15, 'Nidoran♀', 'Poison'),
	(16, 'Nidorina', 'Poison'),
	(17, 'Nidoqueen', 'Poison/Ground'),
	(18, 'Nidoran♂', 'Poison'),
	(19, 'Nidorino', 'Poison'),
	(20, 'Nidoking', 'Poison/Ground'),
	(21, 'Clefairy', 'Fairy'),
	(22, 'Clefable', 'Fairy'),
	(23, 'Vulpix', 'Fire'),
	(24, 'Ninetales', 'Fire'),
	(25, 'Jigglypuff', 'Normal/Fairy'),
	(26, 'Wigglytuff', 'Normal/Fairy'),
	(27, 'Zubat', 'Poison/Flying'),
	(28, 'Golbat', 'Poison/Flying'),
	(29, 'Oddish', 'Grass/Poison'),
	(30, 'Gloom', 'Grass/Poison'),
	(31, 'Vileplume', 'Grass/Poison'),
	(32, 'Paras', 'Bug/Grass'),
	(33, 'Parasect', 'Bug/Grass'),
	(34, 'Venonat', 'Bug/Poison'),
	(35, 'Venomoth', 'Bug/Poison'),
	(36, 'Diglett', 'Ground'),
	(37, 'Dugtrio', 'Ground'),
	(38, 'Meowth', 'Normal'),
	(39, 'Persian', 'Normal'),
	(40, 'Psyduck', 'Water'),
	(41, 'Golduck', 'Water'),
	(42, 'Mankey', 'Fighting'),
	(43, 'Primeape', 'Fighting'),
	(44, 'Growlithe', 'Fire'),
	(45, 'Arcanine', 'Fire'),
	(46, 'Poliwag', 'Water'),
	(47, 'Poliwhirl', 'Water'),
	(48, 'Poliwrath', 'Water/Fighting'),
	(49, 'Abra', 'Psychic'),
	(50, 'Kadabra', 'Psychic'),
	(51, 'Alakazam', 'Psychic');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
