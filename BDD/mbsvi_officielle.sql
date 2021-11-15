-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 juil. 2021 à 11:32
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mbsvi_officielle`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletins`
--

CREATE TABLE `bulletins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moyenne` double(8,2) NOT NULL,
  `rang` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bulletins`
--

INSERT INTO `bulletins` (`id`, `periode`, `term`, `nom`, `prenom`, `classe`, `niveau`, `moyenne`, `rang`, `date`, `utilisateur`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'Lycee', 13.44, 1, '2021-06-01', 'philippes', '2019-2020', '2021-06-01 16:59:45', '2021-06-01 16:59:57'),
(2, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'Lycee', 13.42, 2, '2021-06-01', 'philippes', '2019-2020', '2021-06-01 16:59:50', '2021-06-01 17:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `cantines`
--

CREATE TABLE `cantines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Journalier','Hebdomadaire') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double(8,2) NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cantines`
--

INSERT INTO `cantines` (`id`, `eleve`, `classe`, `niveau`, `type`, `date`, `montant`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, 'TOTO Olivier', 'Terminale D1', 'Lycee', 'Hebdomadaire', '2020-07-12', 1000.00, '2019-2020', '2020-07-12 16:57:57', '2020-07-12 16:57:57'),
(2, 'TOTO Olivier', 'Terminale D1', 'Lycee', 'Journalier', '2021-05-26', 100.00, '2019-2020', '2021-05-26 18:24:37', '2021-05-26 18:24:37');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` enum('A4','C4','D','E','F1','F2','F3','F4','G1','G2','G3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau` enum('Lycee','College','Primaire','Maternelle') COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe` enum('1','2','3','4','5','A','B','C') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbre_matiere` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `libelle`, `serie`, `niveau`, `groupe`, `capacite`, `nbre_matiere`, `created_at`, `updated_at`) VALUES
(1, 'Terminale', 'D', 'Lycee', '1', '25', 8, '2020-07-09 19:19:17', '2020-07-09 19:19:17'),
(4, 'Premiere', 'D', 'Lycee', '1', '25', 18, '2020-07-14 20:46:08', '2020-07-14 20:46:08'),
(5, 'CE1', NULL, 'Lycee', NULL, '17', 10, '2021-05-25 18:43:46', '2021-05-25 18:43:46');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classe` enum('1','2','3','4','5','6','7','8','9') COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `classe`, `numero`, `libelle`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, '1', 6011, 'Achat d\'outils', '2019-2020', '2021-05-28 20:15:36', '2021-05-28 20:15:36');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materiel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixunitaire` double(8,2) NOT NULL,
  `montant` double(8,2) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `type`, `libelle`, `materiel`, `quantite`, `prixunitaire`, `montant`, `date`, `utilisateur`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, 'Achat de materiels', 'achat', 'achat de craie', 10, 600.00, 6000.00, '2021-05-28', 'philippes', '2019-2020', '2021-05-28 19:52:47', '2021-05-28 19:52:47');

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_directeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ecole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_ecole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_ecole` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `descriptions`
--

INSERT INTO `descriptions` (`id`, `nom_directeur`, `nom_ecole`, `adresse_ecole`, `image_ecole`, `created_at`, `updated_at`) VALUES
(1, 'TITRIKOU Marc', 'Complexe Scolaire Sourire Plus', 'Agoe-Nyivé Atsanvé \r\nBP : 572\r\nTél : 90 09 78 24', 'Zone/SQSFeWVNGEKC9zYuZSEOIbkgy5p33ehurutggL76.png', '2020-07-11 06:47:00', '2020-07-11 06:47:00');

-- --------------------------------------------------------

--
-- Structure de la table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant` double(8,2) NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` enum('Inscription','Scolarite') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fees`
--

INSERT INTO `fees` (`id`, `montant`, `niveau`, `date`, `etat`, `utilisateur`, `annee_scolaire`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 10000.00, 'Lycee', '2021-05-29', 'Debit', 'philippes', '2019-2020', 'Inscription', '2021-05-29 08:47:30', '2021-05-29 08:47:30'),
(2, 10000.00, 'Lycee', '2021-05-29', 'Debit', 'philippes', '2019-2020', 'Inscription', '2021-05-29 08:49:40', '2021-05-29 08:49:40'),
(3, 20000.00, 'Lycee', '2021-06-02', 'Debit', 'philippes', '2019-2020', 'Scolarite', '2021-06-02 09:32:09', '2021-06-02 09:32:09'),
(4, 20000.00, 'Lycee', '2021-06-02', 'Debit', 'philippes', '2019-2020', 'Scolarite', '2021-06-02 09:33:50', '2021-06-02 09:33:50');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provenance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` enum('A','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_parent` enum('Pere','Mere','Oncle','Tante','Tuteur') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pere',
  `nom_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe_parent` enum('Masculin','Feminin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Masculin',
  `profession_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_parent_secondaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_parent_secondaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_parent_secondaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_autre_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_autre_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant` double(8,2) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `matricule`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `age`, `sexe`, `adresse`, `contact`, `email`, `provenance`, `etat`, `profil`, `annee_scolaire`, `niveau`, `type_parent`, `nom_parent`, `sexe_parent`, `profession_parent`, `adresse_parent`, `email_parent`, `contact_parent`, `nom_parent_secondaire`, `profession_parent_secondaire`, `contact_parent_secondaire`, `autre_parent`, `profession_autre_parent`, `contact_autre_parent`, `montant`, `date`, `classe`, `created_at`, `updated_at`) VALUES
(1, '1010', 'TOTO', 'Olivier', '2003-10-15', 'Lomé', '18 ans', 'M', 'Agoe', '93123122', NULL, 'EPP', 'A', NULL, '2019-2020', 'Lycee', 'Pere', 'TOTO victor', 'Masculin', 'Docteur', 'Agoe', 'vic@gmail.com', '97123311', NULL, NULL, NULL, NULL, NULL, NULL, 10000.00, '2021-05-29', 'Terminale D1', '2021-05-29 08:47:30', '2021-05-29 08:48:06'),
(2, '1011', 'FOFANA', 'Junior', '1998-01-29', 'Lomé', '23 ans', 'M', 'Avedji', '90564411', NULL, 'EPP', 'N', NULL, '2019-2020', 'Lycee', 'Pere', 'FOFANA bertrand', 'Masculin', 'Professeur', 'Avedji', 'bertrandH@gmail.com', '90897711', NULL, NULL, NULL, NULL, NULL, NULL, 10000.00, '2021-05-29', 'Terminale D1', '2021-05-29 08:49:40', '2021-05-29 08:49:58');

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` enum('Semestre','Trimestre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `libelle`, `nombre_classe`, `periode`, `montant`, `annee_scolaire`, `utilisateur`, `created_at`, `updated_at`) VALUES
(1, 'Lycee', '25', 'Semestre', '40000', '2019-2020', 'philippes', '2021-05-27 11:03:38', '2021-05-27 11:03:38');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` int(11) NOT NULL,
  `type_matiere` enum('Litteraire','Scientifique','Facultative') COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Permanent','Vacataire') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_professeur` enum('Professeur','Titulaire') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbre_interro` int(11) NOT NULL,
  `nbre_devoir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `code`, `libelle`, `coefficient`, `type_matiere`, `classe`, `professeur`, `type`, `type_professeur`, `nbre_interro`, `nbre_devoir`, `created_at`, `updated_at`) VALUES
(1, 'FR', 'francais', 2, 'Litteraire', 'Terminale D1', 'SATO Francois', 'Permanent', 'Professeur', 2, 1, '2021-05-29 09:04:50', '2021-05-29 09:04:50'),
(2, 'ANG', 'anglais', 2, 'Litteraire', 'Terminale D1', 'H Newton', 'Permanent', 'Professeur', 2, 1, '2021-05-29 09:07:49', '2021-05-29 09:07:49'),
(3, 'SVT', 'science de la vie et de la terre', 4, 'Scientifique', 'Terminale D1', 'S Dani', 'Permanent', 'Titulaire', 3, 1, '2021-05-29 09:09:56', '2021-05-29 09:09:56'),
(4, 'PC', 'physique chimie', 3, 'Scientifique', 'Terminale D1', 'M Laurent', 'Permanent', 'Professeur', 2, 1, '2021-05-29 09:10:44', '2021-05-29 09:10:44'),
(5, 'MATH', 'mathématiques', 3, 'Scientifique', 'Terminale D1', 'BATA Gerrard', 'Permanent', 'Professeur', 2, 1, '2021-05-29 09:11:11', '2021-05-29 09:11:11'),
(6, 'EPS', 'sport', 1, 'Facultative', 'Terminale D1', 'V George', 'Permanent', 'Professeur', 1, 1, '2021-05-29 09:13:32', '2021-05-29 09:13:32'),
(7, 'HG', 'histoire et  géographie', 2, 'Litteraire', 'Terminale D1', 'A Clarisse', 'Permanent', 'Professeur', 1, 1, '2021-05-30 20:06:14', '2021-05-30 20:06:14'),
(8, 'ECM', 'education civique et morale', 2, 'Facultative', 'Terminale D1', 'A Clarisse', 'Permanent', 'Professeur', 1, 1, '2021-05-30 20:06:39', '2021-05-30 20:06:39');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emetteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recepteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_message` enum('Chat','Diffusion') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `emetteur`, `recepteur`, `sujet`, `contenu`, `utilisateur`, `commentaire`, `type_message`, `date`, `etat`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'philippes', 'Bonsoir a tous', 'Diffusion', '2021-05-28', 0, '2019-2020', '2021-05-28 21:49:54', '2021-05-28 21:49:54'),
(2, 'FOLY Philippes', 'SATO Francois', 'Notes des eleves', 'Veuillez confirmer l\'envoie des notes des eleves a la direction', 'philippes', NULL, 'Chat', '2021-05-28', 0, '2019-2020', '2021-05-28 21:54:27', '2021-05-28 21:54:27');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_09_123646_create_classes_table', 1),
(2, '2020_07_09_193942_create_matieres_table', 1),
(3, '2020_07_09_194323_create_professeurs_table', 2),
(4, '2020_07_09_201337_create_levels_table', 2),
(5, '2020_07_09_223529_create_admins_table', 3),
(6, '2020_07_09_224723_create_secretaires_table', 3),
(7, '2020_07_09_224815_create_comptables_table', 3),
(8, '2020_07_09_224926_create_eleves_table', 3),
(9, '2020_07_09_225006_create_surveillants_table', 3),
(10, '2020_07_10_155020_create_years_table', 4),
(11, '2020_07_10_174854_create_comptes_table', 5),
(12, '2020_07_10_175541_create_accounts_table', 6),
(13, '2020_07_10_213713_create_payements_table', 7),
(14, '2020_07_11_082034_create_descriptions_table', 8),
(15, '2020_07_12_171825_create_cantines_table', 9),
(16, '2020_07_12_193938_create_horaires_table', 10),
(18, '2020_07_12_205104_create_messages_table', 11),
(19, '2020_07_12_213145_create_chats_table', 12),
(20, '2020_07_13_080814_create_absences_table', 13),
(21, '2020_07_13_123151_create_notes_table', 14),
(24, '2020_07_13_190027_create_sorties_table', 15),
(25, '2020_07_13_190234_create_retards_table', 15),
(26, '2020_07_14_091447_create_comptes_table', 16),
(27, '2020_07_14_100827_create_depenses_table', 17),
(31, '2020_07_14_104055_create_caisses_table', 18),
(32, '2020_07_14_174023_create_scolarites_table', 18),
(34, '2020_07_14_192048_create_banques_table', 19),
(37, '2020_07_16_093657_create_moyennes_table', 20),
(38, '2020_07_16_204853_create_bulletins_table', 21),
(39, '2021_05_25_185743_create_personnes_table', 22),
(40, '2021_05_25_210720_create_personnes_table', 23),
(41, '2021_05_25_215513_create_levels_table', 24),
(42, '2021_04_19_174944_create_users_table', 25),
(43, '2021_05_25_235213_create_inscriptions_table', 26),
(44, '2021_05_26_083905_create_inscriptions_table', 27),
(45, '2021_05_26_113204_create_inscriptions_table', 28),
(47, '2021_05_26_113857_create_inscriptions_table', 29),
(48, '2021_05_26_121946_create_inscriptions_table', 30),
(49, '2021_05_26_122503_create_inscriptions_table', 31),
(50, '2021_05_26_164033_create_personnes_table', 32),
(51, '2021_05_26_164128_create_users_table', 32),
(52, '2021_05_26_164239_create_inscriptions_table', 32),
(53, '2021_05_26_183221_create_programs_table', 33),
(54, '2021_05_27_084743_create_payments_table', 34),
(55, '2021_05_27_091816_create_levels_table', 35),
(56, '2021_05_27_095033_create_inscriptions_table', 36),
(58, '2021_05_27_101527_create_fees_table', 37),
(59, '2021_05_27_123528_create_payments_table', 38),
(60, '2021_05_28_073221_create_notes_table', 39),
(63, '2021_05_28_103319_create_warnings_table', 40),
(64, '2021_05_28_093131_create_moyennes_table', 41),
(65, '2021_05_28_105321_create_warnings_table', 41),
(68, '2021_05_28_145146_create_transactions_table', 42),
(69, '2021_05_28_184721_create_messages_table', 43),
(70, '2021_05_28_194224_create_depenses_table', 43),
(71, '2021_05_28_201454_create_comptes_table', 44),
(74, '2021_05_28_203831_create_messages_table', 45),
(75, '2021_05_30_172311_create_moyennes_table', 46),
(76, '2021_05_30_201816_create_moyennes_table', 47),
(77, '2021_05_31_091322_create_notes_table', 48),
(78, '2021_05_31_192413_create_bulletins_table', 49);

-- --------------------------------------------------------

--
-- Structure de la table `moyennes`
--

CREATE TABLE `moyennes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` enum('Semestre','Trimestre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interrogation` double(8,2) NOT NULL,
  `devoir` double(8,2) NOT NULL,
  `examen` double(8,2) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `avg_matiere` double(8,2) NOT NULL,
  `avg_matiere_coef` double(8,2) NOT NULL,
  `appreciation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `moyennes`
--

INSERT INTO `moyennes` (`id`, `periode`, `term`, `nom`, `prenom`, `classe`, `professeur`, `matiere`, `type_matiere`, `interrogation`, `devoir`, `examen`, `coefficient`, `avg_matiere`, `avg_matiere_coef`, `appreciation`, `date`, `utilisateur`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'SATO Francois', 'francais', 'Litteraire', 11.50, 13.00, 10.00, 2, 11.50, 23.00, 'Passable', '2021-06-01', 'francois', '2019-2020', '2021-06-01 11:03:48', '2021-06-01 11:03:48'),
(2, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'SATO Francois', 'francais', 'Litteraire', 11.00, 11.00, 11.00, 2, 11.00, 22.00, 'Passable', '2021-06-01', 'francois', '2019-2020', '2021-06-01 11:05:42', '2021-06-01 11:05:42'),
(3, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'H Newton', 'anglais', 'Litteraire', 14.50, 16.00, 13.00, 2, 14.50, 29.00, 'Bien', '2021-06-01', 'newton', '2019-2020', '2021-06-01 11:07:05', '2021-06-01 11:07:05'),
(4, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'H Newton', 'anglais', 'Litteraire', 15.00, 11.00, 17.00, 2, 14.33, 28.66, 'Bien', '2021-06-01', 'newton', '2019-2020', '2021-06-01 11:09:19', '2021-06-01 11:09:19'),
(5, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'M Laurent', 'physique chimie', 'Scientifique', 14.50, 10.50, 13.00, 3, 12.67, 38.01, 'Assez bien', '2021-06-01', 'laurent', '2019-2020', '2021-06-01 11:29:50', '2021-06-01 11:29:50'),
(6, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'M Laurent', 'physique chimie', 'Scientifique', 13.50, 10.00, 13.50, 3, 12.33, 36.99, 'Assez bien', '2021-06-01', 'laurent', '2019-2020', '2021-06-01 12:51:57', '2021-06-01 12:51:57'),
(7, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'BATA Gerrard', 'mathématiques', 'Scientifique', 13.75, 11.00, 12.00, 3, 12.25, 36.75, 'Assez bien', '2021-06-01', 'gerrard', '2019-2020', '2021-06-01 12:53:00', '2021-06-01 12:53:00'),
(8, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'BATA Gerrard', 'mathématiques', 'Scientifique', 13.00, 14.00, 9.00, 3, 12.00, 36.00, 'Assez bien', '2021-06-01', 'gerrard', '2019-2020', '2021-06-01 12:53:50', '2021-06-01 12:53:50'),
(9, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'S Dani', 'science de la vie et de la terre', 'Scientifique', 10.33, 13.00, 10.50, 4, 11.28, 45.12, 'Passable', '2021-06-01', 'danielle', '2019-2020', '2021-06-01 12:55:07', '2021-06-01 12:55:07'),
(10, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'S Dani', 'science de la vie et de la terre', 'Scientifique', 9.50, 11.00, 10.00, 4, 10.17, 40.68, 'Passable', '2021-06-01', 'danielle', '2019-2020', '2021-06-01 13:05:27', '2021-06-01 13:05:27'),
(11, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'A Clarisse', 'histoire et  géographie', 'Litteraire', 14.00, 10.00, 15.00, 2, 13.00, 26.00, 'Assez bien', '2021-06-01', 'clarisse', '2019-2020', '2021-06-01 13:22:09', '2021-06-01 13:22:09'),
(12, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'A Clarisse', 'education civique et morale', 'Facultative', 15.00, 16.00, 17.00, 2, 16.00, 32.00, 'Bien', '2021-06-01', 'clarisse', '2019-2020', '2021-06-01 13:22:31', '2021-06-01 13:22:31'),
(13, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'A Clarisse', 'histoire et  géographie', 'Litteraire', 13.00, 13.00, 16.00, 2, 14.00, 28.00, 'Bien', '2021-06-01', 'clarisse', '2019-2020', '2021-06-01 13:24:54', '2021-06-01 13:24:54'),
(14, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'A Clarisse', 'education civique et morale', 'Facultative', 18.00, 14.00, 18.00, 2, 16.67, 33.34, 'Bien', '2021-06-01', 'clarisse', '2019-2020', '2021-06-01 13:25:06', '2021-06-01 13:25:06'),
(15, 'Semestre', '1', 'TOTO', 'Olivier', 'Terminale D1', 'V George', 'sport', 'Facultative', 17.00, 15.00, 17.00, 1, 16.33, 16.33, 'Très bien', '2021-06-01', 'george', '2019-2020', '2021-06-01 13:25:50', '2021-06-01 13:25:50'),
(16, 'Semestre', '1', 'FOFANA', 'Junior', 'Terminale D1', 'V George', 'sport', 'Facultative', 18.50, 17.00, 15.00, 1, 16.83, 16.83, 'Très bien', '2021-06-01', 'george', '2019-2020', '2021-06-01 13:27:08', '2021-06-01 13:27:08');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Interro_one','Interro_two','Interro_three','Devoir_one','Devoir_two','Examen') COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` double(8,2) NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `nom`, `prenom`, `type`, `duree`, `date`, `professeur`, `matiere`, `note`, `classe`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'SATO Francois', 'francais', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 10:56:46', '2021-06-01 10:56:46'),
(2, 'TOTO', 'Olivier', 'Interro_two', '01:00', '2021-06-01', 'SATO Francois', 'francais', 12.00, 'Terminale D1', '2019-2020', '2021-06-01 10:57:01', '2021-06-01 10:57:01'),
(3, 'TOTO', 'Olivier', 'Devoir_one', '02:00', '2021-06-01', 'SATO Francois', 'francais', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 10:57:11', '2021-06-01 10:57:11'),
(4, 'TOTO', 'Olivier', 'Examen', '03:00', '2021-06-01', 'SATO Francois', 'francais', 10.00, 'Terminale D1', '2019-2020', '2021-06-01 10:57:22', '2021-06-01 10:57:22'),
(5, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'SATO Francois', 'francais', 9.00, 'Terminale D1', '2019-2020', '2021-06-01 11:04:18', '2021-06-01 11:04:18'),
(6, 'FOFANA', 'Junior', 'Interro_two', '01:00', '2021-06-01', 'SATO Francois', 'francais', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 11:04:29', '2021-06-01 11:04:29'),
(7, 'FOFANA', 'Junior', 'Devoir_one', '02:00', '2021-06-01', 'SATO Francois', 'francais', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 11:04:49', '2021-06-01 11:04:49'),
(8, 'FOFANA', 'Junior', 'Examen', '03:00', '2021-06-01', 'SATO Francois', 'francais', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 11:04:59', '2021-06-01 11:04:59'),
(9, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'H Newton', 'anglais', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 11:06:06', '2021-06-01 11:06:06'),
(10, 'TOTO', 'Olivier', 'Interro_two', '01:00', '2021-06-01', 'H Newton', 'anglais', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 11:06:18', '2021-06-01 11:06:18'),
(11, 'TOTO', 'Olivier', 'Devoir_one', '02:00', '2021-06-01', 'H Newton', 'anglais', 16.00, 'Terminale D1', '2019-2020', '2021-06-01 11:06:32', '2021-06-01 11:06:32'),
(12, 'TOTO', 'Olivier', 'Examen', '03:00', '2021-06-01', 'H Newton', 'anglais', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 11:06:41', '2021-06-01 11:06:41'),
(13, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'H Newton', 'anglais', 17.00, 'Terminale D1', '2019-2020', '2021-06-01 11:07:25', '2021-06-01 11:07:25'),
(14, 'FOFANA', 'Junior', 'Interro_two', '01:00', '2021-06-01', 'H Newton', 'anglais', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 11:07:38', '2021-06-01 11:07:38'),
(15, 'FOFANA', 'Junior', 'Devoir_one', '02:00', '2021-06-01', 'H Newton', 'anglais', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 11:08:48', '2021-06-01 11:08:48'),
(16, 'FOFANA', 'Junior', 'Examen', '03:00', '2021-06-01', 'H Newton', 'anglais', 17.00, 'Terminale D1', '2019-2020', '2021-06-01 11:08:57', '2021-06-01 11:08:57'),
(17, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'M Laurent', 'physique chimie', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 11:22:45', '2021-06-01 11:22:45'),
(18, 'TOTO', 'Olivier', 'Interro_two', '01:00', '2021-06-01', 'M Laurent', 'physique chimie', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 11:25:49', '2021-06-01 11:25:49'),
(19, 'TOTO', 'Olivier', 'Devoir_one', '02:00', '2021-06-01', 'M Laurent', 'physique chimie', 10.50, 'Terminale D1', '2019-2020', '2021-06-01 11:27:08', '2021-06-01 11:27:08'),
(20, 'TOTO', 'Olivier', 'Examen', '03:00', '2021-06-01', 'M Laurent', 'physique chimie', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 11:27:18', '2021-06-01 11:27:18'),
(21, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'M Laurent', 'physique chimie', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 11:54:26', '2021-06-01 11:54:26'),
(22, 'FOFANA', 'Junior', 'Interro_two', '01:00', '2021-06-01', 'M Laurent', 'physique chimie', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 11:59:23', '2021-06-01 11:59:23'),
(23, 'FOFANA', 'Junior', 'Devoir_one', '02:00', '2021-06-01', 'M Laurent', 'physique chimie', 10.00, 'Terminale D1', '2019-2020', '2021-06-01 11:59:30', '2021-06-01 11:59:30'),
(24, 'FOFANA', 'Junior', 'Examen', '03:00', '2021-06-01', 'M Laurent', 'physique chimie', 13.50, 'Terminale D1', '2019-2020', '2021-06-01 12:51:34', '2021-06-01 12:51:34'),
(25, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 14.50, 'Terminale D1', '2019-2020', '2021-06-01 12:52:23', '2021-06-01 12:52:23'),
(26, 'TOTO', 'Olivier', 'Interro_two', '01:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 12:52:31', '2021-06-01 12:52:31'),
(27, 'TOTO', 'Olivier', 'Devoir_one', '02:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 12:52:40', '2021-06-01 12:52:40'),
(28, 'TOTO', 'Olivier', 'Examen', '03:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 12.00, 'Terminale D1', '2019-2020', '2021-06-01 12:52:51', '2021-06-01 12:52:51'),
(29, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 12:53:12', '2021-06-01 12:53:12'),
(30, 'FOFANA', 'Junior', 'Interro_two', '01:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 12:53:23', '2021-06-01 12:53:23'),
(31, 'FOFANA', 'Junior', 'Devoir_one', '02:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 12:53:31', '2021-06-01 12:53:31'),
(32, 'FOFANA', 'Junior', 'Examen', '03:00', '2021-06-01', 'BATA Gerrard', 'mathématiques', 9.00, 'Terminale D1', '2019-2020', '2021-06-01 12:53:40', '2021-06-01 12:53:40'),
(33, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 6.00, 'Terminale D1', '2019-2020', '2021-06-01 12:54:20', '2021-06-01 12:54:20'),
(34, 'TOTO', 'Olivier', 'Interro_two', '01:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 12:54:29', '2021-06-01 12:54:29'),
(35, 'TOTO', 'Olivier', 'Interro_three', '01:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 12:54:36', '2021-06-01 12:54:36'),
(36, 'TOTO', 'Olivier', 'Devoir_one', '02:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 12:54:44', '2021-06-01 12:54:44'),
(37, 'TOTO', 'Olivier', 'Examen', '03:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 10.50, 'Terminale D1', '2019-2020', '2021-06-01 12:54:59', '2021-06-01 12:54:59'),
(38, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 10.00, 'Terminale D1', '2019-2020', '2021-06-01 12:55:20', '2021-06-01 12:55:20'),
(39, 'FOFANA', 'Junior', 'Interro_two', '01:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 6.50, 'Terminale D1', '2019-2020', '2021-06-01 12:55:34', '2021-06-01 12:55:34'),
(40, 'FOFANA', 'Junior', 'Devoir_one', '02:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 11.00, 'Terminale D1', '2019-2020', '2021-06-01 13:03:35', '2021-06-01 13:03:35'),
(41, 'FOFANA', 'Junior', 'Examen', '03:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 10.00, 'Terminale D1', '2019-2020', '2021-06-01 13:03:46', '2021-06-01 13:03:46'),
(42, 'FOFANA', 'Junior', 'Interro_three', '01:00', '2021-06-01', 'S Dani', 'science de la vie et de la terre', 12.00, 'Terminale D1', '2019-2020', '2021-06-01 13:04:27', '2021-06-01 13:04:27'),
(43, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'A Clarisse', 'histoire et  géographie', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 13:06:15', '2021-06-01 13:06:15'),
(44, 'TOTO', 'Olivier', 'Devoir_one', '02:00', '2021-06-01', 'A Clarisse', 'histoire et  géographie', 10.00, 'Terminale D1', '2019-2020', '2021-06-01 13:06:28', '2021-06-01 13:06:28'),
(45, 'TOTO', 'Olivier', 'Examen', '03:00', '2021-06-01', 'A Clarisse', 'histoire et  géographie', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 13:06:45', '2021-06-01 13:06:45'),
(46, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'A Clarisse', 'education civique et morale', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 13:06:55', '2021-06-01 13:06:55'),
(47, 'TOTO', 'Olivier', 'Devoir_one', '01:00', '2021-06-01', 'A Clarisse', 'education civique et morale', 16.00, 'Terminale D1', '2019-2020', '2021-06-01 13:21:43', '2021-06-01 13:21:43'),
(48, 'TOTO', 'Olivier', 'Examen', '02:00', '2021-06-01', 'A Clarisse', 'education civique et morale', 17.00, 'Terminale D1', '2019-2020', '2021-06-01 13:21:54', '2021-06-01 13:21:54'),
(49, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'A Clarisse', 'education civique et morale', 18.00, 'Terminale D1', '2019-2020', '2021-06-01 13:22:44', '2021-06-01 13:22:44'),
(50, 'FOFANA', 'Junior', 'Devoir_one', '01:00', '2021-06-01', 'A Clarisse', 'education civique et morale', 14.00, 'Terminale D1', '2019-2020', '2021-06-01 13:23:08', '2021-06-01 13:23:08'),
(51, 'FOFANA', 'Junior', 'Examen', '02:00', '2021-06-01', 'A Clarisse', 'education civique et morale', 18.00, 'Terminale D1', '2019-2020', '2021-06-01 13:23:16', '2021-06-01 13:23:16'),
(52, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'A Clarisse', 'histoire et  géographie', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 13:24:19', '2021-06-01 13:24:19'),
(53, 'FOFANA', 'Junior', 'Devoir_one', '02:00', '2021-06-01', 'A Clarisse', 'histoire et  géographie', 13.00, 'Terminale D1', '2019-2020', '2021-06-01 13:24:29', '2021-06-01 13:24:29'),
(54, 'FOFANA', 'Junior', 'Examen', '03:00', '2021-06-01', 'A Clarisse', 'histoire et  géographie', 16.00, 'Terminale D1', '2019-2020', '2021-06-01 13:24:35', '2021-06-01 13:24:35'),
(55, 'TOTO', 'Olivier', 'Interro_one', '01:00', '2021-06-01', 'V George', 'sport', 17.00, 'Terminale D1', '2019-2020', '2021-06-01 13:25:24', '2021-06-01 13:25:24'),
(56, 'TOTO', 'Olivier', 'Devoir_one', '01:00', '2021-06-01', 'V George', 'sport', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 13:25:29', '2021-06-01 13:25:29'),
(57, 'TOTO', 'Olivier', 'Examen', '01:00', '2021-06-01', 'V George', 'sport', 17.00, 'Terminale D1', '2019-2020', '2021-06-01 13:25:37', '2021-06-01 13:25:37'),
(58, 'FOFANA', 'Junior', 'Interro_one', '01:00', '2021-06-01', 'V George', 'sport', 18.50, 'Terminale D1', '2019-2020', '2021-06-01 13:26:10', '2021-06-01 13:26:10'),
(59, 'FOFANA', 'Junior', 'Devoir_one', '01:00', '2021-06-01', 'V George', 'sport', 17.00, 'Terminale D1', '2019-2020', '2021-06-01 13:26:15', '2021-06-01 13:26:15'),
(60, 'FOFANA', 'Junior', 'Examen', '01:00', '2021-06-01', 'V George', 'sport', 15.00, 'Terminale D1', '2019-2020', '2021-06-01 13:26:20', '2021-06-01 13:26:20');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scolarite` double(8,2) NOT NULL,
  `montant_paye` double(8,2) NOT NULL,
  `montant_restant` double(8,2) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`id`, `nom`, `prenom`, `niveau`, `classe`, `annee_scolaire`, `scolarite`, `montant_paye`, `montant_restant`, `date`, `utilisateur`, `created_at`, `updated_at`) VALUES
(1, 'TOTO', 'Olivier', 'Lycee', 'Terminale D1', '2019-2020', 40000.00, 20000.00, 20000.00, '2021-06-02', 'philippes', '2021-06-02 09:32:09', '2021-06-02 09:32:09'),
(2, 'TOTO', 'Olivier', 'Lycee', 'Terminale D1', '2019-2020', 40000.00, 20000.00, 0.00, '2021-06-02', 'philippes', '2021-06-02 09:33:50', '2021-06-02 09:33:50');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `sexe`, `adresse`, `contact`, `email`, `profil`, `statut`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(3, 'FOLY', 'Philippes', 'M', 'Deckon', '92009358', 'philippes3@gmail.com', 'Zone/JxEfmrh7diOkdmWnKn4MBsnAmgI5sG9v7cy6yTys.jpg', 'Administrateur', '2019-2020', '2021-05-26 17:11:10', '2021-05-26 17:11:10'),
(15, 'TOTO', 'Olivier', 'M', 'Agoe', '93123122', NULL, NULL, 'Eleve', '2019-2020', '2021-05-29 08:47:30', '2021-05-29 08:47:30'),
(16, 'FOFANA', 'Junior', 'M', 'Avedji', '90564411', NULL, NULL, 'Eleve', '2019-2020', '2021-05-29 08:49:40', '2021-05-29 08:49:40'),
(17, 'SATO', 'Francois', 'M', 'Deckon', '91231122', 'francois44@gmail.com', NULL, 'Professeur', '2019-2020', '2021-05-29 08:51:43', '2021-05-29 08:51:43'),
(18, 'H', 'Newton', 'M', 'Agoe', '99007811', 'newton@gmail.com', NULL, 'Professeur', '2019-2020', '2021-05-29 09:00:36', '2021-05-29 09:00:36'),
(19, 'S', 'Dani', 'F', 'Deckon', '90897722', 'dniella@gmail.com', NULL, 'Professeur', '2019-2020', '2021-05-29 09:01:50', '2021-05-29 09:01:50'),
(20, 'M', 'Laurent', 'M', 'tokoin', '90563411', 'laurent@gmail.com', NULL, 'Professeur', '2019-2020', '2021-05-29 09:03:38', '2021-05-29 09:03:38'),
(21, 'BATA', 'Gerrard', 'M', 'tokoin', '90007811', 'gerrard@gmail.com', NULL, 'Professeur', '2019-2020', '2021-05-29 09:04:26', '2021-05-29 09:04:26'),
(22, 'V', 'George', 'M', 'Bè', '9887331', 'georgevv@gmail.com', NULL, 'Professeur', '2019-2020', '2021-05-29 09:13:10', '2021-05-29 09:13:10'),
(23, 'S', 'Martin', 'M', 'deckon', '97451122', 'martin45@gmail.com', NULL, 'Surveillant', '2019-2020', '2021-05-29 15:49:38', '2021-05-29 15:49:38'),
(24, 'A', 'Clarisse', 'M', 'Agoe', '90671122', 'clara@gmail.com', NULL, 'Professeur', '2020-2021', '2021-05-30 20:05:14', '2021-05-30 20:05:14');

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jour` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `professeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_debut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('1','2','3','4','5','6','7','8') COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `programs`
--

INSERT INTO `programs` (`id`, `classe`, `matiere`, `jour`, `professeur`, `h_debut`, `h_fin`, `position`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(1, 'Terminale D1', 'francais', 'Lundi', 'SATO Francois', '07:30', '08:10', '1', '2019-2020', '2021-05-26 20:27:56', '2021-05-26 20:27:56');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double(8,2) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Banque','Caisse') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `libelle`, `montant`, `date`, `type`, `etat`, `utilisateur`, `annee_scolaire`, `status`, `created_at`, `updated_at`) VALUES
(1, 'montant initial de la caisse', 250000.00, '2021-05-28', 'Caisse', 'Debit', 'philippes', '2019-2020', 0, '2021-05-28 17:44:41', '2021-05-28 17:44:41'),
(2, 'retrait de 40000 de la caisse', 40000.00, '2021-05-28', 'Caisse', 'Credit', 'philippes', '2019-2020', 1, '2021-05-28 18:42:49', '2021-05-28 18:42:49');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personne_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `grade`, `personne_id`, `created_at`, `updated_at`) VALUES
(3, 'philippes', '$2y$10$5x5K8vUxsK.9gpriyR593uq1b0bMTKLbYpo0xl0qskH.hGW/2cdU6', 'Administrateur', 3, '2021-05-26 17:11:10', '2021-05-26 17:11:10'),
(12, 'olivier', '$2y$10$ctSJ4x.g14dKk8kGGhzDLuGALjNC1GHK37nqlx.n91SQaWGysspie', 'Eleve', 15, '2021-05-29 08:48:16', '2021-05-29 08:48:16'),
(13, 'junior', '$2y$10$lpa/uBFIpU9sbOdiERNpQOjURPPr7Fx0519oi56MCn1TwY6rtzb.O', 'Eleve', 16, '2021-05-29 08:50:06', '2021-05-29 08:50:06'),
(14, 'francois', '$2y$10$DFKja3PlSdDrdcjlwP3cKuab1C3syXUgLhG7wmG4MMKVl3QbMH6Hq', 'Professeur', 17, '2021-05-29 08:51:43', '2021-05-29 08:51:43'),
(15, 'newton', '$2y$10$b4pFgzfBMmoUyUFbOEvNqe2gyIMkahsB3XORCxIbrv1e2RWlljxhC', 'Professeur', 18, '2021-05-29 09:00:36', '2021-05-29 09:00:36'),
(16, 'danielle', '$2y$10$Hz1O/5DeLdJI4ZrNTfS8bu1XTkGP.o6jscjVro7EwTKFCtU6r59Z2', 'Professeur', 19, '2021-05-29 09:01:50', '2021-05-29 09:01:50'),
(17, 'laurent', '$2y$10$9sTzehCQh0hpU7.hlmaaven3pMzNgTNcuCB8sWX7veMG22ULUDvSC', 'Professeur', 20, '2021-05-29 09:03:38', '2021-05-29 09:03:38'),
(18, 'gerrard', '$2y$10$gKJ9ivJ0Xpd8PtT0s9VsYO7C2oZ0O7cpRDamPHajYLW/7DEr1vQ9K', 'Professeur', 21, '2021-05-29 09:04:26', '2021-05-29 09:04:26'),
(19, 'george', '$2y$10$W0Aus17d/FMCCFP6U9CLfuvSvawFnSAOQ3QE5p5gyoaYWxth1Ksca', 'Professeur', 22, '2021-05-29 09:13:10', '2021-05-29 09:13:10'),
(20, 'martin', '$2y$10$wjoiolgtlTNmflLRbu.5DunEeCktnCK2jzhAa6DkpZ/iCCMUAR8rq', 'Surveillant', 23, '2021-05-29 15:49:38', '2021-05-29 15:49:38'),
(21, 'clarisse', '$2y$10$pH4Ea4RPc4L0AWVQ7T1N8..k/4HlG/i/JXALTTUB6ZLeFcru1T2Zu', 'Professeur', 24, '2021-05-30 20:05:15', '2021-05-30 20:05:15');

-- --------------------------------------------------------

--
-- Structure de la table `warnings`
--

CREATE TABLE `warnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Absence','Retard','Sortie') COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `warnings`
--

INSERT INTO `warnings` (`id`, `nom`, `prenom`, `classe`, `motif`, `date`, `professeur`, `matiere`, `type`, `annee_scolaire`, `created_at`, `updated_at`) VALUES
(2, 'TOTO', 'Olivier', 'Terminale D1', 'Retard a se lever', '2021-05-29', NULL, NULL, 'Retard', '2019-2020', '2021-05-29 15:53:11', '2021-05-29 15:53:11');

-- --------------------------------------------------------

--
-- Structure de la table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `annee_debut` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_fin` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `years`
--

INSERT INTO `years` (`id`, `annee_debut`, `annee_fin`, `etat`, `created_at`, `updated_at`) VALUES
(1, '2019', '2020', 0, '2020-07-10 14:47:30', '2021-06-03 20:33:16'),
(2, '2020', '2021', 1, '2021-05-29 23:05:02', '2021-06-03 20:33:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cantines`
--
ALTER TABLE `cantines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `moyennes`
--
ALTER TABLE `moyennes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_personne_id_index` (`personne_id`);

--
-- Index pour la table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cantines`
--
ALTER TABLE `cantines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `moyennes`
--
ALTER TABLE `moyennes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
