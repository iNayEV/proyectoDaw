DROP DATABASE IF EXISTS liberty;
CREATE DATABASE liberty;
USE liberty;

CREATE TABLE users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100),
    username VARCHAR(15),
    passwd VARCHAR(16),
    firstname VARCHAR(15),
    lastname VARCHAR(15),
    num VARCHAR(9),
    descrip VARCHAR(200),
    verify BOOLEAN,
    administrator BOOLEAN,
    img VARCHAR(100)
);

INSERT INTO users VALUE 
(null,'cespin@insdanielblanxart.cat','cespin10','Cristian98','Cristian','Espinosa','674638964','Hola soy Cristian',1,1,'default-img.jpg');

CREATE TABLE posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    img VARCHAR(100),
    date DATE,
    descrip VARCHAR(200)
);