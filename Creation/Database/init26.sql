CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
decade VARCHAR(20) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Music (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_id INT(6) UNSIGNED,
title VARCHAR(50) NOT NULL,
year INT(4) NOT NULL,
FOREIGN KEY (artist_id) REFERENCES Artists(id)
);

INSERT INTO Artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Ella Fitzgerald', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Louis Armstrong', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Billie Holiday', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Charlie Parker', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Sarah Vaughan', 'Jazz', '1960s');