-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 21 nov. 2018 à 13:38
-- Version du serveur :  10.3.9-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zsowth000`
--
CREATE DATABASE IF NOT EXISTS `zfl2-zsowth000` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `zfl2-zsowth000`;

-- --------------------------------------------------------

--
-- Structure de la table `tj_tag_lien`
--

CREATE TABLE `tj_tag_lien` (
  `tag_numero` int(11) NOT NULL,
  `hln_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_actualite_act`
--

CREATE TABLE `t_actualite_act` (
  `act_numero` int(11) NOT NULL,
  `act_titre` varchar(250) DEFAULT NULL,
  `act_text` text DEFAULT NULL,
  `act_date_aj` datetime NOT NULL,
  `act_etat` char(1) DEFAULT NULL,
  `usr_pseudo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_actualite_act`
--

INSERT INTO `t_actualite_act` (`act_numero`, `act_titre`, `act_text`, `act_date_aj`, `act_etat`, `usr_pseudo`) VALUES
(1, 'Games of thrones disponible en Avril 2019', 'HBO a juste publié le teaser de la derniere saison de Game Of thrones, la série reviendra en Avril 2019', '2018-11-16 00:00:00', 'A', 'jean'),
(2, 'X-Men Dark Phoenix', 'La série X-Men Dark Phoenix a officiellement été annoncée pour Juin 2019 et sera disponible dans notre cinéma dès sa sortie', '2018-11-16 00:00:00', 'A', 'imhassane');

-- --------------------------------------------------------

--
-- Structure de la table `t_hyperlien_hln`
--

CREATE TABLE `t_hyperlien_hln` (
  `hln_numero` int(11) NOT NULL,
  `hln_nom` varchar(250) DEFAULT NULL,
  `hln_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_prf`
--

CREATE TABLE `t_profil_prf` (
  `prf_nom` varchar(20) DEFAULT NULL,
  `prf_prenom` varchar(50) DEFAULT NULL,
  `prf_email` varchar(250) NOT NULL,
  `prf_valide` char(1) DEFAULT NULL,
  `prf_statut` char(1) DEFAULT NULL,
  `prf_date_aj` datetime NOT NULL,
  `usr_pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_profil_prf`
--

INSERT INTO `t_profil_prf` (`prf_nom`, `prf_prenom`, `prf_email`, `prf_valide`, `prf_statut`, `prf_date_aj`, `usr_pseudo`) VALUES
('Barry', 'ALpha', 'alpha@yahoo.com', 'A', 'M', '2018-11-16 00:00:00', 'alpha'),
('Bosh', 'Chris', 'chris@yahoo.com', 'A', 'M', '2018-11-16 00:00:00', 'chris'),
('Bah', 'Maimouna', 'bah.maimouna@aol.fr', 'A', 'G', '2018-11-16 00:00:00', 'gestionnaire1'),
('Sow', 'Thierno Hassane', 'thsow.pro@gmail.com', 'A', 'M', '2018-11-14 00:00:00', 'imhassane'),
('Pema', 'Jean', 'jean@yahoo.com', 'A', 'M', '2018-11-14 00:00:00', 'jean'),
('Mejri', 'Malik', 'malik@yahoo.com', 'A', 'M', '2018-11-16 00:00:00', 'malik'),
('Jean', 'Marc', 'marc@yahoo.com', 'A', 'M', '2018-11-16 00:00:00', 'marc'),
('Musa', 'Thibault', 'thibault@yahoo.com', 'A', 'M', '2018-11-16 00:00:00', 'thibault');

-- --------------------------------------------------------

--
-- Structure de la table `t_sujet_sjt`
--

CREATE TABLE `t_sujet_sjt` (
  `sjt_numero` int(11) NOT NULL,
  `sjt_intitule` varchar(250) DEFAULT NULL,
  `sjt_date_aj` datetime NOT NULL,
  `usr_pseudo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_sujet_sjt`
--

INSERT INTO `t_sujet_sjt` (`sjt_numero`, `sjt_intitule`, `sjt_date_aj`, `usr_pseudo`) VALUES
(1, 'Place cinéma', '2018-11-14 00:00:00', 'imhassane'),
(2, 'Film', '2018-11-14 00:00:00', 'imhassane'),
(3, 'Boutique du cinéma', '2018-11-16 00:00:00', 'jean');

-- --------------------------------------------------------

--
-- Structure de la table `t_tag_tag`
--

CREATE TABLE `t_tag_tag` (
  `tag_numero` int(11) NOT NULL,
  `tag_label` varchar(250) DEFAULT NULL,
  `tag_contenu` text DEFAULT NULL,
  `tag_image` varchar(250) DEFAULT NULL,
  `tag_etat` char(1) DEFAULT NULL,
  `sjt_numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_tag_tag`
--

INSERT INTO `t_tag_tag` (`tag_numero`, `tag_label`, `tag_contenu`, `tag_image`, `tag_etat`, `sjt_numero`) VALUES
(1, 'Réserver sa place en ligne', 'Grâce au service de vente en ligne vous pouvez acheter et éditer votre e-billet de chez vous.\r\nIl vous suffira de présenter une édition papier de votre e-billet ou même votre téléphone (ouvrez la pièce jointe reçue avec le mail de réservation) directement au contrôle des billets, avant l\'accès en salle, sans avoir à passer par les caisses. \r\nAttention tout de même de ne pas arriver à la dernière minute. Votre e-billet garantit votre place dans la salle, mais pas le fauteuil. \r\nN\'OUBLIEZ PAS...\r\nLes justificatifs de réduction ou d\'âge, pour les films marqués d\'une interdiction, seront demandés lors de l\'accès à la salle.', 'https://images.pexels.com/photos/109669/pexels-photo-109669.jpeg?cs=srgb&dl=architecture-auditorium-chairs-109669.jpg&fm=jpg', 'A', 1),
(2, 'Réserver sa place à l\'accueil', 'Vous pouvez acheter votre place à l\'accueil du cinéma, il vous suffit de venir muni d\'un moyen de paiement (espèces, carte bancaire, chèque). N\'arrivez surtout pas à la dernière minute car vous risquez d\'avoir une mauvaise place, l\'achat d\'un ticket vous garantit l\'accès à la salle, pas la place.', 'https://www.cgrcinemas.fr/montauban/fichier/image/cap-cinema-Montauban-sd-1604074501-S-6436B.jpg', '1', 1),
(3, 'Catégorie de films', 'Les différentes catégories de films sont disponibles en ligne.\nSelon votre compagnie, il est impératif de choisir la catégorie du film, la catégorie jeunesse lorsque vous êtes en compagnie des enfants, la catégorie romantique lorsque vous êtes avec votre âme soeur et frisson pour défier vos peurs.', 'https://www.filmsite.org/images/other-major-film-categories.jpg', 'A', 2),
(4, 'Voir un film en 3D', 'Si un film est disponible en 3D vous pourrez le voir lors de l\'achat de votre ticket ou de votre réservation en ligne. Notez que les tarifs sont plus élévés et ces films sont souvent visibles après leur version normale, un peu plus tard.', 'https://www.erenumerique.fr/wp-content/uploads/2016/07/3d-cin%C3%A9ma.jpg', 'A', 2),
(5, 'Les moyens de paiement acceptés à la boutique', 'A la boutique du cinéma, les chèques sont acceptés ainsi que les paiements par carte bleu puis les règlements en espèce', 'http://cine-arts-plaisance.fr/public/contenu/images/visuel-ccu3-300x300.png', 'A', 3),
(6, 'Vente de lunettes 3D', 'Les lunettes 3D sont disponibles en vente à la boutique du cinéma pour un prix de 5€ à regler selon le moyen de paiement de votre choix (voir la liste des moyens de paiement acceptés).', 'http://blog.lefigaro.fr/electronique/prod_contentEyewear.jpg', 'A', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur_usr`
--

CREATE TABLE `t_utilisateur_usr` (
  `usr_pseudo` varchar(50) NOT NULL,
  `usr_mpasse` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateur_usr`
--

INSERT INTO `t_utilisateur_usr` (`usr_pseudo`, `usr_mpasse`) VALUES
('alpha', '2c1743a391305fbf367df8e4f069f9f9'),
('chris', '6b34fe24ac2ff8103f6fce1f0da2ef57'),
('gestionnaire1', '32991c35b231c5b15e1d610741715fd9'),
('imhassane', '60e13b3ba9d4745e4a0472d10b33f92a'),
('jean', 'b71985397688d6f1820685dde534981b'),
('malik', '6c34fd5b51dcdd56ad9204c67209d6b5'),
('marc', '97e1e59c0375e0f55c10d4314db20466'),
('thibault', 'd269dc6fe35b4cab5cdf6e790f4f6533');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tj_tag_lien`
--
ALTER TABLE `tj_tag_lien`
  ADD PRIMARY KEY (`tag_numero`,`hln_numero`),
  ADD KEY `fk_tag_lien` (`hln_numero`);

--
-- Index pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  ADD PRIMARY KEY (`act_numero`),
  ADD KEY `fk_usr_pseudo` (`usr_pseudo`);

--
-- Index pour la table `t_hyperlien_hln`
--
ALTER TABLE `t_hyperlien_hln`
  ADD PRIMARY KEY (`hln_numero`);

--
-- Index pour la table `t_profil_prf`
--
ALTER TABLE `t_profil_prf`
  ADD PRIMARY KEY (`usr_pseudo`),
  ADD UNIQUE KEY `prf_email` (`prf_email`);

--
-- Index pour la table `t_sujet_sjt`
--
ALTER TABLE `t_sujet_sjt`
  ADD PRIMARY KEY (`sjt_numero`),
  ADD KEY `fk_sjt_pseudo` (`usr_pseudo`);

--
-- Index pour la table `t_tag_tag`
--
ALTER TABLE `t_tag_tag`
  ADD PRIMARY KEY (`tag_numero`),
  ADD KEY `fk_sjt_numero` (`sjt_numero`);

--
-- Index pour la table `t_utilisateur_usr`
--
ALTER TABLE `t_utilisateur_usr`
  ADD PRIMARY KEY (`usr_pseudo`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tj_tag_lien`
--
ALTER TABLE `tj_tag_lien`
  ADD CONSTRAINT `fk_tag_lien` FOREIGN KEY (`hln_numero`) REFERENCES `t_hyperlien_hln` (`hln_numero`),
  ADD CONSTRAINT `fk_tag_tag` FOREIGN KEY (`tag_numero`) REFERENCES `t_tag_tag` (`tag_numero`);

--
-- Contraintes pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  ADD CONSTRAINT `fk_usr_pseudo` FOREIGN KEY (`usr_pseudo`) REFERENCES `t_utilisateur_usr` (`usr_pseudo`);

--
-- Contraintes pour la table `t_profil_prf`
--
ALTER TABLE `t_profil_prf`
  ADD CONSTRAINT `fk_prf_pseudo` FOREIGN KEY (`usr_pseudo`) REFERENCES `t_utilisateur_usr` (`usr_pseudo`);

--
-- Contraintes pour la table `t_sujet_sjt`
--
ALTER TABLE `t_sujet_sjt`
  ADD CONSTRAINT `fk_sjt_pseudo` FOREIGN KEY (`usr_pseudo`) REFERENCES `t_utilisateur_usr` (`usr_pseudo`);

--
-- Contraintes pour la table `t_tag_tag`
--
ALTER TABLE `t_tag_tag`
  ADD CONSTRAINT `fk_sjt_numero` FOREIGN KEY (`sjt_numero`) REFERENCES `t_sujet_sjt` (`sjt_numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
