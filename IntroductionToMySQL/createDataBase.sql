CREATE DATABASE `softuni` Collate `utf8_general_ci`;

USE `softuni`;

CREATE TABLE `minions`(
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `age` INT NOT NULL DEFAULT '0',
  `town_id` INT NOT NULL DEFAULT '0'
);

CREATE TABLE `towns`(
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL
);