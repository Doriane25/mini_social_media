CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 avr. 2023 à 10:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbserver`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `profile_picture`) VALUES
(1, 'lydia', 'allaoua@hotmail.com', 'allaoua@hotmail.fr', '643c10fc30d9a643b3b2c3f2bb1681520337.jpg'),
(7, 'Lelya', '$2y$10$fFYDZvQ1hiVMVRp5OPkdQOwwkzBxjQmnbjfu95cQhlTXaqgg.WTF2', 'all@hotmail.com', '643c11947eba5643b370e67fc2643b36de18e0b1681522487.jpg'),
(8, 'lyly', '$2y$10$v0KOl8CUi2U20H11aoU6.OXrFam/pK1p9RIH7xYYFZOi3r89SzfDi', 'all@h.fr', '643c222390955643b3b2c3f2bb1681520337.jpg'),
(9, 'allaoua', '$2y$10$Joe96HfotbF0hoyhivWuyeqZvB86BUZl2iYGyIObh81NCy3kAASkm', 'al@hot.fr', NULL),
(10, 'lelya', '$2y$10$0FODXXzrd0di7NHkl9aoIOY7U1uMBsHaRj4L58AJ6.6GrWPOh/uPm', 'all@hotmail.fr', '643c7393041cc643b3b4cdea521681520337.jpg'),
(11, 'lelya', '$2y$10$yYHUd.sGB6pyFQr/SYVHJ.C/bzErBnkdpgKpkJndEz6XQP/Jg8otO', 'alla@hotmail.dz', NULL),
(12, 'lelya', '$2y$10$DwBuWjZMPunRAha/7W3kL.3HCnFkdzhIBkh2d2LuWZYNJqner846a', 'allaouaa.lydia@gmail.com', NULL),
(13, 'lll', '$2y$10$hN3nMkVhqB1eC3lnmbIwneOa6nnr8uHEuh/VXOQtCBptEEa/5JBru', 'a@hotmail.fr', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


create table `profil`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(70) NOT NULL, 
    `profile_picture` varchar(255) NULL,
    `created_at` date NOT NULL,
    `updated_at` date NULL,
    `user_id` int(11) NOT NULL, 
    PRIMARY KEY(`id`),
    CONSTRAINT fk_users_profil FOREIGN KEY(user_id) 
    REFERENCES users(id) ON DELETE CASCADE )
    ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 avr. 2023 à 23:04
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbserver`
--

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id`, `profile_picture`) VALUES
(1, '643b560e9cc11643b48337614c643b4098a6e40643b374a325351681521536.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


create table `commentaires`(
  `id` int(11) not NULL,
  `content` varchar(70) Not NULL,
  `created_at` date NOT NULL,
  `updated_at` date NULL,
   `users_id` int(11) not NULL,
  primary key(`id`),
  CONSTRAINT fk_comment_users FOREIGN KEY(users_id)
  REFERENCES users(id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;




CREATE TABLE `social_follow` (
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `social_follow`
  ADD PRIMARY KEY (`follow_id`);
--
ALTER TABLE `social_follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 avr. 2023 à 23:04
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbserver`
--

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`post_id`, `title`, `content`, `media`) VALUES
(9, 'MORGEN', 'Mon premier projet UI / UX design à HETIC \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    ', '1681665583.jpg'),
(10, 'MINUS', 'Mon deuxième projet UI / UX / FRONT à HETIC\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.     ', '1681665642.jpg'),
(11, 'DRETIC', 'Mon premier projet backend à HETIC \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    ', '1681665676.jpg'),
(12, 'MORGEN', 'Mon premier projet UI / UX design à HETIC \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    ', '1681665583.jpg'),
(13, 'MINUS', 'Mon deuxième projet UI / UX / FRONT à HETIC\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.     ', '1681665642.jpg'),
(14, 'DRETIC', 'Mon premier projet backend à HETIC \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    ', '1681665676.jpg'),
(15, 'MORGEN', 'Mon premier projet UI / UX design à HETIC \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    ', '1681665583.jpg'),
(16, 'MINUS', 'Mon deuxième projet UI / UX / FRONT à HETIC\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.     ', '1681665642.jpg'),
(17, 'DRETIC', 'Mon premier projet backend à HETIC \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    ', '1681665676.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
);








  
  