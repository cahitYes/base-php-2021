-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  ven. 22 oct. 2021 à 09:47
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `crud01`
--
CREATE DATABASE IF NOT EXISTS `crud01` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud01`;

-- --------------------------------------------------------

--
-- Structure de la table `thearticle`
--

DROP TABLE IF EXISTS `thearticle`;
CREATE TABLE IF NOT EXISTS `thearticle` (
  `idthearticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thearticletitle` varchar(160) NOT NULL,
  `thearticletext` text NOT NULL,
  `thearticledate` datetime DEFAULT current_timestamp(),
  `theuser_idtheuser` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idthearticle`),
  KEY `fk_thearticle_theuser_idx` (`theuser_idtheuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `theuser`
--

DROP TABLE IF EXISTS `theuser`;
CREATE TABLE IF NOT EXISTS `theuser` (
  `idtheuser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `theuserlogin` varchar(80) NOT NULL,
  `theuserpwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `theusermail` varchar(150) NOT NULL,
  PRIMARY KEY (`idtheuser`),
  UNIQUE KEY `theuserlogin_UNIQUE` (`theuserlogin`),
  UNIQUE KEY `theusermail_UNIQUE` (`theusermail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `thearticle`
--
ALTER TABLE `thearticle`
  ADD CONSTRAINT `fk_thearticle_theuser` FOREIGN KEY (`theuser_idtheuser`) REFERENCES `theuser` (`idtheuser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;