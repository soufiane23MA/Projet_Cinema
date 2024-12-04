-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinemadb
CREATE DATABASE IF NOT EXISTS `cinemadb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinemadb`;

-- Listage de la structure de table cinemadb. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_Acteur` int NOT NULL AUTO_INCREMENT,
  `id_Personne` int NOT NULL,
  PRIMARY KEY (`id_Acteur`),
  KEY `id_Personne` (`id_Personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_Personne`) REFERENCES `personne` (`id_Personne`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.acteur : ~8 rows (environ)
INSERT INTO `acteur` (`id_Acteur`, `id_Personne`) VALUES
	(4, 3),
	(1, 4),
	(2, 5),
	(3, 6),
	(5, 8),
	(6, 12),
	(7, 18),
	(8, 20);

-- Listage de la structure de table cinemadb. appartenir
CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_Filme` int NOT NULL,
  `id_Genre` int NOT NULL,
  PRIMARY KEY (`id_Filme`,`id_Genre`),
  KEY `id_Genre` (`id_Genre`),
  CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`id_Filme`) REFERENCES `film` (`id_Filme`),
  CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`id_Genre`) REFERENCES `genre` (`id_Genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.appartenir : ~17 rows (environ)
INSERT INTO `appartenir` (`id_Filme`, `id_Genre`) VALUES
	(1, 1),
	(6, 2),
	(9, 2),
	(3, 3),
	(4, 4),
	(8, 4),
	(25, 4),
	(7, 7),
	(16, 7),
	(2, 8),
	(5, 8),
	(10, 8),
	(12, 8),
	(2, 18),
	(7, 18),
	(11, 18),
	(12, 18);

-- Listage de la structure de table cinemadb. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_Filme` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `synopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `note` decimal(3,1) DEFAULT NULL,
  `annee_Sortie` year DEFAULT NULL,
  `duree_Filme` time DEFAULT NULL,
  `id_Realisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_Filme`),
  KEY `id_Realisateur` (`id_Realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_Realisateur`) REFERENCES `realisateur` (`id_Realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.film : ~26 rows (environ)
INSERT INTO `film` (`id_Filme`, `titre`, `synopsis`, `note`, `annee_Sortie`, `duree_Filme`, `id_Realisateur`) VALUES
	(1, 'Jorassic Park', 'Résumé du film 1', 7.5, '2020', '02:00:00', 1),
	(2, 'The Lord of the Rings: The Fellowship of the Ring', '\'Frodo Baggins, un hobbit, se voit confier la mission de détruire un anneau magique qui pourrait plonger le monde dans les ténèbres. Avec un groupe d\\\'amis et de compagnons, il part dans un voyage périlleux à travers des terres mythiques.\'', 8.2, '2019', '01:50:00', 2),
	(3, 'Blade Runner 2049', '\'Dans un futur dystopique, un jeune Blade Runner découvre un secret enfoui qui pourrait plonger ce monde dans le chaos. En enquêtant, il se lance dans une quête existentielle, questionnant la nature de l\\\'humanité et de l\\\'intelligence artificielle.\'', 6.8, '2021', '02:10:00', 3),
	(4, 'Ex Machina', '\'Un programmeur est invité à tester l\\\'intelligence artificielle d\\\'une robot humanoïde, mais au fur et à mesure de l\\\'interaction, il découvre des secrets cachés qui mettront en danger sa vie et celle de la machine.\'', 8.2, '2021', '02:30:00', 1),
	(5, 'Film B', 'Une histoire dramatique bouleversante', 7.5, '2019', '01:50:00', 2),
	(6, 'Film C', 'Une comédie hilarante', 6.8, '2020', '01:40:00', 3),
	(7, 'Shutter Island', '\'Un marshal américain enquête sur la disparition d\\\'une patiente dans un hôpital psychiatrique isolé, mais au fur et à mesure de l\\\'enquête, il découvre que les choses ne sont pas ce qu\\\'elles semblent être.\'', 8.0, '2022', '02:00:00', 9),
	(8, '\'Interstellar\'', '\'Lorsque la Terre se trouve menacée par une catastrophe écologique, un groupe d\\\'astronautes part dans l\\\'espace pour trouver une nouvelle planète habitable. Le film explore des concepts de voyage interstellaire, de relativité du temps et de l\\\'amour familial.\'', 7.9, '2021', '02:15:00', 2),
	(9, '\'The Notebook\'', '\'Allie et Noah, deux jeunes amoureux, se retrouvent après plusieurs années de séparation. Leur histoire d\\\'amour passionnée et les obstacles qu\\\'ils doivent surmonter rendent leur relation profondément émouvante, portant un message sur la mémoire et l\\\'engagement.\'', 6.5, '2018', '01:45:00', 6),
	(10, '\'The Conjuring\'', '\'Les enquêteurs paranormaux Ed et Lorraine Warren sont appelés pour aider une famille terrorisée par des phénomènes surnaturels dans leur maison. ', 7.2, '2023', '01:30:00', 7),
	(11, '\'Harry Potter and the Sorcerer\\\'s Stone\'\r\n', 'Un film fantastique plein de magie', 8.5, '2020', '02:10:00', 8),
	(12, 'Indiana Johnnes', 'Une aventure palpitante', 7.8, '2021', '02:25:00', 9),
	(13, 'Film J', 'Un documentaire fascinant sur la nature', 9.0, '2022', '01:30:00', 2),
	(14, 'The Shawshank Redemption', 'Andy Dufresne, un banquier accusé à tort du meurtre de sa femme et de son amant, est incarcéré à Shawshank. Là, il se lie d\'amitié avec Ellis Redding et trouve des moyens de s\'évader.', 9.3, '1994', '02:22:00', 1),
	(15, 'The Godfather', 'Don Vito Corleone, un puissant chef mafieux, se retire des affaires, et son fils Michael prend sa place. Mais les conflits familiaux et les trahisons plongent la famille dans une guerre violente.', 9.2, '1972', '02:55:00', 2),
	(16, 'Inception', 'Dom Cobb est un voleur professionnel qui s\'introduit dans les rêves des autres pour voler des secrets. Il reçoit une dernière mission : implanter une idée dans l\'esprit d\'un individu.', 8.8, '2010', '02:28:00', 3),
	(17, 'The Dark Knight', 'Batman lutte contre le Joker, un criminel anarchiste qui veut semer le chaos à Gotham City. Le film explore la lutte intérieure de Batman face aux choix moraux.', 9.0, '2008', '02:32:00', 1),
	(18, 'Forrest Gump', 'Forrest Gump, un homme au faible QI, traverse les grandes étapes de l\'histoire américaine des années 60 et 70 tout en vivant des aventures inattendues.', 8.8, '1994', '02:22:00', 2),
	(19, 'The Matrix', 'Un hacker nommé Neo découvre que la réalité dans laquelle il vit est une simulation informatique contrôlée par des machines. Il rejoint un groupe de résistants pour lutter contre elles.', 8.7, '1999', '02:16:00', 6),
	(20, 'Interstellar', 'Un groupe d\'astronautes part à la recherche d\'une nouvelle planète habitable, après que la Terre soit devenue inhabitable. Ils traversent un trou noir dans un voyage interdimensionnel.', 8.6, '2014', '02:49:00', 7),
	(21, 'Gladiator', 'Maximus, un général romain trahi, devient un gladiateur et cherche à venger la mort de sa famille et son honneur perdu tout en défiant l\'empereur Corvus.', 8.5, '2000', '02:35:00', 7),
	(22, 'Pulp Fiction', 'L\'histoire entrecroisée de plusieurs personnages impliqués dans des crimes à Los Angeles, où la violence, l\'humour et les dialogues tranchants font la particularité du film.', 8.9, '1994', '02:34:00', 6),
	(23, 'Fight Club', 'Un employé de bureau déprimé rencontre un homme mystérieux qui fonde avec lui un club de combat clandestin. Ce dernier devient rapidement plus qu\'un simple moyen d\'évasion.', 8.8, '1999', '02:19:00', 7),
	(24, 'The Silence of the Lambs', 'Clarice Starling, une jeune recrue du FBI, doit solliciter l\'aide du tueur en série Hannibal Lecter pour capturer un autre criminel tout aussi dangereux.', 8.6, '1991', '01:58:00', 8),
	(25, 'Avatar', 'Jake Sully, un ancien marine, prend la place de son frère jumeau décédé et se rend sur la planète Pandora, où il se lie d\'amitié avec les indigènes et lutte contre l\'exploitation des ressources.', 7.8, '2009', '02:42:00', 2),
	(26, 'The Lion King', 'Simba, un lionceau, doit faire face à la perte de son père et à son destin en tant que roi des animaux. Le film raconte son parcours pour revendiquer son royaume.', 8.5, '1994', '01:28:00', 1);

-- Listage de la structure de table cinemadb. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_Genre` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Genre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.genre : ~11 rows (environ)
INSERT INTO `genre` (`id_Genre`, `libelle`) VALUES
	(1, 'Action'),
	(2, 'Comédie'),
	(3, 'Drame'),
	(4, 'Science-fiction'),
	(5, 'Horreur'),
	(6, 'Romance'),
	(7, 'Thriller'),
	(8, 'Aventure'),
	(9, 'Animation'),
	(10, 'Documentaire'),
	(18, 'Fantasy');

-- Listage de la structure de table cinemadb. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_Acteur` int NOT NULL,
  `id_Filme` int NOT NULL,
  `id_Role` int NOT NULL,
  PRIMARY KEY (`id_Acteur`,`id_Filme`,`id_Role`),
  KEY `id_Filme` (`id_Filme`),
  KEY `id_Role` (`id_Role`),
  CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_Acteur`) REFERENCES `acteur` (`id_Acteur`),
  CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`id_Filme`) REFERENCES `film` (`id_Filme`),
  CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`id_Role`) REFERENCES `role` (`id_Role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.jouer : ~18 rows (environ)
INSERT INTO `jouer` (`id_Acteur`, `id_Filme`, `id_Role`) VALUES
	(1, 1, 1),
	(1, 2, 1),
	(2, 2, 2),
	(3, 2, 3),
	(3, 3, 3),
	(4, 4, 3),
	(7, 4, 1),
	(2, 6, 3),
	(4, 6, 4),
	(8, 7, 3),
	(1, 8, 2),
	(5, 8, 1),
	(3, 13, 2),
	(8, 13, 1),
	(2, 16, 2),
	(5, 16, 1),
	(8, 18, 1),
	(1, 25, 1);

-- Listage de la structure de table cinemadb. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_Personne` int NOT NULL AUTO_INCREMENT,
  `nom_Personne` varchar(100) NOT NULL,
  `prenom_Personne` varchar(100) NOT NULL,
  `date_Naissance` date DEFAULT NULL,
  `sex_Personne` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_Personne`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.personne : ~20 rows (environ)
INSERT INTO `personne` (`id_Personne`, `nom_Personne`, `prenom_Personne`, `date_Naissance`, `sex_Personne`) VALUES
	(1, 'Doe', 'John', '1980-07-15', 'M'),
	(2, 'Smith', 'Emma', '1990-11-10', 'F'),
	(3, 'Johnson', 'William', '1985-05-22', 'M'),
	(4, 'Brown', 'Sophia', '1992-08-09', 'F'),
	(5, 'Taylor', 'James', '1983-03-25', 'M'),
	(6, 'Wilson', 'Olivia', '1995-12-17', 'F'),
	(7, 'Moore', 'Benjamin', '1987-01-03', 'M'),
	(8, 'Davis', 'Isabella', '1991-06-18', 'F'),
	(9, 'Miller', 'Lucas', '1984-10-29', 'M'),
	(10, 'Garcia', 'Charlotte', '1993-04-12', 'F'),
	(11, 'Doe', 'John', '1980-07-15', 'M'),
	(12, 'Smith', 'Emma', '1990-11-10', 'F'),
	(13, 'Johnson', 'William', '1985-05-22', 'M'),
	(14, 'Brown', 'Sophia', '1992-08-09', 'F'),
	(15, 'Taylor', 'James', '1983-03-25', 'M'),
	(16, 'Wilson', 'Olivia', '1995-12-17', 'F'),
	(17, 'Moore', 'Benjamin', '1987-01-03', 'M'),
	(18, 'Davis', 'Isabella', '1991-06-18', 'F'),
	(19, 'Miller', 'Lucas', '1984-10-29', 'M'),
	(20, 'Garcia', 'Charlotte', '1993-04-12', 'F');

-- Listage de la structure de table cinemadb. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_Realisateur` int NOT NULL AUTO_INCREMENT,
  `id_Personne` int NOT NULL,
  PRIMARY KEY (`id_Realisateur`),
  KEY `id_Personne` (`id_Personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_Personne`) REFERENCES `personne` (`id_Personne`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.realisateur : ~13 rows (environ)
INSERT INTO `realisateur` (`id_Realisateur`, `id_Personne`) VALUES
	(1, 1),
	(4, 1),
	(2, 2),
	(5, 2),
	(3, 3),
	(6, 3),
	(7, 4),
	(8, 5),
	(9, 6),
	(10, 7),
	(11, 8),
	(12, 9),
	(13, 10);

-- Listage de la structure de table cinemadb. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_Role` int NOT NULL AUTO_INCREMENT,
  `nom_Role` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinemadb.role : ~4 rows (environ)
INSERT INTO `role` (`id_Role`, `nom_Role`) VALUES
	(1, 'Acteur principal'),
	(2, 'Antagoniste'),
	(3, 'Second rôle'),
	(4, 'Tueur \r\n\r\n');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
