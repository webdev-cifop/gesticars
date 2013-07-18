-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 14 Juin 2013 à 13:57
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `resauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id_agent` int(11) NOT NULL AUTO_INCREMENT,
  `nom_agent` varchar(30) NOT NULL,
  `prenom_agent` varchar(30) NOT NULL,
  `mail_agent` varchar(50) NOT NULL,
  `permis_agent` varchar(25) NOT NULL,
  `id_poste_poste` int(2) NOT NULL,
  `id_login_login` int(11) NOT NULL,
  PRIMARY KEY (`id_agent`),
  KEY `FK_agent_id_poste_poste` (`id_poste_poste`),
  KEY `FK_agent_id_login_login` (`id_login_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=588 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `nom_agent`, `prenom_agent`, `mail_agent`, `permis_agent`, `id_poste_poste`, `id_login_login`) VALUES
(1, 'AGBO', 'Jean-Corneille', '', '', 1, 1),
(2, 'ALADENISE', 'Catherine', '', '', 1, 1),
(3, 'ALEXANDER', 'Joanne', '', '', 1, 1),
(4, 'ALLAIN', 'Patrick', '', '', 1, 1),
(5, 'ALLAIN-LAUNAY', 'Thomas', '', '', 1, 1),
(6, 'ALLARD', 'Céline', '', '', 1, 1),
(7, 'AMBLARD', 'Gilles', '', '', 1, 1),
(8, 'AMET', 'Julien', '', '', 1, 1),
(9, 'AMIRAULT FAURY', 'Katia', '', '', 1, 1),
(10, 'ANDRE', 'Julia', '', '', 1, 1),
(11, 'ANTOINE', 'Fiona', '', '', 1, 1),
(12, 'ANTOINET', 'Robert', '', '', 1, 1),
(13, 'APAVE', '', '', '', 1, 1),
(14, 'ARMANET', 'Renaud', '', '', 1, 1),
(15, 'ARNAU', 'Christian', '', '', 1, 1),
(16, 'ARNAUD', 'Regine', '', '', 1, 1),
(17, 'AUDOIN', 'Jimmy', '', '', 1, 1),
(18, 'AUPHAN', 'Isabel', '', '', 1, 1),
(19, 'AVRIL', 'Sylvie', '', '', 1, 1),
(20, 'BA', 'Joëlle', '', '', 1, 1),
(21, 'BA', 'Ngounda', '', '', 1, 1),
(22, 'BACKHOUSE', 'Antony', '', '', 1, 1),
(23, 'BAHLOUL', 'Kamel-Messaoud', '', '', 1, 1),
(24, 'BALLESTER', 'Jean-Luc', '', '', 1, 1),
(25, 'BARACCA', 'Nancy', '', '', 1, 1),
(26, 'BARGOUD', 'Taoufik', '', '', 1, 1),
(27, 'BARNOUIN', 'Christophe', '', '', 1, 1),
(28, 'BARROT', 'François', '', '', 1, 1),
(29, 'BARTHELEMY', 'Franck', '', '', 1, 1),
(30, 'BASNARY', 'Stéphane', '', '', 1, 1),
(31, 'BATTAIS', 'Sylviane', '', '', 1, 1),
(32, 'BAUDEAU', 'Jean-Luc', '', '', 1, 1),
(33, 'BAUDRY', 'Aurélie', '', '', 1, 1),
(34, 'BAURAUD', 'Sylvette', '', '', 1, 1),
(35, 'BEAUCHAMPS', 'Joel', '', '', 1, 1),
(36, 'BEAUMOIS', 'Richard', '', '', 1, 1),
(37, 'BECKMANN', 'Franck', '', '', 1, 1),
(38, 'BELIN', 'Nicolas', '', '', 1, 1),
(39, 'BELLANGER', 'Nadia', '', '', 1, 1),
(40, 'BELMONTE', 'Régis', '', '', 1, 1),
(41, 'BELPAIRE', 'Bérénice', '', '', 1, 1),
(42, 'BENNETT', 'Robert', '', '', 1, 1),
(43, 'BERBUNTES', 'José Luis', '', '', 1, 1),
(44, 'BERCHENY', 'Nadine', '', '', 1, 1),
(45, 'BERGER', 'Corinne', '', '', 1, 1),
(46, 'BERTIN', 'François', '', '', 1, 1),
(47, 'BERTRAND', 'Olivier', '', '', 1, 1),
(48, 'BIGEAT-STI', 'Jacques', '', '', 1, 1),
(49, 'BILLEAU', 'Julien', '', '', 1, 1),
(50, 'BLANC', 'Catherine', '', '', 1, 1),
(51, 'BLANCHARD', 'Louisette', '', '', 1, 1),
(52, 'BLANCHET', 'Thomas', '', '', 1, 1),
(53, 'BLANDINEAU', 'Thierry', '', '', 1, 1),
(54, 'BLARD', 'Nicolas', '', '', 1, 1),
(55, 'BODIN', 'Daniel', '', '', 1, 1),
(56, 'BOHL', 'Alice', '', '', 1, 1),
(57, 'BOIS', 'Julie', '', '', 1, 1),
(58, 'BOISSEAU-DANSAULT', 'Emmanuelle', '', '', 1, 1),
(59, 'BONIFACIO', 'Jean-François', '', '', 1, 1),
(60, 'BONNET', 'Jean-Michel', '', '', 1, 1),
(61, 'BORILU', 'Catherine', '', '', 1, 1),
(62, 'BOUCHER', 'Baptiste', '', '', 1, 1),
(63, 'BOULANGER', 'Christophe', '', '', 1, 1),
(64, 'BOULKSIBAT', 'Mehdi', '', '', 1, 1),
(65, 'BOURBON', 'Corinne', '', '', 1, 1),
(66, 'BOURDEAU', 'Michelle', '', '', 1, 1),
(67, 'BOURIN', 'Jean-Francois', '', '', 1, 1),
(68, 'BOURINET', 'Richard', '', '', 1, 1),
(69, 'BOURRACHOT', 'Guillaume', '', '', 1, 1),
(70, 'BOURRUT LACOUTURE', 'Geneviève', '', '', 1, 1),
(71, 'BOUSCAILLOU', 'Nicolas', '', '', 1, 1),
(72, 'BOUSSION', 'Didier', '', '', 1, 1),
(73, 'BOUTHINON', 'Patrick', '', '', 1, 1),
(74, 'BOUTILLIER', 'Christophe', '', '', 1, 1),
(75, 'BOUTIN', 'Sebastien', '', '', 1, 1),
(76, 'BOYDENS', 'Sylvie', 'sylie.boydens@cifop.fr', '', 1, 1),
(77, 'BRAY', 'Jean-Paul', '', '', 1, 1),
(78, 'BREGERE', 'Jean-Philippe', '', '', 1, 1),
(79, 'BRETONNIERE', 'Laurent', '', '', 1, 1),
(80, 'BRICHE', 'Eric', '', '', 1, 1),
(81, 'BRIED', 'Karin', '', '', 1, 1),
(82, 'BRIEN', 'Audrey', '', '', 1, 1),
(83, 'BROSSEAU', 'Hervé', '', '', 1, 1),
(84, 'BROUILLET', 'Didier', '', '', 1, 1),
(85, 'BROUSSARD', 'Valérie', '', '', 1, 1),
(86, 'BRUNEAU', 'Jean-Christophe', '', '', 1, 1),
(87, 'BRUNET-ISONO', 'Yoko', '', '', 1, 1),
(88, 'BUFFIER', 'Quentin', '', '', 1, 1),
(89, 'BUISSON', 'Pierre', '', '', 1, 1),
(90, 'BUSSIERE', 'Marylou', '', '', 1, 1),
(91, 'CADENE', 'Martine', '', '', 1, 1),
(92, 'CADORET', 'Stéphanie', '', '', 1, 1),
(93, 'CALVES', 'Raymond', '', '', 1, 1),
(94, 'CALVEZ', 'Dominique', '', '', 1, 1),
(95, 'CAMBEDOUZOU', 'Arnaud', '', '', 1, 1),
(96, 'CAPEYRON', 'Pascal', '', '', 1, 1),
(97, 'CAPUS', 'Philippe', '', '', 1, 1),
(98, 'CARTIER', 'Ann', '', '', 1, 1),
(99, 'CARTRON', 'Joel', '', '', 1, 1),
(100, 'CASSOU', 'Fabrice', '', '', 1, 1),
(101, 'CAUMES', 'Bernard', '', '', 1, 1),
(102, 'CAUT', 'Delphine', '', '', 1, 1),
(103, 'CAZALS', 'Pierre', '', '', 1, 1),
(104, 'CAZEILS', 'Patrick', '', '', 1, 1),
(105, 'CEUNEAU', 'Gilles', '', '', 1, 1),
(106, 'CHAGNOT', 'Alain', '', '', 1, 1),
(107, 'CHALARD', 'Thierry', '', '', 1, 1),
(108, 'CHAMBOULINE', 'Céline', '', '', 1, 1),
(109, 'CHARPIAT', 'Karine', '', '', 1, 1),
(110, 'CHAUVEAU', 'Anne-Sylvie', '', '', 1, 1),
(111, 'CHEDEVILLE', 'Dominique', '', '', 1, 1),
(112, 'CHERMEUX', 'Nathalie', '', '', 1, 1),
(113, 'CHERTIER', 'Philippe', '', '', 1, 1),
(114, 'CHICK', 'Carolyn Delyth', '', '', 1, 1),
(115, 'CHOLLET', 'Anthony', '', '', 1, 1),
(116, 'CHOPINET', 'Yann', '', '', 1, 1),
(117, 'CLEMENCET', 'Candice', '', '', 1, 1),
(118, 'CLEMENT', 'Jean-François', '', '', 1, 1),
(119, 'CLOCHARD', 'Stéphane', '', '', 1, 1),
(120, 'COATES', 'James', '', '', 1, 1),
(121, 'COEFFET', 'Véronique', '', '', 1, 1),
(122, 'COHEN', 'Cathy', '', '', 1, 1),
(123, 'COLLOMB', 'Danièle', '', '', 1, 1),
(124, 'CONSTANTIN', 'Laetitia', '', '', 1, 1),
(125, 'CONVERY-BROUSSAUD', 'Anna Elisabeth', '', '', 1, 1),
(126, 'CORBIER', 'Jean', '', '', 1, 1),
(127, 'CORDEAU', 'Jean-Paul', '', '', 1, 1),
(128, 'CORDONNIER', 'Vincent', '', '', 1, 1),
(129, 'CORNUAUD', 'Sébastien', '', '', 1, 1),
(130, 'CORTES', 'Patricia', '', '', 1, 1),
(131, 'COSTANZI', 'Carlotta', '', '', 1, 1),
(132, 'COULOMBEIX', 'Brice', '', '', 1, 1),
(133, 'COURS', 'ANNULE', '', '', 1, 1),
(134, 'COUSSINE', 'Charlotte', '', '', 1, 1),
(135, 'COUTANCEAU', 'Jean-Pierre', '', '', 1, 1),
(136, 'CRIGENT', 'Emmanuel', '', '', 1, 1),
(137, 'CROCHET', 'Thierry', '', '', 1, 1),
(138, 'CUBERTAFOND', 'Lucette', '', '', 1, 1),
(139, 'CUBERTAFOND', 'Michel', '', '', 1, 1),
(140, 'CURE', 'Alain', '', '', 1, 1),
(141, 'DAFFIS', 'Anne-Laure', '', '', 1, 1),
(142, 'DAGANAUD', 'Laurent', '', '', 1, 1),
(143, 'DAL BO', 'Christine', '', '', 1, 1),
(144, 'DANIEL', 'Brigitte', '', '', 1, 1),
(145, 'DARCHEN', 'Flavie', '', '', 1, 1),
(146, 'DAVIAUX', 'Anne-Lise', '', '', 1, 1),
(147, 'DAVID', 'Guillaume', '', '', 1, 1),
(148, 'DE LUSSAC', 'Philippe', '', '', 1, 1),
(149, 'DEBAST', 'Luc', '', '', 1, 1),
(150, 'DEBRIS', 'Christophe', '', '', 1, 1),
(151, 'DEGEZ', 'Jean-Marie', '', '', 1, 1),
(152, 'DELAGE', 'Aurélie', '', '', 1, 1),
(153, 'DELAGE', 'Catherine', '', '', 1, 1),
(154, 'DELAGE', 'Nathalie', '', '', 1, 1),
(155, 'DELAGE', 'Stéphanie', '', '', 1, 1),
(156, 'DELAHAYE', 'Thibaut', '', '', 1, 1),
(157, 'DELAMER', 'Thierry', '', '', 1, 1),
(158, 'DELESTRE', 'Vincent', '', '', 1, 1),
(159, 'DELEURME', 'Fabien', '', '', 1, 1),
(160, 'DELVILLE', 'Dominique', '', '', 1, 1),
(161, 'DENIER', 'Pierre', '', '', 1, 1),
(162, 'DENKLER', 'Elisabeth', '', '', 1, 1),
(163, 'DERES', 'Laetitia', '', '', 1, 1),
(164, 'DESCLIDES', 'Emeline', '', '', 1, 1),
(165, 'DESCLIDES', 'Patricia', '', '', 1, 1),
(166, 'DESUANT', 'Flora', '', '', 1, 1),
(167, 'DEVIEILLETOILE', 'Sylvie', '', '', 1, 1),
(168, 'DHEYGERE', 'Antoine', '', '', 1, 1),
(169, 'DISSAUX', 'Annie', '', '', 1, 1),
(170, 'DOGNETON', 'Bernard', '', '', 1, 1),
(171, 'DORIA', 'Marie', '', '', 1, 1),
(172, 'DOURSENAUD', 'Bernard', '', '', 1, 1),
(173, 'DOUSSOUX', 'Aurélien', '', '', 1, 1),
(174, 'DROUET', 'Fabien', '', '', 1, 1),
(175, 'DROUILLARD', 'Romuald', '', '', 1, 1),
(176, 'DU MERLE', 'Alienor', '', '', 1, 1),
(177, 'DUBREUIL', 'Jean-Luc', '', '', 1, 1),
(178, 'DUBREUIL-HARDY', 'Mireille', '', '', 1, 1),
(179, 'DUBRUEL', 'Bernard', '', '', 1, 1),
(180, 'DUCHET', 'Julien', '', '', 1, 1),
(181, 'DUCOMMUN', 'Amelie', '', '', 1, 1),
(182, 'DUCONGE GAMAURY', 'Anne-Marie', '', '', 1, 1),
(183, 'DUJARDIN', 'Xavier', '', '', 1, 1),
(184, 'DUNYACH', 'Claude', '', '', 1, 1),
(185, 'DUPE', 'Isabelle', '', '', 1, 1),
(186, 'DURAND QUINTARD', 'Corinne', '', '', 1, 1),
(187, 'DUVEAU', 'Dominique', '', '', 1, 1),
(188, 'DYSON', 'David', '', '', 1, 1),
(189, 'EGALITE', 'Philippe', '', '', 1, 1),
(190, 'EGLER', 'Eric', '', '', 1, 1),
(191, 'EICHHOLZ', 'Régina', '', '', 1, 1),
(192, 'ELGHORRI', 'Yacine', '', '', 1, 1),
(193, 'ELISSALDE', 'Serge', '', '', 1, 1),
(194, 'ENCINAS', 'David', '', '', 1, 1),
(195, 'EPARDEAU', 'Christian', '', '', 1, 1),
(196, 'ETIENNE', 'Chantal', '', '', 1, 1),
(197, 'FACON', 'Edouard', '', '', 1, 1),
(198, 'FAIVRE', 'Amaury', '', '', 1, 1),
(199, 'FARGE', 'Florent', '', '', 1, 1),
(200, 'FAUCHER', 'Olivier', '', '', 1, 1),
(201, 'FAVRE', 'Sega', '', '', 1, 1),
(202, 'FAYE', 'Sophie', '', '', 1, 1),
(203, 'FEDDER BURROUGHS', 'Dawn', '', '', 1, 1),
(204, 'FEDIX', 'Christine', '', '', 1, 1),
(205, 'FERMIGIER', 'Alain', '', '', 1, 1),
(206, 'FLEURENT PASQUIER', 'Chantal', '', '', 1, 1),
(207, 'FOMPROIX', 'Eric', '', '', 1, 1),
(208, 'FONTAINE', 'Gérard', '', '', 1, 1),
(209, 'FONTENIER', 'Marie-Anne', '', '', 1, 1),
(210, 'FOUCHER', 'Martine', '', '', 1, 1),
(211, 'FOULON', 'Stéphane', '', '', 1, 1),
(212, 'FOUQUET', 'Fabrice', '', '', 1, 1),
(213, 'FOURNIER', 'Sylvie', 'sylvie.fournier@cifop.fr', '', 1, 1),
(214, 'FRANK', 'Szilvia', '', '', 1, 1),
(215, 'FRUCHARD', 'Jerome', '', '', 1, 1),
(216, 'GABILLAUD', 'Philippe', '', '', 1, 1),
(217, 'GABORIEAU', 'Jean-Claude', '', '', 1, 1),
(218, 'GAILLARDON', 'Damien', '', '', 1, 1),
(219, 'GARDILLOU', 'Jeanine', '', '', 1, 1),
(220, 'GARNERO', 'Jean-Baptiste', '', '', 1, 1),
(221, 'GATARD', 'Annie', '', '', 1, 1),
(222, 'GAUTHERIE', 'Valérie', '', '', 1, 1),
(223, 'GAUTHIER', 'Bernard', '', '', 1, 1),
(224, 'GAUTHIER', 'Florent', '', '', 1, 1),
(225, 'GAUTIER', 'Valentyna', '', '', 1, 1),
(226, 'GAUVRIT', 'Francis', '', '', 1, 1),
(227, 'GAYOU', 'Marcel', '', '', 1, 1),
(228, 'GAZEAU', 'James', '', '', 1, 1),
(229, 'GEAUFFROY', 'Alain', '', '', 1, 1),
(230, 'GEIMOT', 'Nicole', '', '', 1, 1),
(231, 'GEMOT', 'Guillaume', '', '', 1, 1),
(232, 'GENDRE', 'Aymeric', '', '', 1, 1),
(233, 'GENDRON', 'Annick', '', '', 1, 1),
(234, 'GENEIX', 'Stéphane', '', '', 1, 1),
(235, 'GENEUVRE', 'Sylvie', '', '', 1, 1),
(236, 'GENIN', 'Bernard', '', '', 1, 1),
(237, 'GENOTTIN', 'Stéphane', '', '', 1, 1),
(238, 'GENSANE', 'Carole', '', '', 1, 1),
(239, 'GEOFFROY', 'Didier', '', '', 1, 1),
(240, 'GERARD', 'Morgane', '', '', 1, 1),
(241, 'GHIGOU', 'Bruno', '', '', 1, 1),
(242, 'GICQUEL', 'Eric', '', '', 1, 1),
(243, 'GIMENEZ', 'Eloic', '', '', 1, 1),
(244, 'GINESTET', 'Joëlle', '', '', 1, 1),
(245, 'GIRAUD', 'Edith', '', '', 1, 1),
(246, 'GIRAULT', 'Brigitte', '', '', 1, 1),
(247, 'GLACET', 'Stephane', '', '', 1, 1),
(248, 'GOMES', 'Véronique', '', '', 1, 1),
(249, 'GOMES FERREIRA', 'Carlos', '', '', 1, 1),
(250, 'GOSSE', 'Dominique', '', '', 1, 1),
(251, 'GOUBAULT', 'Pierre', '', '', 1, 1),
(252, 'GOULPEAU', 'Laurence', '', '', 1, 1),
(253, 'GOURDIEN', 'Natacha', '', '', 1, 1),
(254, 'GRACIER', 'Stéphane', '', '', 1, 1),
(255, 'GRANDPRE', 'Sabrina', '', '', 1, 1),
(256, 'GRANGETEAU DUCONGE', 'Julien', '', '', 1, 1),
(257, 'GRASSET', 'Mathieu', '', '', 1, 1),
(258, 'GRAVELLE', 'Christophe', '', '', 1, 1),
(259, 'GRECH', 'Cédric', '', '', 1, 1),
(260, 'GRELLAUD', 'Marie-Claude', '', '', 1, 1),
(261, 'GRESSO', 'Hélène', '', '', 1, 1),
(262, 'GRISLAIN', 'Jean-Philippe', '', '', 1, 1),
(263, 'GROLLERON', 'Pierre', '', '', 1, 1),
(264, 'GUEGUEN', 'Pascal', '', '', 1, 1),
(265, 'GUELLAL', 'Saïd', '', '', 1, 1),
(266, 'GUENON', 'Renaud', '', '', 1, 1),
(267, 'GUERLOTTE', 'Gwenaelle', '', '', 1, 1),
(268, 'GUERRE', 'Gilles', '', '', 1, 1),
(269, 'GUERRE', 'Isabelle', '', '', 1, 1),
(270, 'GUIGNARD', 'Nathalie', '', '', 1, 1),
(271, 'GUIGUI', 'David', '', '', 1, 1),
(272, 'GUIHENEUF', 'Arnaud', '', '', 1, 1),
(273, 'GUILLON', 'Philippe', '', '', 1, 1),
(274, 'GUILLOTEAU', 'Nicolas', '', '', 1, 1),
(275, 'GUYTON', 'Amandine', '', '', 1, 1),
(276, 'HADJI-FTITI', 'Alhem', '', '', 1, 1),
(277, 'HARDY', 'Teresa', '', '', 1, 1),
(278, 'HARENG-PINEAU', 'Victor', '', '', 1, 1),
(279, 'HAYERE', 'Tony', '', '', 1, 1),
(280, 'HEMEZ', 'Jean', '', '', 1, 1),
(281, 'HENNINOT', 'Pascal', '', '', 1, 1),
(282, 'HERBRETEAU', 'Pascal', '', '', 1, 1),
(283, 'HILLAIRET', 'Philippe', '', '', 1, 1),
(284, 'HITIER', 'Sabine', '', '', 1, 1),
(285, 'HOTIN', 'Rony', '', '', 1, 1),
(286, 'HOUDUSSE', 'Gilles', '', '', 1, 1),
(287, 'HUCTEAU', 'Hervé', '', '', 1, 1),
(288, 'HUERTAS', 'Alexandre', '', '', 1, 1),
(289, 'HUERTAS', 'Michel', '', '', 1, 1),
(290, 'HUG', 'Nathalie', '', '', 1, 1),
(291, 'HUNOT', 'Alexis', '', '', 1, 1),
(292, 'HUTHWOHL', 'Christophe', '', '', 1, 1),
(293, 'JEAN', 'Delphine', '', '', 1, 1),
(294, 'JOLAIN', 'Jean-Francois', '', '', 1, 1),
(295, 'JON DE COUPIGNY', 'Agnès', '', '', 1, 1),
(296, 'JUDAS', 'Iris', '', '', 1, 1),
(297, 'JULIEN', 'Laurent', '', '', 1, 1),
(298, 'JULLIEN', 'Elisabeth', '', '', 1, 1),
(299, 'KAZMIERZAK', 'Beata', '', '', 1, 1),
(300, 'KERJEAN', 'Lionel', '', '', 1, 1),
(301, 'KIRCHER', 'Laurent', '', '', 1, 1),
(302, 'KOENNCKE-BENNETT', 'Ulrike', '', '', 1, 1),
(303, 'KREBS', 'Bruce', '', '', 1, 1),
(304, 'KUANG', 'Rong', '', '', 1, 1),
(305, 'KUSTNER', 'Frederic', '', '', 1, 1),
(306, 'L ALEXANDRE', 'Adrien', '', '', 1, 1),
(307, 'LACOSTE', 'Felix', '', '', 1, 1),
(308, 'LAFAURIE', 'Jacques', '', '', 1, 1),
(309, 'LAFFORT', 'Jean-Richard', '', '', 1, 1),
(310, 'LAGAILLARDE', 'Laurent', '', '', 1, 1),
(311, 'LAGARDE', 'Emilie', '', '', 1, 1),
(312, 'LAGUIONIE', 'Jean-François', '', '', 1, 1),
(313, 'LAINE', 'Didier', '', '', 1, 1),
(314, 'LAMBERT', 'Bruna', '', '', 1, 1),
(315, 'LANDIECH', 'Arnaud', '', '', 1, 1),
(316, 'LANDREVIE', 'Mélanie', '', '', 1, 1),
(317, 'LAPIERRE', 'David', '', '', 1, 1),
(318, 'LARUE', 'Isabelle', '', '', 1, 1),
(319, 'LASSALE', 'Alain', '', '', 1, 1),
(320, 'LASSOUTIERE', 'Jean-Claude', '', '', 1, 1),
(321, 'LAUDENBACH', 'Sebastien', '', '', 1, 1),
(322, 'LAUNAY', 'Maria', '', '', 1, 1),
(323, 'LAURENT', 'Isabelle', '', '', 1, 1),
(324, 'LAUTOUR', 'Christian', '', '', 1, 1),
(325, 'LAVAUD', 'Olivier', '', '', 1, 1),
(326, 'LAVAUD', 'Sandra', '', '', 1, 1),
(327, 'LAVAURE', 'Dany', '', '', 1, 1),
(328, 'LAVAURS', 'Sophie', '', '', 1, 1),
(329, 'LAVILLE', 'Dominique', '', '', 1, 1),
(330, 'LE FLOCH', 'Bruno', '', '', 1, 1),
(331, 'LE GRANCHE', 'Tristan', '', '', 1, 1),
(332, 'LE GRAS', 'Marc', '', '', 1, 1),
(333, 'LE GUEN-GEFFROY', 'Loïc', '', '', 1, 1),
(334, 'LE MEE', 'Maël', '', '', 1, 1),
(335, 'LE NEVE', 'Guy', '', '', 1, 1),
(336, 'LEBOISSETIER', 'Rémy', '', '', 1, 1),
(337, 'LECUYER', 'Violaine', '', '', 1, 1),
(338, 'LEGER', 'Mireille', '', '', 1, 1),
(339, 'LEMAIRE', 'Levi', '', '', 1, 1),
(340, 'LEMOINE', 'Thimothée', '', '', 1, 1),
(341, 'LEMOUZY', 'Joelle', '', '', 1, 1),
(342, 'LEONARD', 'Eric', '', '', 1, 1),
(343, 'LEONARD', 'Mireille', '', '', 1, 1),
(344, 'LEPETIT', 'Anne', '', '', 1, 1),
(345, 'LEPOUTRE', 'Géry', '', '', 1, 1),
(346, 'LEPRETRE', 'Jean-Marc', '', '', 1, 1),
(347, 'LERAY', 'Annick', '', '', 1, 1),
(348, 'LEVEQUE', 'Nathalie', '', '', 1, 1),
(349, 'LEVÊQUE', 'Stéphane', '', '', 1, 1),
(350, 'LEYDET', 'Damien', '', '', 1, 1),
(351, 'LHOMME', 'Lydie', '', '', 1, 1),
(352, 'LHOMME', 'Philippe', '', '', 1, 1),
(353, 'LICATA', 'Virginie', '', '', 1, 1),
(354, 'LIERMAN', 'Jean', '', '', 1, 1),
(355, 'LOISEAU', 'Sylvie', '', '', 1, 1),
(356, 'LORY', 'Antoine', '', '', 1, 1),
(357, 'LORY', 'Jean-Philippe', '', '', 1, 1),
(358, 'LOYER', 'Jean-Luc', '', '', 1, 1),
(359, 'LUCAS', 'Anne', '', '', 1, 1),
(360, 'LUCCHI', 'Aurore', '', '', 1, 1),
(361, 'LUNOIR', 'Laurent', '', '', 1, 1),
(362, 'MADRID', 'Alexis', '', '', 1, 1),
(363, 'MAGGIO', 'Nicole', '', '', 1, 1),
(364, 'MAILLEAU', 'Bénédicte', '', '', 1, 1),
(365, 'MALECOT', 'Liliane', '', '', 1, 1),
(366, 'MALINGE', 'Jean-Noël', '', '', 1, 1),
(367, 'MANSENCAL', 'Sébastien', '', '', 1, 1),
(368, 'MANSION', 'Carmen', '', '', 1, 1),
(369, 'MARCETEAU', 'Josiane', '', '', 1, 1),
(370, 'MARCHAND', 'Léo', '', '', 1, 1),
(371, 'MARCHAND', 'Lionel', '', '', 1, 1),
(372, 'MARCISZKO', 'Thierry', '', '', 1, 1),
(373, 'MAROT', 'Stéphane', '', '', 1, 1),
(374, 'MARQUET', 'Thierry', '', '', 1, 1),
(375, 'MARTIN', 'Michel', '', '', 1, 1),
(376, 'MARTIN', 'Renaud', '', '', 1, 1),
(377, 'MARTIN GUTIERREZ', 'Gregorio Victor', '', '', 1, 1),
(378, 'MARTROU', 'Cécile', '', '', 1, 1),
(379, 'MASSART', 'Guillaume', '', '', 1, 1),
(380, 'MASSON', 'René', '', '', 1, 1),
(381, 'MATHIEU', 'Gérard', '', '', 1, 1),
(382, 'MATTEUCCI', 'Elise', '', '', 1, 1),
(383, 'MAURY', 'Camille', '', '', 1, 1),
(384, 'MAZIERE', 'Patrick', '', '', 1, 1),
(385, 'MENARD', 'Bertrand', '', '', 1, 1),
(386, 'MENDLER', 'Tim', '', '', 1, 1),
(387, 'MENZIES', 'Andrew', '', '', 1, 1),
(388, 'MERER', 'Marie Jo', '', '', 1, 1),
(389, 'MERGALET', 'Natacha', '', '', 1, 1),
(390, 'MERLE', 'Pierrick', '', '', 1, 1),
(391, 'MERLHE', 'Sylvie', '', '', 1, 1),
(392, 'MESNER', 'Jonathan', '', '', 1, 1),
(393, 'METIFET', 'Philippe', '', '', 1, 1),
(394, 'MICHEAUD', 'Cathy', '', '', 1, 1),
(395, 'MICHEAUD', 'Nadège', '', '', 1, 1),
(396, 'MICHEL', 'Xavier', '', '', 1, 1),
(397, 'MICHELY', 'Dominique', '', '', 1, 1),
(398, 'MILHORAT', 'Benoît', '', '', 1, 1),
(399, 'MILHORAT', 'Qifang', '', '', 1, 1),
(400, 'MILLIGAN', 'Philippe', '', '', 1, 1),
(401, 'MINGAT', 'Gaelle', '', '', 1, 1),
(402, 'MINGOT', 'Nathalie', '', '', 1, 1),
(403, 'MITATRE', 'Aline', '', '', 1, 1),
(404, 'MITTERRAND', 'Danièle', '', '', 1, 1),
(405, 'MOAL', 'Corinne', '', '', 1, 1),
(406, 'MOENS', 'Bernard', '', '', 1, 1),
(407, 'MONAT', 'Ivan', '', '', 1, 1),
(408, 'MONBOEUF', 'Nadia', '', '', 1, 1),
(409, 'MONIER', 'Pascal', '', '', 1, 1),
(410, 'MONTOYA', 'Maxime', '', '', 1, 1),
(411, 'MORA', 'Vincent', '', '', 1, 1),
(412, 'MORETEAU', 'Constance', '', '', 1, 1),
(413, 'MORRIS', 'Richard', '', '', 1, 1),
(414, 'MOSCOVITCH', 'Olivier', '', '', 1, 1),
(415, 'MOTTET', 'Alexandra', '', '', 1, 1),
(416, 'MOUREY', 'Jean_pierre', '', '', 1, 1),
(417, 'MOYET', 'Catherine', '', '', 1, 1),
(418, 'MURGUET', 'Antoine', '', '', 1, 1),
(419, 'NAJNUDEL', 'Judy', '', '', 1, 1),
(420, 'NARGIEU', 'Olivier', '', '', 1, 1),
(421, 'NAUD', 'Mickaël', '', '', 1, 1),
(422, 'NAUWELAERTS', 'Sylvie', '', '', 1, 1),
(423, 'NEUVILLE', 'Alexandre', '', '', 1, 1),
(424, 'NEVEUX', 'Tony', '', '', 1, 1),
(425, 'NGUYEN', 'Ilan', '', '', 1, 1),
(426, 'NUSSBAUM', 'Véronique', '', '', 1, 1),
(427, 'OHAYON', 'Véronique', '', '', 1, 1),
(428, 'OLIVIER', 'Sylvia', '', '', 1, 1),
(429, 'OLLION', 'Jean-Philippe', '', '', 1, 1),
(430, 'OPPMANN', 'Titus', '', '', 1, 1),
(431, 'OTTOCHIAN', 'Valérie', '', '', 1, 1),
(432, 'PACCOU', 'Marie', '', '', 1, 1),
(433, 'PALACIOS', 'Bernard', '', '', 1, 1),
(434, 'PAMPIGLIONE', 'Yann', '', '', 1, 1),
(435, 'PARISI', 'Morgane', '', '', 1, 1),
(436, 'PARIZEL', 'Romain', '', '', 1, 1),
(437, 'PAULHAN', 'Camille', '', '', 1, 1),
(438, 'PECHARMAN', 'Alexis', '', '', 1, 1),
(439, 'PENNEL', 'Corey', '', '', 1, 1),
(440, 'PENNINGTON', 'Ross', '', '', 1, 1),
(441, 'PERON', 'Anne-Françoise', '', '', 1, 1),
(442, 'PERONNEAU', 'Michel', '', '', 1, 1),
(443, 'PEROT', 'Patrick', '', '', 1, 1),
(444, 'PERRAULT', 'Olivier', '', '', 1, 1),
(445, 'PERRIER DUMONT', 'Catherine', '', '', 1, 1),
(446, 'PERROT', 'Antoine', '', '', 1, 1),
(447, 'PESENTI', 'Stéphanie', '', '', 1, 1),
(448, 'PETIPRE', 'Marion', '', '', 1, 1),
(449, 'PETIT', 'Bernard', '', '', 1, 1),
(450, 'PEYRET', 'Stéphanie', '', '', 1, 1),
(451, 'PEYRET', 'Vincent', '', '', 1, 1),
(452, 'PICARD', 'Cédric', '', '', 1, 1),
(453, 'PICAUT', 'Violaine', '', '', 1, 1),
(454, 'PICHARDIE', 'Séverine', '', '', 1, 1),
(455, 'PINEAU', 'Bruno', '', '', 1, 1),
(456, 'PINEAU', 'Maïté', '', '', 1, 1),
(457, 'PIQUARD', 'Laurent', '', '', 1, 1),
(458, 'PIQUEUX', 'Catherine', '', '', 1, 1),
(459, 'PITOT-BELIN', 'Armelle', '', '', 1, 1),
(460, 'PIVETAUD', 'Géraldine', '', '', 1, 1),
(461, 'PLAZER', 'Virginie', '', '', 1, 1),
(462, 'POINDRON', 'Erwann', '', '', 1, 1),
(463, 'POOLE', 'David', '', '', 1, 1),
(464, 'PORTIER', 'Joel', '', '', 1, 1),
(465, 'POTUAUD', 'Marie-Madeleine', '', '', 1, 1),
(466, 'POULAIN', 'Florent', '', '', 1, 1),
(467, 'PRIGENT', 'Armelle', '', '', 1, 1),
(468, 'PRINCIPAUD', 'Hélène', '', '', 1, 1),
(469, 'PRIOUX', 'Franck', '', '', 1, 1),
(470, 'PRIOUX', 'Ghislaine', '', '', 1, 1),
(471, 'PROVOST', 'Corinne', '', '', 1, 1),
(472, 'PUTHIER', 'Céline', '', '', 1, 1),
(473, 'QUATRAVAUX', 'Guillaume', '', '', 1, 1),
(474, 'QUERAUX', 'Severine', '', '', 1, 1),
(475, 'QUICHAUD', 'Bernard', '', '', 1, 1),
(476, 'RABAUD', 'Suzette', '', '', 1, 1),
(477, 'RACAUD', 'Fanny', '', '', 1, 1),
(478, 'RASPIC', 'Corinne', '', '', 1, 1),
(479, 'RAT', 'Christian', '', '', 1, 1),
(480, 'REAUD', 'Christine', '', '', 1, 1),
(481, 'REDON', 'Sylvie', '', '', 1, 1),
(482, 'REIGNER', 'Yves', '', '', 1, 1),
(483, 'REMARK', 'Catherine', '', '', 1, 1),
(484, 'RENATO', '', '', '', 1, 1),
(485, 'RENAUD', 'Maxime', '', '', 1, 1),
(486, 'RENOU', 'Hélène', '', '', 1, 1),
(487, 'RENOUF', 'Pierre-Francois', '', '', 1, 1),
(488, 'RENOUX', 'Mathieu', '', '', 1, 1),
(489, 'REY', 'Philippe', '', '', 1, 1),
(490, 'RHODE', 'Alain', '', '', 1, 1),
(491, 'RIFFAUD', 'Peter', '', '', 1, 1),
(492, 'RIVET', 'Jean-Christian', '', '', 1, 1),
(493, 'ROBERT', 'Céline', '', '', 1, 1),
(494, 'ROBERT', 'Jérôme', '', '', 1, 1),
(495, 'ROCHE', 'Magali', '', '', 1, 1),
(496, 'ROJO', 'Alejandra', '', '', 1, 1),
(497, 'ROLLAND', 'Jean-Marc', '', '', 1, 1),
(498, 'ROLLAND', 'Michel', '', '', 1, 1),
(499, 'RONSE', 'Josselin', '', '', 1, 1),
(500, 'ROUGET', 'Laurent', '', '', 1, 1),
(501, 'ROUGIER', 'Jean-Eric', '', '', 1, 1),
(502, 'ROUGIER', 'Rachel', '', '', 1, 1),
(503, 'ROULAUD', 'Philippe', '', '', 1, 1),
(504, 'ROUSSAUX', 'Philippe', '', '', 1, 1),
(505, 'ROUSSEAU', 'Vincent', '', '', 1, 1),
(506, 'ROUSSELET', 'Jean-Marc', '', '', 1, 1),
(507, 'ROUYER', 'Corinne', '', '', 1, 1),
(508, 'ROY', 'Arnaud', '', '', 1, 1),
(509, 'ROY', 'Patrick', '', '', 1, 1),
(510, 'RUCHAUD', 'Nathalie', '', '', 1, 1),
(511, 'RUDLER', 'Stéphanie', '', '', 1, 1),
(512, 'RUIZ', 'Catherine', '', '', 1, 1),
(513, 'RULLIER', 'Jean-Marie', '', '', 1, 1),
(514, 'RYTER', 'Romain', '', '', 1, 1),
(515, 'SABATHIER', 'Pascale', '', '', 1, 1),
(516, 'SABOURIN', 'Gael', '', '', 1, 1),
(517, 'SAMSON', 'Laurent', '', '', 1, 1),
(518, 'SANCHEZ', 'Mercedes', '', '', 1, 1),
(519, 'SARDIN', 'Bruno', '', '', 1, 1),
(520, 'SARDIN', 'Jacques-Louis', '', '', 1, 1),
(521, 'SAURY', 'Karine', '', '', 1, 1),
(522, 'SCANLON', 'Mathieu', '', '', 1, 1),
(523, 'SCECHET', 'Pierre', '', '', 1, 1),
(524, 'SCHOEN', 'Patrice', '', '', 1, 1),
(525, 'SEEBOLD', 'Claudia', '', '', 1, 1),
(526, 'SEGUIN', 'Aurore', '', '', 1, 1),
(527, 'SEGUIN', 'Guy', '', '', 1, 1),
(528, 'SERRAND', 'Kristof', '', '', 1, 1),
(529, 'SERRANO', 'Jean-Luc', '', '', 1, 1),
(530, 'SERVAIS', 'Raoul', '', '', 1, 1),
(531, 'SERVE', 'Martine', '', '', 1, 1),
(532, 'SHELDON', 'Alexandra', '', '', 1, 1),
(533, 'SIMON', 'Erik', '', '', 1, 1),
(534, 'SIROTA', 'Bruno', '', '', 1, 1),
(535, 'SOISSON', 'Michael', '', '', 1, 1),
(536, 'SOKOLSKI', 'Przemyslaw', '', '', 1, 1),
(537, 'SOSSI ALAOUI', 'Amine', '', '', 1, 1),
(538, 'SOUIL', 'Frédérique', '', '', 1, 1),
(539, 'SOULARUE', 'Monique', '', '', 1, 1),
(540, 'SOULET', 'Christine', '', '', 1, 1),
(541, 'SPIRY', 'Audrey', '', '', 1, 1),
(542, 'STEPHENS', 'David Leslie', '', '', 1, 1),
(543, 'STEPHENS', 'Janice Lee', '', '', 1, 1),
(544, 'TAMURA', 'Yoshimichi', '', '', 1, 1),
(545, 'TANDONNET', 'Isabelle', '', '', 1, 1),
(546, 'TARDIEU', 'Pascal', '', '', 1, 1),
(547, 'TARTAGLIONE', 'Antoine', '', '', 1, 1),
(548, 'TERRADE', 'Christelle', '', '', 1, 1),
(549, 'TETARD', 'Joel', '', '', 1, 1),
(550, 'TETLOW', 'Linda', '', '', 1, 1),
(551, 'THEAULT', 'Frédéric', '', '', 1, 1),
(552, 'THIERS', 'Angélique', '', '', 1, 1),
(553, 'THOMAS', 'Nathalie', '', '', 1, 1),
(554, 'TIEB', 'Jean-Denis', '', '', 1, 1),
(555, 'TOLEDO', 'Carole', '', '', 1, 1),
(556, 'TORREARO', 'Luis', '', '', 1, 1),
(557, 'TRAUTMANN', 'Magali', '', '', 1, 1),
(558, 'TRIGEAU', 'Eric', '', '', 1, 1),
(559, 'TRONDHEIM', 'Lewis', '', '', 1, 1),
(560, 'TROPLONG', 'Joëlle', '', '', 1, 1),
(561, 'TROUPENAT', 'Michèle', '', '', 1, 1),
(562, 'TRUEL', 'Aurélie', '', '', 1, 1),
(563, 'TURPAULT', 'Jean', '', '', 1, 1),
(564, 'UJADOS BENNETT', 'Maria', '', '', 1, 1),
(565, 'URBAN', 'Stéphanie', '', '', 1, 1),
(566, 'USSEGLIO', 'Marie-Odile', '', '', 1, 1),
(567, 'VAILLANT', 'Patrice', '', '', 1, 1),
(568, 'VALDES', 'Pascal', '', '', 1, 1),
(569, 'VALLEE', 'Karine', '', '', 1, 1),
(570, 'VAN LIEMT', 'Emilie', '', '', 1, 1),
(571, 'VANDEN ABEELE', 'Ludovic', '', '', 1, 1),
(572, 'VERDON', 'Jeanne-Marie', '', '', 1, 1),
(573, 'VERET', 'Christophe', '', '', 1, 1),
(574, 'VERET', 'Frédéric', '', '', 1, 1),
(575, 'VIALLE', 'Christophe', '', '', 1, 1),
(576, 'VIDALIE', 'Claire', '', '', 1, 1),
(577, 'VIDEAU', '', '', '', 1, 1),
(578, 'VIGIER', 'Stéphanie', '', '', 1, 1),
(579, 'VIGNAUD', 'Camille', '', '', 1, 1),
(580, 'VILLARD', 'Bruno', '', '', 1, 1),
(581, 'VIMENET', 'Pascal', '', '', 1, 1),
(582, 'VION', 'Nicolas', '', '', 1, 1),
(583, 'WEINACHTER', 'Alain', '', '', 1, 1),
(584, 'WEISSE', 'Jean-Marc', '', '', 1, 1),
(585, 'WOOD', 'Nicholas', '', '', 1, 1),
(586, 'XERRI', 'Laetitia', '', '', 1, 1),
(587, 'ZEGHLOUL', 'Thami', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `demande_resa`
--

CREATE TABLE IF NOT EXISTS `demande_resa` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `demande_date_deb` datetime NOT NULL,
  `demande_date_fin` datetime NOT NULL,
  `demande_destination` varchar(40) CHARACTER SET utf8 NOT NULL,
  `demande_motif` varchar(40) CHARACTER SET utf8 NOT NULL,
  `id_agent_demande` int(11) NOT NULL,
  PRIMARY KEY (`id_demande`,`id_agent_demande`),
  KEY `FK_demande_resa_id_agent_demande` (`id_agent_demande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `indisponibilite`
--

CREATE TABLE IF NOT EXISTS `indisponibilite` (
  `id_indispo` int(11) NOT NULL AUTO_INCREMENT,
  `indispo_deb` datetime NOT NULL,
  `indispo_fin` datetime NOT NULL,
  `id_motif_motif_indisponibilite` int(11) NOT NULL,
  `id_vehicule_vehicule` int(11) NOT NULL,
  PRIMARY KEY (`id_indispo`),
  KEY `FK_disponibilite_id_vehicule_vehicule` (`id_vehicule_vehicule`),
  KEY `FK_indisponibilite_id_motif_motif_indisponibilite` (`id_motif_motif_indisponibilite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nom_login` varchar(30) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `id_role_role` int(11) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `FK_login_id_role_role` (`id_role_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id_login`, `nom_login`, `mdp`, `id_role_role`) VALUES
(1, 'admin', 'dece3b8afb4ac0c22d03da93e7a343f6fc6b39e6', 1),
(2, 'agent', '5e871a2138c9df0ced403e135003c261c98285f6', 2);

-- --------------------------------------------------------

--
-- Structure de la table `motif_indisponibilite`
--

CREATE TABLE IF NOT EXISTS `motif_indisponibilite` (
  `id_motif` int(11) NOT NULL AUTO_INCREMENT,
  `motif_indisp` varchar(25) NOT NULL,
  PRIMARY KEY (`id_motif`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `motif_indisponibilite`
--

INSERT INTO `motif_indisponibilite` (`id_motif`, `motif_indisp`) VALUES
(1, 'reserve'),
(2, 'entretien');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE IF NOT EXISTS `poste` (
  `id_poste` int(2) NOT NULL AUTO_INCREMENT,
  `libelle_poste` varchar(25) NOT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `libelle_poste`) VALUES
(1, 'commercial'),
(2, 'responsable'),
(3, 'professeur'),
(4, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `deb_reservation` datetime NOT NULL,
  `fin_reservation` datetime NOT NULL,
  `dest_reservation` varchar(40) NOT NULL,
  `motif_reservation` varchar(40) NOT NULL,
  `id_agent_agent` int(11) NOT NULL,
  `id_vehicule_vehicule` int(11) NOT NULL,
  PRIMARY KEY (`id_agent_agent`,`id_vehicule_vehicule`),
  KEY `FK_reservation_id_vehicule_vehicule` (`id_vehicule_vehicule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(25) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'admin'),
(2, 'agent');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `immat_vehicule` varchar(15) NOT NULL,
  `mod_vehicule` varchar(25) NOT NULL,
  `date_assu_vehicule` date NOT NULL,
  `km_vehicule` int(6) NOT NULL,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `immat_vehicule`, `mod_vehicule`, `date_assu_vehicule`, `km_vehicule`) VALUES
(1, 'CM-137-JR', 'C4', '2013-12-31', ''),
(2, 'CM-091-JR', 'C3', '2013-12-31', ''),
(3, 'CM-115-JR', 'C3', '2013-12-31', ''),
(4, 'CM-155-JR', 'C3', '2013-12-31', ''),
(5, 'CM-193-JR', 'C3', '2013-12-31', ''),
(6, 'CM-197-JR', 'C3', '2013-12-31', '');

-- --------------------------------------------------------

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `FK_agent_id_login_login` FOREIGN KEY (`id_login_login`) REFERENCES `login` (`id_login`),
  ADD CONSTRAINT `FK_agent_id_poste_poste` FOREIGN KEY (`id_poste_poste`) REFERENCES `poste` (`id_poste`);

--
-- Contraintes pour la table `demande_resa`
--
ALTER TABLE `demande_resa`
  ADD CONSTRAINT `FK_demande_resa_id_agent_demande` FOREIGN KEY (`id_agent_demande`) REFERENCES `agent` (`id_agent`);

--
-- Contraintes pour la table `indisponibilite`
--
ALTER TABLE `indisponibilite`
  ADD CONSTRAINT `FK_indisponibilite_id_motif_motif_indisponibilite` FOREIGN KEY (`id_motif_motif_indisponibilite`) REFERENCES `motif_indisponibilite` (`id_motif`),
  ADD CONSTRAINT `FK_indisponibilite_id_vehicule_vehicule` FOREIGN KEY (`id_vehicule_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

--
-- Contraintes pour la table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_login_id_role_role` FOREIGN KEY (`id_role_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_reservation_id_agent_agent` FOREIGN KEY (`id_agent_agent`) REFERENCES `agent` (`id_agent`),
  ADD CONSTRAINT `FK_reservation_id_vehicule_vehicule` FOREIGN KEY (`id_vehicule_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
