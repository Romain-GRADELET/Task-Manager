-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'L''identifiant de la catégorie',
  `name` varchar(50) NOT NULL COMMENT 'Le nom de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`id`, `name`) VALUES
(1,	'home'),
(4,	'work'),
(6,	'food');

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'L''identifiant du tag',
  `label` varchar(50) NOT NULL COMMENT 'nom du tag',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'La date de création du tag',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour du tag',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tags` (`id`, `label`, `created_at`, `updated_at`) VALUES
(1,	'urgent',	'2023-03-29 14:30:35',	NULL),
(2,	'perso',	'2023-04-04 13:07:53',	NULL),
(4,	'idea',	'2023-04-04 13:07:45',	NULL);

DROP TABLE IF EXISTS `tag_task`;
CREATE TABLE `tag_task` (
  `task_id` bigint(20) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  KEY `task_id` (`task_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `tag_task_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_task_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `tag_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tasks` (`id`, `title`, `status`, `created_at`, `updated_at`, `category_id`, `tag_id`) VALUES
(169,	'faire le dossier de projet',	0,	'2023-08-02 10:55:52',	'2023-08-02 10:55:52',	4,	NULL),
(170,	'faire les courses',	0,	'2023-08-02 10:56:06',	'2023-08-02 10:56:06',	6,	NULL),
(172,	'faire le ménage',	0,	'2023-08-02 10:56:35',	'2023-08-02 10:56:35',	1,	NULL),
(174,	'Continuer le dossier professionnelle',	0,	'2023-08-02 10:59:57',	'2023-08-02 10:59:57',	4,	NULL);

-- 2023-08-06 19:48:20
