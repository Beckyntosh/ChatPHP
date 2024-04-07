CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(10) NOT NULL
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Louis Armstrong', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Stan Getz', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Dave Brubeck', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Charles Mingus', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Ornette Coleman', 'Jazz', '1960s');
