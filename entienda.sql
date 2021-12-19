

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS developers_groups;
DROP TABLE IF EXISTS groups;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS engines_versions;
DROP TABLE IF EXISTS engines;

CREATE TABLE users (
id_user INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
user varchar(16) NOT NULL,
password char(32) NOT NULL,
email varchar(32) NOT NULL,
name varchar(24) NOT NULL,
surname varchar(48) NOT NULL,
birthdate date NOT NULL,
registered datetime NOT NULL default now(),
admin boolean NOT NULL DEFAULT false
);


DROP TABLE IF EXISTS developers;

CREATE TABLE developers (
id_developer INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(32) NOT NULL,
surname varchar(48) NOT NULL,
email varchar(32) NOT NULL,
website varchar(255) NOT NULL,
birthdate date NOT NULL
);

CREATE TABLE groups (
id_group INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
´group´ VARCHAR(32),
course INT NOT NULL,
jam_year YEAR NOT NULL,
mark FLOAT NOT NULL
);

CREATE TABLE developers_groups (
id_developer_group INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
id_developer INT UNSIGNED NOT NULL,
id_group INT UNSIGNED NOT NULL,
FOREIGN KEY (id_developer) REFERENCES developers(id_developer),
FOREIGN KEY (id_group) REFERENCES groups(id_group)
);


CREATE TABLE engines (
id_engine INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
engine VARCHAR(32)
);

CREATE TABLE engines_versions (
id_engine_version INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
version VARCHAR(24),
id_engine INT UNSIGNED NOT NULL,
FOREIGN KEY (id_engine) REFERENCES engines(id_engine)
);


CREATE TABLE products (
id_product INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
product varchar(128) NOT NULL,
description text,
price decimal(6,2),
reference varchar(8),
discount INT,
units_sold int UNSIGNED,
website varchar(255),
size int,
duration int,
release_date date,
id_group int UNSIGNED NOT NULL,
id_engine_version int UNSIGNED NOT NULL,
FOREIGN KEY (id_group) REFERENCES groups(id_group),
FOREIGN KEY (id_engine_version) REFERENCES engines_versions(id_engine_version)


);




INSERT INTO users (user, password, email, name, surname, birthdate, admin)
VALUES ('root', md5('enti'), 'root@root.com', 'Alex', 'Romero', '2000-00-00', true);


INSERT INTO engines (engine)
VALUES ('unreal');

INSERT INTO engines (engine)
VALUES ('unity');


INSERT INTO engines_versions (version,id_engine)
VALUES ('2020','1');

INSERT INTO engines_versions (version,id_engine)
VALUES ('4.26','2');


INSERT INTO developers (name,surname,email,website,birthdate)
Values ('Alex','Romero','alex.romero.puigvert@gmail.com','askjdakjd.com','2000-09-20');

INSERT INTO groups (´group´, course,jam_year,mark)
VALUE ('MCQUEEN',2,2021,9);

INSERT INTO developers_groups (id_developer, id_group)
VALUE (1,1);

INSERT INTO products (product, description, price, reference, discount,units_sold,website,size,duration,release_date,id_group,id_engine_version)
VALUE ('600 pillows',
'Juego FPS DOOM-like donde tiene almohadas en lugar de municion',
2.99,
88888888,
0,
0,
'akdgakj.com',
2,
30,
'2021-11-04',
1,
1);
