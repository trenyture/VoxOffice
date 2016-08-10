-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Client :  simontrcuwbdd.mysql.db
-- Généré le :  Mar 09 Août 2016 à 22:13
-- Version du serveur :  5.5.46-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Structure de la table `VO_films`
--

CREATE TABLE IF NOT EXISTS `VO_films` (
  `id` bigint(20) NOT NULL,
  `fb_id` bigint(30) NOT NULL,
  `title` varchar(120) NOT NULL,
  `annee` int(4) NOT NULL,
  `author` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `vote` bigint(30) DEFAULT NULL,
  `ajout_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `VO_users` (
  `fb_id` bigint(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `click` bigint(30) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour la table `VO_films`
--
ALTER TABLE `VO_films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `VO_users`
--
ALTER TABLE `VO_users`
  ADD PRIMARY KEY (`fb_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `VO_films`
--
ALTER TABLE `VO_films`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
