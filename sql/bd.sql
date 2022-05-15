DROP DATABASE IF EXISTS liberty;
CREATE DATABASE liberty;
USE liberty;

CREATE TABLE users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100),
    username VARCHAR(15),
    passwd VARCHAR(100),
    firstname VARCHAR(15),
    lastname VARCHAR(100),
    num VARCHAR(9),
    prof_descrip VARCHAR(200),
    verify BOOLEAN,
    administrator BOOLEAN,
    prof_img VARCHAR(100),
    mode VARCHAR(100),
    followers INT
);

INSERT INTO users VALUES 
(null,'cespin@insdanielblanxart.cat','cespin10','Cristian98','Cristian','Espinosa','674638964','Hola soy Cristian',0,1,'uploads/default-img.jpg','dark',10000),
(null,"therock@gmail.com","therock","asd","Dwayne", "Johnson", "", "Hola soy actor y luchador profesional estadounidense.",1,0,"uploads/therock.jpg","light",52309763),
(null,"kendalljenner@gmail.com","kendall","asd","Kendall", "Jenner", "", "Hola soy modelo profesional.",1,0,"uploads/KendallJenner.jpg","light",237037),
(null,"lamborghini@gmail.com","lamborghini","asd","Lamborghini", "", "", "Hola somos una empresa de automovilismo.",1,0,"uploads/lamborghini.jpg","light",31790238),
(null,"yamaha@gmail.com","yamaha","asd","YAMAHA", "", "", "Hola somos una empresa de automilismo.",1,0,"uploads/YAMAHA.jpg","light",2237387),
(null,"playstation@gmail.com","playstation","asd","PlayStation", "", "", "Hola somos una empresa de videojuegos.",1,0,"uploads/play.jpg","light",28890375),
(null,"xbox@gmail.com","xbox","asd","Xbox", "", "", "Hola somos una empresa de videojuegos.",1,0,"uploads/xbox.jpg","light",12678891),
(null,"nintendo@gmail.com","nintendo","asd","Nintendo", "", "", "Hola somos una empresa de videojuegos.",1,0,"uploads/nintendo.jpg","light",74309231),
(null,"rubius@gmail.com","elrubiuswtf","asd","Ruben", "Doblas", "", "Hola soy creador de contenido y me encantan los videojuegos.",1,0,"uploads/rubius.jpg","light",16584306),
(null,"vegetita@gmail.com","vegetta777","asd","Samuel", "De Luque", "", "Hola soy creador de contenido y me encantan hacer sonreir a mis seguidores.",1,0,"uploads/vegetta.jpg","light",74309231);

CREATE TABLE tags (
    id_tag INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);

INSERT INTO tags VALUES
(null, "Motor"),
(null, "Videojuegos"),
(null, "Paisajes"),
(null, "Moda"),
(null, "Animación"),
(null, "Gimnasio"),
(null, "Viajes"),
(null, "Animales"),
(null, "Comida");

CREATE TABLE posts (
    id_post INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    post_img VARCHAR(100),
    id_tag INT,
    FOREIGN KEY (id_tag) REFERENCES tags(id_tag),
    post_descrip VARCHAR(200),
    likes INT
);

INSERT INTO posts VALUES
(null,10,'a1.jpg',8,'Kira es preciosa.',124900),
(null,10,'c1.jpg',9,'Mi hambuerguesa.',8304000),
(null,2,'gym1.jpg',6,'Out worked by no one.',982300),
(null,2,'gym2.jpg',6,'A new day.',78600),
(null,3,"moda1.jpg",4,"Prepearing myself.",389461),
(null,3,"moda2.jpg",4,"At Vanity Fair.",213234),
(null,4,"motor1.jpg",1,"Lamborghini huracan sto nera.",8647364),
(null,4,"motor2.jpg",1,"Lamborghini Huracán TECNICA front.",5962734),
(null,4,"motor3.jpg",1,"Lamborghini Huracán TECNICA back.",2384755),
(null,5,"motor4.jpg",1,"Ténéré 700 World Raid.",1475635),
(null,5,"motor5.jpg",1,"XSR900.",1237864),
(null,6,"vj1.jpg",2,"Elden Ring.",874576),
(null,6,"vj2.jpg",2,"PS5 DualSense, play better.",1238908),
(null,7,"vj3.jpg",2,"Combina tu mando con tus uñas.",982344),
(null,8,"vj4.jpg",2,"Kirby y la tierra olvidada.",1130893),
(null,9,"v1.jpg",7,"Paseando con Tom Holland.",12398942),
(null,9,"v2.jpg",7,"Me encanta la nieve de Noruega.",3008844),
(null,1,'IMG-626fe6dda32746.38508102.jpg',5,'Samurai.',2194),
(null,1,'p1.jpg',3,'Aurora boreal.',20993),
(null,1,'p2.jpg',3,'Mi casa queda increible con este paisaje.',23388),
(null,1,'p3.jpg',3,'Blarney House es preciosa.',5789);

ALTER TABLE posts DROP FOREIGN KEY posts_ibfk_1;

CREATE TABLE likes (
    id_like INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    id_post INT,
    FOREIGN KEY (id_post) REFERENCES posts(id_post),
    time VARCHAR(100)
);

CREATE TABLE follows (
    id_follow INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    id_poster INT,
    FOREIGN KEY (id_poster) REFERENCES users(id_user)
);

INSERT INTO follows VALUE (null,1,2);