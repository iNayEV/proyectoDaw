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
    prof_descrip VARCHAR(200),
    verify BOOLEAN,
    administrator BOOLEAN,
    prof_img VARCHAR(100),
    mode VARCHAR(100)
);

INSERT INTO users VALUES 
(null,'cespin@insdanielblanxart.cat','cespin10','Cristian98','Cristian','Espinosa','674638964','Hola soy Cristian',1,1,'default-img.jpg','dark'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light'),
(null,'test@insdanielblanxart.cat','test','asd','test','test','674638964','Hola soy test',1,1,'default-img.jpg','light');

CREATE TABLE posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    post_img VARCHAR(100),
    date DATE,
    post_descrip VARCHAR(200),
    likes INT
);

INSERT INTO posts VALUES
(null,1,'IMG-626fe6dda32746.38508102.jpg','2022-05-02','Samurai',1),
(null,1,'IMG-626fe6dda32746.38508102.jpg','2022-05-02','Samurai',23904),
(null,1,'IMG-626fe6dda32746.38508102.jpg','2022-05-02','Samurai',999),
(null,1,'IMG-626fe6dda32746.38508102.jpg','2022-05-02','Samurai',2194),
(null,1,'IMG-626fe6dda32746.38508102.jpg','2022-05-02','Samurai',2194);

CREATE TABLE likes (
    id_like INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    id_post INT,
    FOREIGN KEY (id_post) REFERENCES posts(id_post),
    time VARCHAR(100)
);