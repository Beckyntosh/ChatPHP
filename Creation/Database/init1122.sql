CREATE TABLE IF NOT EXISTS artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
year INT(4),
unique(name)
);

CREATE TABLE IF NOT EXISTS songs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_id INT(6) UNSIGNED,
title VARCHAR(50),
year INT(4),
FOREIGN KEY (artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, year) VALUES ('Miles Davis', 'Jazz', 1959);
INSERT INTO artists (name, genre, year) VALUES ('John Coltrane', 'Jazz', 1964);
INSERT INTO artists (name, genre, year) VALUES ('Thelonious Monk', 'Jazz', 1961);
INSERT INTO artists (name, genre, year) VALUES ('Herbie Hancock', 'Jazz', 1965);
INSERT INTO artists (name, genre, year) VALUES ('Dave Brubeck', 'Jazz', 1963);
INSERT INTO artists (name, genre, year) VALUES ('Duke Ellington', 'Jazz', 1967);
INSERT INTO artists (name, genre, year) VALUES ('Bill Evans', 'Jazz', 1962);
INSERT INTO artists (name, genre, year) VALUES ('Cannonball Adderley', 'Jazz', 1968);
INSERT INTO artists (name, genre, year) VALUES ('Charles Mingus', 'Jazz', 1966);
INSERT INTO artists (name, genre, year) VALUES ('Stan Getz', 'Jazz', 1960);

INSERT INTO songs (artist_id, title, year) VALUES (1, 'So What', 1959);
INSERT INTO songs (artist_id, title, year) VALUES (2, 'A Love Supreme', 1964);
INSERT INTO songs (artist_id, title, year) VALUES (3, 'Round Midnight', 1961);
INSERT INTO songs (artist_id, title, year) VALUES (4, 'Maiden Voyage', 1965);
INSERT INTO songs (artist_id, title, year) VALUES (5, 'Take Five', 1963);
INSERT INTO songs (artist_id, title, year) VALUES (6, 'Take the "A" Train', 1967);
INSERT INTO songs (artist_id, title, year) VALUES (7, 'Waltz for Debby', 1962);
INSERT INTO songs (artist_id, title, year) VALUES (8, 'Mercy, Mercy, Mercy', 1968);
INSERT INTO songs (artist_id, title, year) VALUES (9, 'Goodbye Pork Pie Hat', 1966);
INSERT INTO songs (artist_id, title, year) VALUES (10, 'The Girl from Ipanema', 1960);