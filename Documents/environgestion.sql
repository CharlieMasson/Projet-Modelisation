-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 nov. 2022 à 14:17
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `environgestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `phone_number`, `role`, `host_id`, `customer_id`) VALUES
(1, 'email@email.fr', '125478', 'admin', 1, 1),
(5, 'varchar', 'phone', 'role mineur', 5, 5),
(6, 'six', 'six', 'six', 6, 6),
(7, 'sept', 'sept', 'sept', 7, 7),
(9, 'neuf', 'destiny', 'gardien', 9, 9),
(10, 'bonbon', 'gateau', 'patissier', 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `code`, `name`, `notes`) VALUES
(1, 'bonjour', 'demain ', 'note'),
(2, 'deux', 'trois', 'quatre'),
(7, 'tout valeur null', 'pour la collone', 'six'),
(8, 'huit', 'huitre', 'noel'),
(9, 'demain', 'm\'appartient', 'vent salée'),
(10, 'extinction', 'des', 'feux');

-- --------------------------------------------------------

--
-- Structure de la table `environment`
--

CREATE TABLE `environment` (
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ip_adress` varchar(255) DEFAULT NULL,
  `ssh_port` int(6) DEFAULT NULL,
  `ssh_username` varchar(255) DEFAULT NULL,
  `phpmyadmin_link` varchar(255) DEFAULT NULL,
  `ip_restriction` tinyint(1) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `environment`
--

INSERT INTO `environment` (`name`, `link`, `ip_adress`, `ssh_port`, `ssh_username`, `phpmyadmin_link`, `ip_restriction`, `project_id`, `id`) VALUES
('name1', 'link1', 'ip1', 1, 'ssh1', 'phpmyadmin1', 1, 1, 1),
('name2', 'link2', 'ip2', 2, 'ssh2', 'phpmyadmin2', 0, 2, 2),
('name3', 'link3', 'ip3', 3, 'ssh3', 'phpmyadmin3', 1, 3, 3),
('name4', 'link4', 'ip4', 4, 'ssh4', 'phpmyadmin4', 0, 4, 4),
('name5', 'link5', 'ip5', 5, 'ssh5', 'phpmyadmin5', 1, 5, 5),
('name6', 'link6', 'ip6', 6, 'ssh6', 'phpmyadmin6', 0, 6, 6),
('name7', 'link7', 'ip7', 7, 'ssh7', 'phpmyadmin7', 1, 7, 7),
('name8', 'link8', 'ip8', 8, 'ssh8', 'phpmyadmin8', 2, 8, 8),
('name9', 'link9', 'ip9', 9, 'ssh9', 'phpmyadmin9', 1, 4, 9),

-- --------------------------------------------------------

--
-- Structure de la table `host`
--

CREATE TABLE `host` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `host`
--

INSERT INTO `host` (`id`, `code`, `name`, `notes`) VALUES
(1, 'bonjour', 'jeremie', 'bonjour'),
(2, 'bonjour', 'alex', 'bonjour'),
(3, 'au-revoir', 'gabriel', 'bonjour'),
(4, 'au-revoir', 'charlie', 'bonjour'),
(5, 'vide', 'louka', 'bonjour'),
(6, 'rien', 'valentin', 'rien'),
(7, 'rien', 'idasiak', 'rien'),
(9, 'lock', 'mera', 'bien'),
(10, 'onze', 'dix', 'neuf');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `lastpass_folder` varchar(255) DEFAULT NULL,
  `link_mock_ups` varchar(255) DEFAULT NULL,
  `managed_server` tinyint(1) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `code`, `lastpass_folder`, `link_mock_ups`, `managed_server`, `notes`, `host_id`, `customer_id`) VALUES
(1, 'valentin', '13454', 'connais pas mon mot de passe', 'link', 1, 'mrggggllllll', 1, 1),
(2, '', '1345678', 'faudrais retenir t\'on mots de passe', 'link', 0, 'murloc', 2, 2),
(7, 'iceheat', '8987545', 'lastpass_folder', 'link', 1, 'euh', 7, 7),
(8, 'ohhhhhhhhhhhhhhhhhh', 'ok', 'demain', 'link', 0, 'test', 4, 8),

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `host_id` (`host_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Index pour la table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `host_id` (`host_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `host`
--
ALTER TABLE `host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `host` (`id`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `environment`
--
ALTER TABLE `environment`
  ADD CONSTRAINT `environment_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `host` (`id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
