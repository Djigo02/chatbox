-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 mars 2023 à 15:46
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL,
  `dateMessage` varchar(16) NOT NULL,
  `content` text NOT NULL,
  `idUserF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `dateMessage`, `content`, `idUserF`) VALUES
(1, '2023-02-26 14:12', 'Coucou', 1),
(2, '2023-02-26 14:15', 'Salut !!', 1),
(3, '2023-02-26 14:16', 'Nangadeff', 3),
(4, '2023-02-26 01:16', 'Ca va mani si diam bou bakh et toi ?', 3),
(5, '2023-02-26 01:42', 'Wa mais Gora parego beu legui', 1),
(6, '2023-02-27 10:24', 'Wallou ma!\r\n', 1),
(7, '2023-02-27 10:25', 'Si lane', 3),
(8, '2023-02-27 19:48', 'Salam je suis nouveau', 4),
(9, '2023-02-27 19:54', 'rtyuiop', 1),
(10, '2023-02-27 19:54', 'ehhh', 1),
(11, '2023-02-28 17:32', 'w', 1),
(12, '2023-02-28 17:35', 'Coucou', 1),
(13, '2023-02-28 18:07', 'vvvvvvvvvvvvvvvvvvvvvvvv', 1),
(14, '2023-02-28 18:18', 'Wayal', 1),
(15, '2023-02-28 18:38', 'boy fo tolou', 1),
(16, '2023-03-01 13:07', 'sdsdsd', 1),
(17, '2023-03-01 13:07', 'dcssdcsd', 3),
(18, '2023-03-01 13:08', 'dsfsdfdf', 1),
(19, '2023-03-01 13:10', 'acdcd', 1),
(20, '2023-03-01 13:10', 'adasdas', 3),
(21, '2023-03-03 02:01', 'Salut !!!\r\n', 1),
(22, '2023-03-03 02:05', 'Je l\'ai fait\r\n', 1),
(23, '2023-03-03 02:19', 'Heyy', 3),
(24, '2023-03-03 02:20', 'nkm bay', 3),
(25, '2023-03-03 02:20', 'Sant nii', 1),
(26, '2023-03-03 02:21', 'Dana parre nii', 3),
(27, '2023-03-03 02:21', 'WaaW rewww key', 1),
(28, '2023-03-03 02:23', 'fatt', 3),
(29, '2023-03-03 02:23', 'feeeeee', 1),
(30, '2023-03-03 09:49', 'coco', 1),
(31, '2023-03-03 10:20', 'hooooo', 3),
(32, '2023-03-03 14:20', 'koko', 1),
(33, '2023-03-03 14:22', 'jojo', 1),
(34, '2023-03-03 14:22', 'kaka', 3),
(35, '2023-03-03 15:20', 'Salut', 1),
(36, '2023-03-03 15:20', 'Ca va\r\n', 3),
(37, '2023-03-03 15:21', 'Dakar', 1),
(38, '2023-03-03 15:26', 'rakk dji', 3),
(39, '2023-03-03 15:28', 'No\r\n', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(20) NOT NULL,
  `prenomUser` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nomUser`, `prenomUser`, `image`, `email`, `mdp`) VALUES
(1, 'Djigo', 'Mouhamad', '', 'mehmetdjigo@gmail.com', 'mehmet'),
(3, 'Wade', 'Gora Dia', '', 'gogo@gmail.com', 'gogo'),
(4, 'Ndiaye', 'Diop', '', 'diopndiaye@gmail.com', 'diop');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idUser` (`idUserF`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idUserF`) REFERENCES `utilisateur` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
