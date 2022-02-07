-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Janvier 2020 à 23:53
-- Version du serveur :  5.7.28-0ubuntu0.18.04.4
-- Version de PHP :  7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_de_naissance` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `derniere_partie` text NOT NULL,
  `difficulty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`nom`, `prenom`, `date_de_naissance`, `pseudo`, `mot_de_passe`, `score`, `derniere_partie`, `difficulty`) VALUES
('djellal', 'youva', '1999-03-01', 'djellal', '$2y$12$nR.bKwcXXUQomHdp/uUXeO9LL9Cd2ptrOXuojAdaGb1SA9JmeH2Ke', '/', '{\"temps_jeu\":177,\"temps_restant\":166,\"tabcartes\":[{},{},{},{},{},{},{},{}],\"tabimg\":[\"http://localhost/Memory/pictures/pic4.jpg\",\"http://localhost/Memory/pictures/pic4.jpg\",\"http://localhost/Memory/pictures/pic1.jpg\",\"http://localhost/Memory/pictures/pic3.jpg\",\"http://localhost/Memory/pictures/pic2.jpg\",\"http://localhost/Memory/pictures/pic1.jpg\",\"http://localhost/Memory/pictures/pic2.jpg\",\"http://localhost/Memory/pictures/pic3.jpg\"],\"chrono\":{},\"score\":{},\"nbclick\":1,\"nberror\":1,\"cartesmatched\":[\"case0\",\"case1\",\"case5\",\"case2\"],\"carteaverfier\":\"http://localhost/Memory/pictures/pic3.jpg\",\"caseaverfier\":{},\"depart\":true,\"time\":3}', '8'),
('leo', 'messi ', '1987-07-25', 'leo', '$2y$12$kVVyen5fD2M0zUxB1RPGC.q4ssocv9zvNVbv9DK2ZQEYurSOGXiIe', '/', '/', '/'),
('riga', 'momo', '1999-01-01', 'momoh', '$2y$12$U1YusB1EXSc.qxpC/dKbKeUHP84CDh8jpU.BmG7n3yGeMWpr4joMC', '/', '{\"temps_jeu\":180,\"temps_restant\":179,\"tabcartes\":[{},{},{},{},{},{},{},{}],\"tabimg\":[\"http://localhost/Memory/pictures/pic4.jpg\",\"http://localhost/Memory/pictures/pic3.jpg\",\"http://localhost/Memory/pictures/pic2.jpg\",\"http://localhost/Memory/pictures/pic4.jpg\",\"http://localhost/Memory/pictures/pic1.jpg\",\"http://localhost/Memory/pictures/pic3.jpg\",\"http://localhost/Memory/pictures/pic1.jpg\",\"http://localhost/Memory/pictures/pic2.jpg\"],\"chrono\":{},\"score\":{},\"nbclick\":0,\"nberror\":0,\"cartesmatched\":[\"case1\",\"case5\"],\"carteaverfier\":\"\",\"caseaverfier\":\"\",\"depart\":true,\"time\":3}', '8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
