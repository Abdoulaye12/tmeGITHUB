-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 jan. 2022 à 16:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tme`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `description_` varchar(255) NOT NULL,
  `prix` varchar(100) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `image_` varchar(255) NOT NULL,
  `auteur_article` varchar(255) NOT NULL,
  `date_time_publication` date NOT NULL,
  `date_time_edition` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom_article`, `description_`, `prix`, `categorie`, `statut`, `image_`, `auteur_article`, `date_time_publication`, `date_time_edition`) VALUES
(1, 'tee shirt classic 001', 'Le tee shirt est un maillot à manches courtes en forme de T. Le t-shirt peut être éventuellement confectionné avec des manches longues, Il est généralement fabriqué en coton ou en polyester. Son nom vient de sa forme en T, prononcé « ti » en anglais et « ', '88', 'Mode &amp; beaute', 'En stock', 'category-page-04-image-card-11.jpg', 'Abdoulaye', '2022-01-23', '2022-01-24'),
(2, 'T-shirt blanc/noir homme', 'Tee shirt homme Supra Sketchscript Manches courtes Col rond Signature Supra imprimée sur la poitrine Coloris: blanc / noir Composition: 100% coto', '78', 'Mode &amp; beaute', 'Rupture de stock', 'category-page-04-image-card-09.jpg', 'Amath', '2022-01-23', '2022-01-23'),
(3, 'LEE Double T-shirt ras Taille-42', 'coupe slim? Tee-shirt col rond avec manches courtes, col côtelé en 100% coton. un noir, un blanc. Color:Multicoloured (2 Pack Mix Aild) Size:XX-Large', '150', 'Mode &amp; beaute', 'En stock', 'category-page-04-image-card-12.jpg', 'Amath', '2022-01-23', '2022-01-23'),
(4, 'Saté V5', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu&#039;il est prêt ou que la mise en page est achevée. Généralement,', '13', 'Matériel Pro', 'Prêt pour l&#039;expédition', 'category-page-04-image-card-07.jpg', 'Abdoulaye', '2022-01-23', NULL),
(5, 'Boutteille Classic 36', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu&#039;il est prêt ou que la mise en page est achevée. Généralement,', '45', 'Pour la maison', 'Commande sur demande', 'category-page-04-image-card-01.jpg', 'Abdoulaye', '2022-01-23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `check_ok` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `e_mail`, `mot_de_passe`, `telephone`, `ville`, `check_ok`) VALUES
(1, 'Abdoulaye', 'GAYE', 'ablayegaye207@gmail.com', '0a89db47b6dfdceff5d5e48a1114f5dc', '+221778585507', 'Dakar', 0),
(2, 'Amath', 'Ka', 'koppochoa98@gmail.com', 'f2393ee104ad4a611ec35d43b8533b12', '+221784207831', 'Dakar', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
