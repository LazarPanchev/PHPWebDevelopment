CREATE DATABASE IF NOT EXISTS `exam_php` COLLATE 'utf8_general_ci';
USE exam_php;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(255) NOT NULL,
  `born_on` DATE NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username` (`username`)
)
  ENGINE=InnoDB
;
