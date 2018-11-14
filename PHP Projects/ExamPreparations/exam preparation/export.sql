CREATE DATABASE IF NOT EXISTS `exam_prep`;
USE exam_prep;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username` (`username`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
;

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
;

CREATE TABLE IF NOT EXISTS`tasks` (
  `task_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `cat_id` INT(11) NOT NULL,
  `started_on` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`task_id`),
  INDEX `FK1_tasks_users` (`user_id`),
  INDEX `FK2_tasks_categories` (`cat_id`),
  CONSTRAINT `FK1_tasks_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK2_tasks_categories` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
;

INSERT INTO `exam_prep`.`categories` (`name`) VALUES ('Anniversary');
INSERT INTO `exam_prep`.`categories` (`name`) VALUES ('Birthday');
INSERT INTO `exam_prep`.`categories` (`name`) VALUES ('Business');


