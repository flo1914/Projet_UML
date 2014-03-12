SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `projet_uml` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_uml`;


INSERT INTO `langue` (`Abrv`, `Nom`) VALUES
('EN', 'English'),
('FR', 'Français');

INSERT INTO `pays` (`Nom`, `Abrv`, `Abrv_Langue`) VALUES
('England', 'EN', 'EN'),
('France', 'EN', 'FR'),
('Angleterre', 'FR', 'EN'),
('France', 'FR', 'FR');

INSERT INTO `personne` (`IdPersonne`, `Nom`, `Prenom`) VALUES
(1, 'Ramsey', 'Peter'),
(2, 'Pine', 'Chris'),
(3, 'Baldwin', 'Alec'),
(4, 'Law', 'Jude'),
(5, 'Fisher', 'Isla');

INSERT INTO `programme` (`IdProgramme`, `Duree`) VALUES
(1, 90);

INSERT INTO `informations` (`Nom`, `Resume`, `Genre`, `Type`, `IdProgramme`, `Abrv`) VALUES
('Les cinq légendes', 'Les Cinq Légendes raconte l’aventure fantastique d’un groupe de héros, tous doués de pouvoirs extraordinaires. Lorsque Pitch, un esprit maléfique, décide de régner sur le monde, ces 5 légendes vont devoir, pour la première fois, unir leurs forces pour protéger les espoirs, les rêves et l’imagination', NULL, NULL, 1, 'FR');

INSERT INTO `role` (`Role`, `Nom`, `IdProgramme`, `IdPersonne`, `Abrv`) VALUES
('Créateur', NULL, 1, 1, 'FR'),
('Acteur', NULL, 1, 2, 'FR'),
('Acteur', NULL, 1, 3, 'FR'),
('Acteur', NULL, 1, 4, 'FR'),
('Acteur', NULL, 1, 5, 'FR');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
