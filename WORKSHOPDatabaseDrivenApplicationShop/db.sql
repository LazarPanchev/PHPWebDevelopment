CREATE DATABASE IF NOT EXISTS shop COLLATE 'utf8_general_ci';
USE shop;

CREATE TABLE categories(
  cat_id INT(11) NOT NULL AUTO_INCREMENT,
  cat_name VARCHAR(255) NOT NULL,
  create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (cat_id)
);

CREATE TABLE IF NOT EXISTS products(
  product_id INT(11) NOT NULL AUTO_INCREMENT,
  product_name VARCHAR(255) NOT NULL,
  price DECIMAL(6,2) DEFAULT 0,
  cat_id INT(11),
  description TEXT,
  create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  last_update DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (product_id),
  CONSTRAINT fk_products_categories
  FOREIGN KEY (cat_id)
    REFERENCES categories(cat_id)
);

INSERT INTO categories(cat_id, cat_name)
    VALUES (1,'Drinks'),                  -- here we put cat_id for correct id in multiple times run!
           (2,'Foods'),
           (3,'Others');

INSERT INTO products(product_name, price,cat_id, description, create_date)
    VALUES ('coffee', 2.55, 1, 'Coffee products...  ', '2018-01-01'),
           ('coca-cola', 1.99, 1, NULL, '2017-02-14'),
           ('chips', 1.45, 2, NULL, '2016-09-22'),
           ('sandwich', 4.89, 2, 'Sandwiches, hot-dogs products...  ', '2005-03-17'),
           ('notebook', 499.99, 3, 'Computers and notebooks...  ', '2015-06-29'),
           ('catToy', 9.99, 3, NULL , NULL);

