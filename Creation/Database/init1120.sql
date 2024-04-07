CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
decade VARCHAR(30),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Music (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50),
artist_id INT(6) UNSIGNED,
year INT(4),
reg_date TIMESTAMP,
FOREIGN KEY (artist_id) REFERENCES Artists(id)
);

INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('John Coltrane', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Miles Davis', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Thelonious Monk', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Charlie Parker', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Bill Evans', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Duke Ellington', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Herbie Hancock', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Cannonball Adderley', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Jazz Messengers', 'Jazz', '1960s', NOW());
INSERT INTO Artists (name, genre, decade, reg_date) VALUES ('Wes Montgomery', 'Jazz', '1960s', NOW());

INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('A Love Supreme', 1, 1965, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Kind of Blue', 2, 1959, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Brilliant Corners', 3, 1957, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Parker\'s Mood', 4, 1958, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Sunday at the Village Vanguard', 5, 1961, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('The Far East Suite', 6, 1966, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Maiden Voyage', 7, 1965, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Somethin\' Else', 8, 1958, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('Moanin\'', 9, 1958, NOW());
INSERT INTO Music (title, artist_id, year, reg_date) VALUES ('The Incredible Jazz Guitar of Wes Montgomery', 10, 1960, NOW());