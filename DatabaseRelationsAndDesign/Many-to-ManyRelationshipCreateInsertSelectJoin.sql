-- USE PHPEXERCISE DATABASE

-- create table users
CREATE TABLE `users` (
user_id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
`password` VARCHAR(50) NOT NULL,
email VARCHAR(50) NULL,
Primary key (user_id)
);

-- create table roles
CREATE TABLE `roles` (
role_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
role VARCHAR(50) NOT NULL
);

-- create mapping table users_roles
CREATE TABLE users_roles (
user_id INT,
role_id INT,
CONSTRAINT pk_users_roles
PRIMARY KEY (user_id, role_id),
CONSTRAINT fk_users_roles_users
FOREIGN KEY (user_id)
REFERENCES users(user_id),
CONSTRAINT fk_users_roles_roles
FOREIGN KEY (role_id)
REFERENCES roles(role_id)
);

-- insert values to roles
INSERT INTO roles(role)
VALUES ('USER'),
       ('ADMIN'),
       ('GUEST'),
       ('MODERATOR');

-- insert values to users
INSERT INTO  users(name, `password`, email)
VALUES ('KOKO1', 'koki2334', 'koki1@aqbv.bg'),
       ('KOKO2', 'koki2335', 'koki2@aqbv.bg'),
       ('KOKO3', 'koki2336', 'koki3@aqbv.bg');

-- insert roles per user in users_roles table    N.B->no repeat user_id and role_id
INSERT INTO users_roles (user_id, role_id)
VALUES (1, 2),
(1, 3),
(3,2),
(3,3),
(2,1);

-- show info current role by user using Join
SELECT u.name AS userName, r.role AS currentRole
FROM users_roles AS ur
INNER JOIN users AS u
ON ur.user_id = u.user_id
INNER JOIN roles AS r
ON ur.role_id = r.role_id;