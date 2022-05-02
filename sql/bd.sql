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

INSERT INTO users VALUES 
(null,'cespin@insdanielblanxart.cat','cespin10','Cristian98','Cristian','Espinosa','674638964','Hola soy Cristian',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg');

CREATE TABLE posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    img VARCHAR(100),
    date DATE,
    descrip VARCHAR(200),
    likes INT
);

INSERT INTO posts VALUE
(null,1,'IMG-626fe6dda32746.38508102.jpg','2022-05-02','Samurai',2194);