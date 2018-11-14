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
  ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`genre_id`)
)
  ENGINE=InnoDB
;

CREATE TABLE `books` (
  `book_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `author` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `genre_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `added_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`),
  INDEX `FK1_books_genres` (`genre_id`),
  INDEX `FK2_books_users` (`user_id`),
  CONSTRAINT `FK1_books_genres` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`),
  CONSTRAINT `FK2_books_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
)
  ENGINE=InnoDB
;

INSERT INTO `genres` (`name`) VALUES ('Drama');
INSERT INTO `genres` (`name`) VALUES ('Educational');
INSERT INTO `genres` (`name`) VALUES ('Adventure');