-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 11 mars 2022 à 20:19
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `caisse_talenteum_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `operation_caisses`
--

CREATE TABLE `operation_caisses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_operation` enum('depot','remise_bank','retrait') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_operation` date NOT NULL,
  `note_operation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_operation` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operation_caisses`
--

INSERT INTO `operation_caisses` (`id`, `type_operation`, `date_operation`, `note_operation`, `total_operation`, `created_at`, `updated_at`) VALUES
(4, 'remise_bank', '2022-03-13', 'sakfha klasjf lasjf ljkl', 1800, '2022-03-11 15:23:55', '2022-03-11 15:23:55');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `operation_caisses`
--
ALTER TABLE `operation_caisses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `operation_caisses`
--
ALTER TABLE `operation_caisses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
