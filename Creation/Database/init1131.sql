-- Create Artists table
CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
decade VARCHAR(10) NOT NULL
);

-- Create Songs table
CREATE TABLE IF NOT EXISTS Songs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_id INT(6) UNSIGNED,
title VARCHAR(50) NOT NULL,
FOREIGN KEY (artist_id) REFERENCES Artists(id)
);

-- Insert sample data into Artists table
INSERT INTO Artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Ella Fitzgerald', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Charlie Parker', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Chet Baker', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Stan Getz', 'Jazz', '1960s');

-- Insert sample data into Songs table
INSERT INTO Songs (artist_id, title) VALUES (1, 'Giant Steps');
INSERT INTO Songs (artist_id, title) VALUES (2, 'So What');
INSERT INTO Songs (artist_id, title) VALUES (3, 'Summertime');
INSERT INTO Songs (artist_id, title) VALUES (4, 'Watermelon Man');
INSERT INTO Songs (artist_id, title) VALUES (5, 'Waltz for Debby');
INSERT INTO Songs (artist_id, title) VALUES (6, 'Blue Monk');
INSERT INTO Songs (artist_id, title) VALUES (7, 'Take the "A" Train');
INSERT INTO Songs (artist_id, title) VALUES (8, 'Ornithology');
INSERT INTO Songs (artist_id, title) VALUES (9, 'My Funny Valentine');
INSERT INTO Songs (artist_id, title) VALUES (10, 'Desafinado');
