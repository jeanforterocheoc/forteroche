-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 jan. 2019 à 22:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`id`, `title`, `content`, `date`) VALUES
(4, 'L\'Alaska c\'est où ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis orci lorem, et volutpat mauris tempor nec. Ut pharetra magna in tincidunt suscipit. Vestibulum viverra tincidunt rutrum. Curabitur euismod, neque at faucibus iaculis, ligula sem consequat velit, at ornare massa magna et sem.&nbsp;</p>', '2019-01-08'),
(5, 'Formation DWJ ', '<p>c\'est un peu long , trop de temps pour cette formation ...</p>\r\n<p>Derni&egrave;re ligne droite, Kimb&eacute; raid pa moli timal!</p>', '2019-01-12');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `content_com` varchar(200) NOT NULL,
  `date_com` date DEFAULT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_com`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_com`, `chapter_id`, `author`, `content_com`, `date_com`, `report`) VALUES
(94, 5, 'Yann', 'C\'est vrai', '2019-01-08', 0),
(97, 4, 'Je', 'laisse un commentaire', '2019-01-10', 0),
(100, 5, 'gtt', 'tgt\'g', '2019-01-13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `forgetpass`
--

DROP TABLE IF EXISTS `forgetpass`;
CREATE TABLE IF NOT EXISTS `forgetpass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(2, 'yann', '$2y$10$t9VSF96l7NVTQ4D5cQrFeO./Q65Zv.myxND9NCvbIt6m4YmRmyEZu', 'bcd.yann@gmail.com'),
(7, 'yaya', '$2y$10$wLs.nZbr.1I3PzyrFnn.q.NQJhf7QnTpj6vYKgVCYkb62nZ1DgGPy', 'yaya@gmail.com'),
(8, 'toto', '$2y$10$ALoIY65gabZBlp1aoWDt/OsNfKeG2XoRUqUE8LpwO0PTs3oQXr4YC', 'toto@toto.fr'),
(11, 'dodo', '$2y$10$SmNloU.ZVXs5wZD7nK07quVav4vtv/AwFN9y0LKZDRkUiL18iFzHa', 'dada@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
