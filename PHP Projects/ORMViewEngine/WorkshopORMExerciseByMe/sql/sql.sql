CREATE DATABASE IF NOT EXISTS ormPHP COLLATE 'utf8_general_ci';
use ormPHP;
CREATE TABLE users(
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE KEY,
  password VARCHAR(255) NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NULL,
  born_on DATETIME DEFAULT CURRENT_TIMESTAMP
);