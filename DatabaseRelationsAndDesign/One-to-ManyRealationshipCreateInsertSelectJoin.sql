-- USE PHPEXERCISE DATABASE

-- create table authors
CREATE TABLE `Authors` (
author_id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50) NULL,
Primary key (author_id)
);

-- create table posts
CREATE TABLE `posts` (
post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
content TEXT NULL,
post_date DATE NOT NULL,
author_id INT,
CONSTRAINT fk_posts_author
FOREIGN KEY (author_id)
REFERENCES authors(author_id));

-- insert values to authors
INSERT INTO `authors` (name, `password`, email)
VALUES ('Dimitar', '123456', 'dimoVelev@abv.bg'),
        ('Mariana', 'mari3333', 'marianaKalcheva@yahoo.com'),
        ('Kalin', 'kalin555', 'kulio55@abv.bg'),
        ('Stela', 'stelitobeee33', 'stelaIvanova@yahoo.com');

-- insert values to posts
INSERT INTO `posts` (title, content, post_date, author_id)
VALUES ('Jivota DNES', 'JIVOTA E HUBAV....', '2018-06-12',2),
       ('Priridata', 'Prirodata prez proletta....', '2017-09-03',1),
       ('New York', 'New York lifestyle, money and something...', '2004-03-21',2),
       ('title', 'content','2000-05-05',3);

-- show info table using Join
SELECT p.title AS postTitle, p.content AS postContent,
 a.name AS authorName, a.email AS authorEmail, p.post_date AS postDate
FROM posts AS p
INNER JOIN authors AS a
ON p.author_id=a.author_id
ORDER BY p.post_date;