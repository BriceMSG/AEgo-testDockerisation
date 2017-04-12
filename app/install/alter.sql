-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE alteretgo;
GRANT ALL ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

USE alteretgo;

DROP TABLE IF EXISTS `chg_man_apprenant`;
CREATE TABLE `chg_man_apprenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `chg_man_formateurs`;
CREATE TABLE `chg_man_formateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `lvl` tinyint(1) unsigned NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `chg_man_formateurs` (`id`, `uuid`, `mail`, `mdp`, `lvl`, `actif`) VALUES
(1,	'56c5919c3e704',	'stanislas@my-serious-game.fr',	'$2y$10$S0kgw84DXD.7hBDPUwh2MO/7hF66WqW7RpjK4rfTQmhvffL7XjIsy',	3,	1),
(2,	'56ea8fcf24df5',	'axel@my-serious-game.fr',	'$2y$10$YU9gjGzYAGMWh5OaX9TBCuxAWJDNZYSF1pOSH2MQke.gPnpo2aNd2',	1,	1),
(3,	'56ef32a652548',	'pierre@gocreate-solutions.com',	'$2y$10$HNGHXCDUrGeBPJGrXVMFCO6ad9CnGpJ2fRdOHmL3QtaMCcJJoycuy',	3,	1),
(4,	'56f50a328ed08',	'frederique.cormier@alteretgo.fr',	'$2y$10$1.U37lqehGIClJqC3j8yK.0L1Sc2a6uQZ6p2hDC9iOYX6wRVO1jH2',	1,	1),
(5,	'56f50a630fb2e',	'isabelle.hatala@alteretgo.fr',	'$2y$10$RnEcxhR06bi3ggFGKKynR.fi6BaynplXELFqHqz3zjNj5NkFRv0Dy',	1,	1),
(6,	'570234fb6920c',	'raphael.bolard@alteretgo.fr',	'$2y$10$4hwGxwvAk/wuG3HD3t0MZ.EH0KvlkDxhKK/t2h5V2Ig/hq7flxF4O',	1,	1),
(7,	'570235106f389',	'chloe.poirier@alteretgo.fr',	'$2y$10$FcRxUxAXiFtsFPCuBCsek.yfV2Oth7BV.jOnCo4c/FXhiV1E/VNCC',	1,	1);

DROP TABLE IF EXISTS `chg_man_quizzs`;
CREATE TABLE `chg_man_quizzs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `stamp` datetime NOT NULL,
  `quizz` varchar(50) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `chg_man_results`;
CREATE TABLE `chg_man_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `quizz` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `chg_man_satisfaction`;
CREATE TABLE `chg_man_satisfaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `chg_man_session`;
CREATE TABLE `chg_man_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` varchar(20) NOT NULL,
  `formateur` varchar(20) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-11-30 13:23:33
