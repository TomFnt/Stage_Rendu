-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 11 Février 2022 à 16:18
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stage_gestion_cartouche`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartouche`
--

CREATE TABLE `cartouche` (
  `IdCartouche` int(11) NOT NULL,
  `NomCartouche` varchar(30) NOT NULL,
  `CodeBarre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Etat : 0=Entree   1=Sortie';

--
-- Contenu de la table `cartouche`
--

INSERT INTO `cartouche` (`IdCartouche`, `NomCartouche`, `CodeBarre`) VALUES
(1, '62 XL Noir', '725184104206'),
(2, '62 XL Noir', 'SU828A'),
(3, '62 XL trois Couleurs', '725184104121'),
(4, '62 XL trois Couleurs', '886111748914'),
(5, '920 XL Noir', '884420649489'),
(6, '920 XL Cyan', '884420649274'),
(7, '920 XL Jaune', '884420649410'),
(8, '920 XL Magenta', '884420649342'),
(9, '953 XL Magenta', '725184104121'),
(10, '953 XL Cyan', '725184104091'),
(11, '953 XL Noir', '725184104183'),
(12, '953 XL Jaune', '725184104152'),
(13, '951 XL Magenta', '886111748938'),
(14, '951 XL Cyan', '886111748921'),
(15, '951 XL Cyan', '886111615285'),
(16, '951 XL Jaune', '886111748945'),
(17, '951 XL Jaune', '886111748990'),
(18, '950 XL Noir', '886111748914'),
(19, 'CR324A Tete d\'Impression', '5711045489730'),
(20, '745 Noir Mat', '725184104688'),
(21, '745 Noir Mat', '1PF9K05A'),
(22, '745 Noir Photo', '725184104671'),
(23, '745 Noir Photo', '1PF9K04A'),
(24, '745 Cyan', '725184104664'),
(25, '745 Cyan', '1PF9K03A'),
(26, '745 Yellow', '725184104657'),
(27, '745 Yellow', '1PF9K02A'),
(28, '745 Magenta', '725184104640'),
(29, '745 Magenta', '1PF9K01A'),
(30, '745 Rouge Chromatique', '725184104695'),
(31, '745 Rouge Chromatique', '1PF9K06A'),
(32, 'T7892 Cyan', '8715946529264'),
(33, 'T7891 Black', '8715946529233'),
(34, 'T7894 Yellow', '8715946529288'),
(35, 'T7893 Magenta', '8715946529271'),
(36, 'T7011 Black', '8715946487090'),
(37, 'T7012 Cyan', '8715946490090'),
(38, 'T7013 Magenta', '8715946487113'),
(39, 'T7014 Yellow', '8715946487120'),
(40, '744 Magenta Yellow', '725184104503'),
(41, '744 Magenta Yellow', '1PF9J87A'),
(42, '744 Noir Mat Rouge Chromatique', '725184104510'),
(43, '744 Noir Mat Rouge Chromatique', '1PF9J88A'),
(44, '744 Cyan', '725184104497'),
(45, '744 Cyan', '1PF9J86A'),
(46, 'CF230XC Noir', '1PCF230XC'),
(47, 'CF230XC Noir', '889899047842'),
(48, 'CE255X Noir', '4260061994090'),
(49, 'CE255X Noir', '55X_078077219219K020001'),
(50, 'CF230X Noir', '3760060611253'),
(51, 'CF230X Noir', 'HS7TXDSLV'),
(52, 'CF259XC Noir', '1PCF259XC'),
(53, 'CF259XC Noir', '4LFR'),
(54, 'CF259XC Noir', '192545175982'),
(55, 'CF232A Tambour', '1PCF232A'),
(56, 'CF232A Tambour', '889894797483'),
(57, 'CF232A Tambour', '4LVN'),
(58, 'CF232A Tambour', '1364'),
(59, 'MLT-R116 Tambour', 'CNB1MCK208'),
(60, 'MLT-R116 Tambour', 'SV134A'),
(61, 'MLT-R116 Tambour', '191628484386'),
(62, 'DR2200/006R03134 Tambour', '095205990812'),
(63, 'DR2200/006R03134 Tambour', '006R03134'),
(64, 'DR2200/006R03134 Tambour', 'DR220013678425840000'),
(65, 'TN2220/106R02634 Noir', '3760060618634'),
(66, 'TN2220/106R02634 Noir', '095205966305'),
(67, 'TN2220/106R02634 Noir', '106R02634'),
(68, 'TN2220/106R02634 Noir', 'BCTN2220*138515V0042'),
(69, '3070169 Ruban Nylon Noir', '734646397438'),
(70, 'CE278AC Noir', '3398B00+'),
(71, 'CE278AC Noir', '1PCE278AC'),
(72, 'CE278AC Noir', '887111062802'),
(73, 'CF226XC Noir', '1PCF226XC'),
(74, 'CF226XC Noir', '889296531678'),
(75, 'CF287XC Noir', '1PCF287XC'),
(76, 'CF287XC Noir', '889296531623'),
(77, '50F2H00/502H Noir', '3760060616937'),
(78, '50F2H00/502H Noir', '734646433211'),
(79, '50F2H00/502H Noir', 'P50F2H00'),
(80, '50F2H00/502H Noir', 'SCAP210252953'),
(81, '50F0Z00 Tambour', '734646433365'),
(82, '50F0Z00 Tambour', 'P50F0Z00'),
(83, '50F0Z00 Tambour', 'SCAD191663AA0'),
(84, '570 PGBK XL Noir', '4549292032826'),
(85, '571 XL Magenta', '4549292032871'),
(86, '571 XL Yellow', '8714574631776'),
(87, '571 XL Yellow', '4549292032888'),
(88, '571 XL Cyan', '4549292032857'),
(89, 'CF411XC Cyan', '3760060610515'),
(90, 'CF411XC Cyan', '1PCF411XC'),
(91, 'CF411XC Cyan', '889296531647'),
(92, 'CF413XC Magenta', '3760060610522'),
(93, 'CF413XC Magenta', '1PCF413XC'),
(94, 'CF413XC Magenta', '889296531661'),
(95, 'CF413XC Magenta', '1139'),
(96, 'CF413XC Magenta', '1PCF413X'),
(97, 'CF413XC Magenta', '888793807576'),
(98, 'CF412XC Yellow', '3760060610539'),
(99, 'CF412XC Yellow', '1PCF412XC'),
(100, 'CF412XC Yellow', '889296531654'),
(101, 'CF412XC Yellow', '1137'),
(102, 'CF412XC Yellow', '1PCF412X'),
(103, 'CF412XC Yellow', '888793807569'),
(104, 'CF410XC Noir', '3760060610508'),
(105, 'CF410XC Noir', '1PCF410XC'),
(106, 'CF410XC Noir', '889296531630'),
(107, 'AAAAA', 'boop');

-- --------------------------------------------------------

--
-- Structure de la table `cartouche_entree`
--

CREATE TABLE `cartouche_entree` (
  `IdEntree` int(11) NOT NULL,
  `CodeBarre` varchar(30) NOT NULL,
  `NomService` text,
  `DateEntree` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cartouche_entree`
--

INSERT INTO `cartouche_entree` (`IdEntree`, `CodeBarre`, `NomService`, `DateEntree`) VALUES
(10, 'SU828A', NULL, '2021-12-21'),
(11, 'SU828A', NULL, '2021-12-21'),
(12, 'SU828A', NULL, '2021-12-21'),
(13, '725184104121', NULL, '2021-12-21'),
(14, '725184104121', NULL, '2021-12-21'),
(15, '886111615285', NULL, '2021-12-21'),
(16, '886111615285', NULL, '2021-12-21'),
(17, '886111748914', NULL, '2021-12-21'),
(18, '886111748938', NULL, '2021-12-21'),
(19, 'SU828A', NULL, '2021-12-21'),
(20, 'SU828A', NULL, '2021-12-21'),
(21, 'SU828A', NULL, '2021-12-21'),
(22, 'SU828A', NULL, '2021-12-21'),
(23, 'SU828A', NULL, '2021-12-21'),
(24, 'SU828A', NULL, '2021-12-21'),
(25, '725184104121', NULL, '2021-12-21'),
(26, '725184104121', NULL, '2021-12-21'),
(27, '725184104121', NULL, '2021-12-21'),
(28, '725184104121', NULL, '2021-12-21'),
(29, '725184104121', NULL, '2021-12-21'),
(30, '886111615285', NULL, '2021-12-21'),
(31, '886111615285', NULL, '2021-12-21'),
(32, '886111615285', NULL, '2021-12-21'),
(33, '886111748914', NULL, '2021-12-21'),
(34, '886111748938', NULL, '2021-12-21'),
(35, '725184104183', NULL, '2021-12-21'),
(36, '725184104183', NULL, '2021-12-21'),
(37, '725184104152', NULL, '2021-12-21'),
(38, '725184104152', NULL, '2021-12-21'),
(39, '725184104114', NULL, '2021-12-21'),
(40, '725184104114', NULL, '2021-12-21'),
(41, '886111748938', NULL, '2021-12-21'),
(42, '886111615285', NULL, '2021-12-21'),
(43, '886111615285', NULL, '2021-12-21'),
(44, '886111748945', NULL, '2021-12-21'),
(45, '886111748945', NULL, '2021-12-21'),
(46, '886111748914', NULL, '2021-12-21'),
(47, '886111748914', NULL, '2021-12-21'),
(48, 'SU828A', NULL, '2021-12-21'),
(49, 'SU828A', NULL, '2021-12-21'),
(50, 'SU828A', NULL, '2021-12-21'),
(51, 'SU828A', NULL, '2021-12-21'),
(52, 'SU828A', NULL, '2021-12-21'),
(53, 'SU828A', NULL, '2021-12-21'),
(54, '886111748938', NULL, '2021-12-21'),
(55, '886111748938', NULL, '2021-12-21'),
(56, '886111748938', NULL, '2021-12-21'),
(57, '886111748938', NULL, '2021-12-21'),
(58, '725184104145', NULL, '2021-12-21'),
(59, '725184104145', NULL, '2021-12-21'),
(60, '725184104145', NULL, '2021-12-21'),
(61, '886111748921', NULL, '2021-12-21'),
(62, '886111748921', NULL, '2021-12-21'),
(63, '886111748921', NULL, '2021-12-21'),
(64, '886111748945', NULL, '2021-12-21'),
(65, '886111748945', NULL, '2021-12-21'),
(66, '886111748945', NULL, '2021-12-21'),
(67, '725184104152', NULL, '2021-12-21'),
(68, '725184104152', NULL, '2021-12-21'),
(69, '725184104152', NULL, '2021-12-21'),
(70, '725184104114', NULL, '2021-12-21'),
(71, '725184104114', NULL, '2021-12-21'),
(72, '725184104114', NULL, '2021-12-21'),
(73, '886111615278', NULL, '2021-12-21'),
(74, '886111615278', NULL, '2021-12-21'),
(75, '886111615278', NULL, '2021-12-21'),
(76, '725184104206', NULL, '2021-12-21'),
(77, '725184104206', NULL, '2021-12-21'),
(78, '725184104206', NULL, '2021-12-21');

-- --------------------------------------------------------

--
-- Structure de la table `cartouche_sortie`
--

CREATE TABLE `cartouche_sortie` (
  `idSortie` int(11) NOT NULL,
  `CodeBarre` varchar(30) NOT NULL,
  `NomService` text NOT NULL,
  `DateSortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cartouche_sortie`
--

INSERT INTO `cartouche_sortie` (`idSortie`, `CodeBarre`, `NomService`, `DateSortie`) VALUES
(136, 'SU828A', 'Centre_social', '2021-12-21'),
(137, 'SU828A', 'INTERIEUR', '2021-12-21'),
(138, 'SU828A', 'LOGEMENT', '2021-12-21'),
(139, 'SU828A', 'Centre_social', '2021-12-21'),
(140, 'SU828A', 'ELUS', '2021-12-21'),
(141, 'SU828A', 'ELUS', '2021-12-21'),
(142, 'SU828A', 'Espace_Maes', '2021-12-21'),
(143, 'SU828A', 'Espace_Maes', '2021-12-21'),
(144, 'SU828A', 'INTERIEUR', '2021-12-21'),
(145, 'SU828A', 'LOGEMENT', '2021-12-21'),
(146, 'SU828A', 'LOGEMENT', '2021-12-21'),
(147, 'SU828A', 'Site_Louis_Blanc', '2021-12-21'),
(148, '725184104121', 'Centre_social', '2021-12-21'),
(149, '725184104121', 'ETAT_CIVIL', '2021-12-21'),
(150, '725184104121', 'SECRETARIAT', '2021-12-21'),
(151, '725184104121', 'Centre_social', '2021-12-21'),
(152, '725184104121', 'ETAT_CIVIL', '2021-12-21'),
(153, '725184104121', 'SECRETARIAT', '2021-12-21'),
(154, '725184104121', 'SECRETARIAT', '2021-12-21'),
(155, '725184104121', 'Site_Leon_Blum', '2021-12-21'),
(156, '886111615285', 'C.D.P', '2021-12-21'),
(157, '886111615285', 'Centre_social', '2021-12-21'),
(158, '886111615285', 'Centre_social', '2021-12-21'),
(159, '886111615285', 'COMMUNICATION', '2021-12-21'),
(160, '886111615285', 'D.G.S', '2021-12-21'),
(161, '886111615285', 'Petite_Enfance', '2021-12-21'),
(162, '886111748914', 'C.D.P', '2021-12-21'),
(163, '886111748914', 'CAJ_Plage', '2021-12-21'),
(164, '886111748938', 'COMMUNICATION', '2021-12-21'),
(165, '886111748938', 'Site_Leon_Blum', '2021-12-21'),
(166, '725184104183', 'ETAT_CIVIL', '2021-12-21'),
(167, '725184104183', 'ETAT_CIVIL', '2021-12-21'),
(168, '725184104152', 'R.H.', '2021-12-21'),
(169, '725184104152', 'R.H.', '2021-12-21'),
(170, '725184104114', 'R.H.', '2021-12-21'),
(171, '725184104114', 'INFORMATIQUE', '2021-12-21'),
(172, '886111748938', 'INFORMATIQUE', '2021-12-21'),
(173, '886111615285', 'INFORMATIQUE', '2021-12-21'),
(174, '886111615285', 'SERV_TECHNIQUE', '2021-12-21'),
(175, '886111748945', 'SERV_TECHNIQUE', '2021-12-21'),
(176, '886111748945', 'JURIDIQUE_ASSURANCES', '2021-12-21'),
(177, '886111748914', 'JURIDIQUE_ASSURANCES', '2021-12-21'),
(178, '886111748914', 'JURIDIQUE_ASSURANCES', '2021-12-21'),
(179, 'SU828A', 'JURIDIQUE_ASSURANCES', '2021-12-21'),
(180, 'SU828A', 'JURIDIQUE_ASSURANCES', '2021-12-21'),
(181, 'SU828A', 'JURIDIQUE_ASSURANCES', '2021-12-21'),
(182, 'SU828A', 'SERV_ATELIER', '2021-12-21'),
(183, 'SU828A', 'GARAGE/REGIE_VOIRIE', '2021-12-21'),
(184, 'SU828A', 'GARAGE/REGIE_VOIRIE', '2021-12-21'),
(185, '886111748938', 'GARAGE/REGIE_VOIRIE', '2021-12-21'),
(186, '886111748938', 'CIMETIERES', '2021-12-21'),
(187, '886111748938', 'CIMETIERES', '2021-12-21'),
(188, '886111748938', 'URBANISME', '2021-12-21'),
(189, '725184104145', 'CULTURE', '2021-12-21'),
(190, '725184104145', 'CULTURE', '2021-12-21'),
(191, '725184104145', 'CULTURE', '2021-12-21'),
(192, '886111748921', 'PISCINE', '2021-12-21'),
(193, '886111748921', 'CHATEAU_MUSEE', '2021-12-21'),
(194, '886111748921', 'CHATEAU_MUSEE', '2021-12-21'),
(195, '886111748945', 'CHATEAU_MUSEE', '2021-12-21'),
(196, '886111748945', 'CHATEAU_MUSEE', '2021-12-21'),
(197, '886111748945', 'CRYPTE', '2021-12-21'),
(198, '725184104152', 'ARCHIVES_MUNICIPALES', '2021-12-21'),
(199, '725184104152', 'ARCHIVES_MUNICIPALES', '2021-12-21'),
(200, '725184104152', ' BIBLIOTHEQUE', '2021-12-21'),
(201, '725184104114', 'MEDIATHEQUE', '2021-12-21'),
(202, '725184104114', 'MEDIATHEQUE', '2021-12-21'),
(203, '725184104114', 'EMA', '2021-12-21'),
(204, '886111615278', 'MEDIATHEQUE', '2021-12-21'),
(205, '886111615278', 'MEDIATHEQUE', '2021-12-21'),
(206, '886111615278', 'EMA', '2021-12-21'),
(207, '725184104206', 'JEUNESSE', '2021-12-21'),
(208, '725184104206', 'JEUNESSE', '2021-12-21'),
(209, '725184104206', 'JEUNESSE', '2021-12-21'),
(210, 'SU828A', 'Petite_Enfance', '2021-12-22'),
(211, 'SU828A', 'Petite_Enfance', '2021-12-22'),
(212, '725184104121', 'Enseignement', '2021-12-22'),
(213, '725184104121', 'Enseignement', '2021-12-22'),
(214, '725184104183', 'Enseignement', '2021-12-22'),
(215, '725184104183', 'Enseignement', '2021-12-22'),
(216, '725184104152', 'Enseignement', '2021-12-22'),
(217, '725184104152', 'Enseignement', '2021-12-22'),
(218, '725184104114', 'SECRETARIAT', '2021-12-22'),
(219, '725184104114', 'SECRETARIAT', '2021-12-22'),
(220, '886111748938', 'D.G.S', '2021-12-22'),
(221, '886111615285', 'SECRETARIAT', '2021-12-22'),
(222, '886111615285', 'SECRETARIAT', '2021-12-22'),
(223, '886111748945', 'ETAT_CIVIL', '2021-12-22'),
(224, '886111748945', 'INFORMATIQUE', '2021-12-22'),
(225, '886111748914', 'INFORMATIQUE', '2021-12-22'),
(226, '886111748914', 'ETAT_CIVIL', '2021-12-22'),
(227, 'SU828A', 'JURIDIQUE_ASSURANCES', '2021-12-22'),
(228, 'SU828A', 'JURIDIQUE_ASSURANCES', '2021-12-22'),
(229, 'SU828A', 'JURIDIQUE_ASSURANCES', '2021-12-22'),
(230, 'SU828A', 'CULTURE', '2021-12-22'),
(231, 'SU828A', 'CHATEAU_MUSEE', '2021-12-22'),
(232, 'SU828A', 'CIMETIERES', '2021-12-27'),
(233, '886111748938', 'CIMETIERES', '2021-12-27'),
(234, '886111748938', 'CHATEAU_MUSEE', '2021-12-27'),
(235, '886111748938', 'ARCHIVES_MUNICIPALES', '2021-12-27'),
(236, '886111748938', 'MEDIATHEQUE', '2021-12-27'),
(237, '725184104145', 'EMA', '2021-12-27'),
(238, '725184104145', 'EMA', '2021-12-27'),
(239, '725184104145', 'JEUNESSE', '2021-12-27'),
(240, '886111748921', 'Centre_social', '2021-12-27'),
(241, '886111748921', 'Centre_social', '2021-12-27'),
(242, '886111748921', 'JEUNESSE', '2021-12-27'),
(243, '886111748945', 'Site_Leon_Blum', '2021-12-27'),
(244, '886111748945', 'Site_Leon_Blum', '2021-12-27'),
(245, '886111748945', 'CAJ_Plage', '2021-12-27'),
(246, '725184104152', 'Espace_Maes', '2021-12-27'),
(247, '725184104152', 'Espace_Maes', '2021-12-27'),
(248, '725184104152', 'GARAGE/REGIE_VOIRIE', '2021-12-27'),
(249, '725184104114', 'GARAGE/REGIE_VOIRIE', '2021-12-27'),
(250, '725184104114', 'URBANISME', '2021-12-27'),
(251, '725184104114', 'URBANISME', '2021-12-29'),
(252, '886111615278', 'GARAGE/REGIE_VOIRIE', '2021-12-29'),
(253, '886111615278', 'CHATEAU_MUSEE', '2021-12-29'),
(254, '886111615278', 'CRYPTE', '2021-12-29'),
(255, '725184104206', 'ETAT_CIVIL', '2021-12-29'),
(256, '725184104206', 'R.H.', '2021-12-29'),
(257, '725184104206', 'R.H.', '2021-12-29');

-- --------------------------------------------------------

--
-- Structure de la table `essaie_entree`
--

CREATE TABLE `essaie_entree` (
  `IdEntree` int(11) NOT NULL,
  `Reference` varchar(30) NOT NULL,
  `DateEntree` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `essaie_entree`
--

INSERT INTO `essaie_entree` (`IdEntree`, `Reference`, `DateEntree`) VALUES
(7, 'BOIUFVNFEOI', '2022-01-13'),
(8, 'COEZKZPROV', '2022-01-18'),
(9, 'BOOP1', '2022-01-01'),
(10, 'BOOP2', '2022-01-01'),
(11, 'BOOP3', '2022-01-01'),
(12, 'BOOP4', '2022-01-01'),
(13, 'BOOP5', '2022-01-01'),
(14, 'APAPZJO', '2022-01-01'),
(15, 'CDPEPOB', '2022-01-01'),
(18, 'APDZPFOKVGRNJEI', '2022-01-01'),
(22, 'BOOP8', '2021-12-01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cartouche`
--
ALTER TABLE `cartouche`
  ADD PRIMARY KEY (`IdCartouche`);

--
-- Index pour la table `cartouche_entree`
--
ALTER TABLE `cartouche_entree`
  ADD PRIMARY KEY (`IdEntree`);

--
-- Index pour la table `cartouche_sortie`
--
ALTER TABLE `cartouche_sortie`
  ADD PRIMARY KEY (`idSortie`);

--
-- Index pour la table `essaie_entree`
--
ALTER TABLE `essaie_entree`
  ADD PRIMARY KEY (`IdEntree`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cartouche`
--
ALTER TABLE `cartouche`
  MODIFY `IdCartouche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `cartouche_entree`
--
ALTER TABLE `cartouche_entree`
  MODIFY `IdEntree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT pour la table `cartouche_sortie`
--
ALTER TABLE `cartouche_sortie`
  MODIFY `idSortie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT pour la table `essaie_entree`
--
ALTER TABLE `essaie_entree`
  MODIFY `IdEntree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
