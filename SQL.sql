CREATE DATABASE IF NOT EXISTS `db_tasks`;

USE `db_tasks`;

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` INT AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE = InnoDB;

INSERT INTO
  `tasks` (`title`, `description`)
VALUES
  ('Learn PHP', 'I want to do web development'),
  ('Practice React', 'I need to improve');