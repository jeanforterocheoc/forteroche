-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 14 fév. 2019 à 17:42
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
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`id`, `title`, `content`, `date`) VALUES
(14, 'Back to life', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et sem eu velit lacinia semper id eget leo. Nam venenatis consequat vulputate. Aenean auctor placerat ex, vitae ullamcorper odio ullamcorper condimentum. Phasellus bibendum lacus et eros maximus, at ornare nulla blandit. Morbi mollis luctus pharetra. Suspendisse ac arcu et lacus ultricies tempor vel condimentum turpis. Etiam feugiat nulla et lorem consequat, eget tempus lorem semper. Aliquam purus lacus, fermentum non ornare ac, iaculis eget mauris. Cras laoreet, erat a tempus rutrum, ipsum sem finibus purus, at ultricies elit orci nec tellus. Vestibulum eleifend non elit a ultricies. Aliquam gravida urna a ornare pretium. Duis nisi justo, faucibus sit amet nulla sit amet, tristique eleifend libero. In massa ipsum, pulvinar et magna sit amet, ullamcorper bibendum libero.</p>\r\n<p>Etiam non tincidunt augue. Duis eu erat vel felis accumsan posuere nec vitae augue. Cras nibh ante, accumsan quis magna nec, lobortis lobortis mi. Cras eget lorem non justo pharetra iaculis ut quis ex. Nullam venenatis dapibus nisi, et vestibulum eros hendrerit suscipit. Quisque efficitur, magna faucibus rhoncus iaculis, tortor nisl volutpat nisl, vitae tincidunt justo orci vel nisi. Morbi viverra gravida eros. Suspendisse posuere ut ante vitae fermentum. Curabitur mattis dapibus dictum. Praesent neque quam, suscipit id iaculis vel, tristique quis lectus. Vestibulum in tincidunt mauris. Nullam est tortor, efficitur eu viverra et, placerat vitae dui.</p>\r\n<p>Sed quis odio nisi. Maecenas non turpis sagittis leo tempor iaculis. Maecenas arcu magna, ullamcorper nec orci ut, sodales rutrum urna. Praesent tristique nulla sit amet leo sagittis, vel aliquam augue fermentum. Quisque aliquet maximus consectetur. Suspendisse nisi magna, finibus nec viverra et, porttitor feugiat ligula. Vivamus rutrum eu nisi non commodo. Integer sollicitudin feugiat nisi, et fringilla lacus fermentum a.</p>\r\n<p>Nunc commodo malesuada enim ac lacinia. Donec at sollicitudin dui. In vitae ullamcorper diam. Mauris vel justo suscipit, porttitor tortor vel, hendrerit ex. Ut luctus sollicitudin libero eget dictum. In eleifend odio tristique dictum dignissim. Aenean vel ligula tellus. Maecenas porta est at tincidunt fermentum. Nullam tortor est, varius ut orci quis, vulputate aliquam urna. Phasellus auctor faucibus neque, sed accumsan mi pharetra at. Cras vestibulum augue libero, eu dictum dui congue a. Aenean bibendum purus ac velit placerat hendrerit. Aenean id dui purus. Pellentesque eleifend arcu lacus, ut posuere libero mattis id.</p>\r\n<p>Nullam lobortis cursus sodales. Ut pellentesque eros nec mi suscipit, at lobortis tellus lobortis. Nulla ut consectetur lorem. Phasellus scelerisque magna id vehicula tincidunt. Praesent at ex eget neque consequat placerat convallis a est. Pellentesque at purus ut leo suscipit feugiat. Morbi faucibus nisl id massa semper ornare. Donec pulvinar volutpat pellentesque. Duis ac iaculis arcu. Proin vulputate pharetra orci vitae dapibus. Nam iaculis orci in laoreet semper. Integer gravida dolor quis diam faucibus, sit amet fermentum quam condimentum. Mauris metus massa, pharetra nec lectus vitae, placerat aliquam mi. Nullam velit ligula, ultrices et iaculis ac, consectetur vitae arcu.</p>', '2019-02-13'),
(16, 'La réserve de Denali', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend rhoncus consequat. Aenean cursus augue a risus accumsan fringilla. Praesent facilisis est eget massa gravida euismod. In porttitor leo vitae dolor condimentum, eu mollis eros volutpat. Sed congue, magna ac accumsan pellentesque, mi erat tincidunt elit, id imperdiet libero nisi non justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tristique suscipit pretium. Pellentesque vitae feugiat elit. Cras a leo sed metus posuere hendrerit. Proin luctus bibendum orci, at auctor magna finibus at.</p>\r\n<p>Aliquam erat volutpat. Nulla vitae pellentesque massa, sed blandit velit. Nulla ac velit ac nibh rutrum lobortis. Suspendisse erat massa, tincidunt quis mauris non, luctus aliquam neque. Ut tincidunt felis in viverra dapibus. Donec bibendum odio ut ante viverra venenatis. Vestibulum eu metus in dui scelerisque vehicula at eu ligula.</p>\r\n<p>Nullam cursus nunc a arcu volutpat, at hendrerit lorem congue. Duis vehicula laoreet risus, id euismod justo dignissim eget. Duis auctor augue non nulla euismod sodales. Maecenas mollis, mauris non tincidunt volutpat, diam nunc rhoncus lectus, eu iaculis erat nibh ut nisi. Praesent dictum vitae tortor ac consectetur. Pellentesque at maximus dolor, quis interdum diam. Donec metus diam, semper vitae molestie quis, faucibus vel magna. Aenean semper tempor tincidunt. Vivamus vel nisi maximus, mollis sem eu, luctus felis. Nullam a odio eu diam laoreet placerat nec nec mauris. Morbi ullamcorper at lorem a aliquam. Phasellus euismod facilisis ante, sed consequat nibh ultricies nec. Quisque fringilla efficitur arcu at euismod.</p>\r\n<p>Nunc quis vehicula ipsum. Nam aliquet magna id erat tincidunt sollicitudin. In mi nisi, tincidunt ornare elit quis, elementum laoreet velit. Aliquam in ullamcorper erat, eu volutpat ipsum. Nullam vel pellentesque eros. Donec sed ipsum urna. Aenean posuere bibendum ipsum sed vulputate. Donec commodo quam purus, ac convallis ex hendrerit vitae. In nec auctor justo, vel sodales nulla. Phasellus porta velit elit, eget maximus sem efficitur a. Mauris tincidunt dolor nec mauris maximus, at eleifend elit accumsan. Nam imperdiet augue in purus malesuada, et tincidunt urna egestas. Quisque gravida eleifend mattis. Duis eu dui nec odio lobortis rhoncus. Quisque non nisl accumsan, placerat felis a, aliquam nulla. Vivamus non volutpat est.</p>\r\n<p>Aenean porta consectetur aliquam. Praesent tincidunt finibus justo non auctor. Praesent nibh est, ultricies nec consectetur et, mattis et enim. Etiam nec rutrum mauris, quis lacinia arcu. Vivamus nec elit quis justo mollis molestie et at est. Donec ipsum nulla, cursus non imperdiet vitae, aliquam eu leo. Vestibulum lorem diam, pellentesque nec ullamcorper tristique, molestie sed massa. Duis accumsan nec metus eu convallis.</p>', '2019-02-14'),
(17, 'La dernière frontière', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend rhoncus consequat. Aenean cursus augue a risus accumsan fringilla. Praesent facilisis est eget massa gravida euismod. In porttitor leo vitae dolor condimentum, eu mollis eros volutpat. Sed congue, magna ac accumsan pellentesque, mi erat tincidunt elit, id imperdiet libero nisi non justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tristique suscipit pretium. Pellentesque vitae feugiat elit. Cras a leo sed metus posuere hendrerit. Proin luctus bibendum orci, at auctor magna finibus at.</p>\r\n<p>Aliquam erat volutpat. Nulla vitae pellentesque massa, sed blandit velit. Nulla ac velit ac nibh rutrum lobortis. Suspendisse erat massa, tincidunt quis mauris non, luctus aliquam neque. Ut tincidunt felis in viverra dapibus. Donec bibendum odio ut ante viverra venenatis. Vestibulum eu metus in dui scelerisque vehicula at eu ligula.</p>\r\n<p>Nullam cursus nunc a arcu volutpat, at hendrerit lorem congue. Duis vehicula laoreet risus, id euismod justo dignissim eget. Duis auctor augue non nulla euismod sodales. Maecenas mollis, mauris non tincidunt volutpat, diam nunc rhoncus lectus, eu iaculis erat nibh ut nisi. Praesent dictum vitae tortor ac consectetur. Pellentesque at maximus dolor, quis interdum diam. Donec metus diam, semper vitae molestie quis, faucibus vel magna. Aenean semper tempor tincidunt. Vivamus vel nisi maximus, mollis sem eu, luctus felis. Nullam a odio eu diam laoreet placerat nec nec mauris. Morbi ullamcorper at lorem a aliquam. Phasellus euismod facilisis ante, sed consequat nibh ultricies nec. Quisque fringilla efficitur arcu at euismod.</p>', '2019-02-14'),
(18, 'Le parc national de Kenai Fjords', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend rhoncus consequat. Aenean cursus augue a risus accumsan fringilla. Praesent facilisis est eget massa gravida euismod. In porttitor leo vitae dolor condimentum, eu mollis eros volutpat. Sed congue, magna ac accumsan pellentesque, mi erat tincidunt elit, id imperdiet libero nisi non justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tristique suscipit pretium. Pellentesque vitae feugiat elit. Cras a leo sed metus posuere hendrerit. Proin luctus bibendum orci, at auctor magna finibus at.</p>\r\n<p>Aliquam erat volutpat. Nulla vitae pellentesque massa, sed blandit velit. Nulla ac velit ac nibh rutrum lobortis. Suspendisse erat massa, tincidunt quis mauris non, luctus aliquam neque. Ut tincidunt felis in viverra dapibus. Donec bibendum odio ut ante viverra venenatis. Vestibulum eu metus in dui scelerisque vehicula at eu ligula.</p>\r\n<p>Nullam cursus nunc a arcu volutpat, at hendrerit lorem congue. Duis vehicula laoreet risus, id euismod justo dignissim eget. Duis auctor augue non nulla euismod sodales. Maecenas mollis, mauris non tincidunt volutpat, diam nunc rhoncus lectus, eu iaculis erat nibh ut nisi. Praesent dictum vitae tortor ac consectetur. Pellentesque at maximus dolor, quis interdum diam. Donec metus diam, semper vitae molestie quis, faucibus vel magna. Aenean semper tempor tincidunt. Vivamus vel nisi maximus, mollis sem eu, luctus felis. Nullam a odio eu diam laoreet placerat nec nec mauris. Morbi ullamcorper at lorem a aliquam. Phasellus euismod facilisis ante, sed consequat nibh ultricies nec. Quisque fringilla efficitur arcu at euismod.</p>\r\n<p>Nunc quis vehicula ipsum. Nam aliquet magna id erat tincidunt sollicitudin. In mi nisi, tincidunt ornare elit quis, elementum laoreet velit. Aliquam in ullamcorper erat, eu volutpat ipsum. Nullam vel pellentesque eros. Donec sed ipsum urna. Aenean posuere bibendum ipsum sed vulputate. Donec commodo quam purus, ac convallis ex hendrerit vitae. In nec auctor justo, vel sodales nulla. Phasellus porta velit elit, eget maximus sem efficitur a. Mauris tincidunt dolor nec mauris maximus, at eleifend elit accumsan. Nam imperdiet augue in purus malesuada, et tincidunt urna egestas. Quisque gravida eleifend mattis. Duis eu dui nec odio lobortis rhoncus. Quisque non nisl accumsan, placerat felis a, aliquam nulla. Vivamus non volutpat est.</p>\r\n<p>Aenean porta consectetur aliquam. Praesent tincidunt finibus justo non auctor. Praesent nibh est, ultricies nec consectetur et, mattis et enim. Etiam nec rutrum mauris, quis lacinia arcu. Vivamus nec elit quis justo mollis molestie et at est. Donec ipsum nulla, cursus non imperdiet vitae, aliquam eu leo. Vestibulum lorem diam, pellentesque nec ullamcorper tristique, molestie sed massa. Duis accumsan nec metus eu convallis.</p>', '2019-02-14'),
(19, 'Passage intérieur', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend rhoncus consequat. Aenean cursus augue a risus accumsan fringilla. Praesent facilisis est eget massa gravida euismod. In porttitor leo vitae dolor condimentum, eu mollis eros volutpat. Sed congue, magna ac accumsan pellentesque, mi erat tincidunt elit, id imperdiet libero nisi non justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tristique suscipit pretium. Pellentesque vitae feugiat elit. Cras a leo sed metus posuere hendrerit. Proin luctus bibendum orci, at auctor magna finibus at.</p>\r\n<p>Aliquam erat volutpat. Nulla vitae pellentesque massa, sed blandit velit. Nulla ac velit ac nibh rutrum lobortis. Suspendisse erat massa, tincidunt quis mauris non, luctus aliquam neque. Ut tincidunt felis in viverra dapibus. Donec bibendum odio ut ante viverra venenatis. Vestibulum eu metus in dui scelerisque vehicula at eu ligula.</p>\r\n<p>Nullam cursus nunc a arcu volutpat, at hendrerit lorem congue. Duis vehicula laoreet risus, id euismod justo dignissim eget. Duis auctor augue non nulla euismod sodales. Maecenas mollis, mauris non tincidunt volutpat, diam nunc rhoncus lectus, eu iaculis erat nibh ut nisi. Praesent dictum vitae tortor ac consectetur. Pellentesque at maximus dolor, quis interdum diam. Donec metus diam, semper vitae molestie quis, faucibus vel magna. Aenean semper tempor tincidunt. Vivamus vel nisi maximus, mollis sem eu, luctus felis. Nullam a odio eu diam laoreet placerat nec nec mauris. Morbi ullamcorper at lorem a aliquam. Phasellus euismod facilisis ante, sed consequat nibh ultricies nec. Quisque fringilla efficitur arcu at euismod.</p>\r\n<p>Nunc quis vehicula ipsum. Nam aliquet magna id erat tincidunt sollicitudin. In mi nisi, tincidunt ornare elit quis, elementum laoreet velit. Aliquam in ullamcorper erat, eu volutpat ipsum. Nullam vel pellentesque eros. Donec sed ipsum urna. Aenean posuere bibendum ipsum sed vulputate. Donec commodo quam purus, ac convallis ex hendrerit vitae. In nec auctor justo, vel sodales nulla. Phasellus porta velit elit, eget maximus sem efficitur a. Mauris tincidunt dolor nec mauris maximus, at eleifend elit accumsan. Nam imperdiet augue in purus malesuada, et tincidunt urna egestas. Quisque gravida eleifend mattis. Duis eu dui nec odio lobortis rhoncus. Quisque non nisl accumsan, placerat felis a, aliquam nulla. Vivamus non volutpat est.</p>\r\n<p>Aenean porta consectetur aliquam. Praesent tincidunt finibus justo non auctor. Praesent nibh est, ultricies nec consectetur et, mattis et enim. Etiam nec rutrum mauris, quis lacinia arcu. Vivamus nec elit quis justo mollis molestie et at est. Donec ipsum nulla, cursus non imperdiet vitae, aliquam eu leo. Vestibulum lorem diam, pellentesque nec ullamcorper tristique, molestie sed massa. Duis accumsan nec metus eu convallis.</p>', '2019-02-14');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content_com` varchar(200) NOT NULL,
  `date_com` date DEFAULT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_com`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_com`, `chapter_id`, `author`, `content_com`, `date_com`, `report`) VALUES
(166, 18, 'Juneau', 'Aenean porta consectetur aliquam.', '2019-02-14', 1),
(167, 18, 'Anchorage', ' In nec auctor justo, vel sodales nulla. Phasellus porta velit elit, eget maximus sem efficitur a.', '2019-02-14', 1),
(168, 16, 'Donec', 'Quisque non nisl accumsan, placerat felis a, aliquam nulla. Vivamus non volutpat est.', '2019-02-14', 0),
(169, 16, 'Nam', 'Aenean porta consectetur aliquam. ', '2019-02-14', 1),
(170, 17, 'Aenean', 'Nulla vitae pellentesque massa, sed blandit velit. Nulla ac velit ac nibh rutrum lobortis. ', '2019-02-14', 0),
(171, 17, 'Sed', 'Suspendisse erat massa, tincidunt quis mauris non, luctus aliquam neque.', '2019-02-14', 1),
(172, 14, 'Mae', 'Pellentesque eleifend arcu lacus, ut posuere libero mattis id.', '2019-02-14', 0),
(173, 14, 'Mauris', 'Metus massa, pharetra nec lectus vitae, placerat aliquam mi.', '2019-02-14', 0),
(174, 19, ' Aliquam ', 'Quisque fringilla efficitur arcu at euismod.', '2019-02-14', 0),
(175, 19, 'Lorem', 'Praesent tincidunt finibus justo non auctor. ', '2019-02-14', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(2, 'yann', '$2y$10$h7gTeeP09uCSzM6H46an5.aYfKGSA7pDSukhifkSJ2VRbYNnJj/OW', 'yann@gmail.com'),
(69, 'ab', '$2y$10$j4xgO0vJSqxA0c1HcnacnuiiM1HAFwmYXx1XKiiRg2ukwKGBYfuKy', 'ab@ab.com');

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
