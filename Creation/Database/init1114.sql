init.sql:
CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    year INT(4) NOT NULL
);

INSERT INTO artists (name, genre, year) VALUES ('John Coltrane', 'Jazz', 1961);
INSERT INTO artists (name, genre, year) VALUES ('Miles Davis', 'Jazz', 1963);
INSERT INTO artists (name, genre, year) VALUES ('Bill Evans', 'Jazz', 1965);
INSERT INTO artists (name, genre, year) VALUES ('Herbie Hancock', 'Jazz', 1962);
INSERT INTO artists (name, genre, year) VALUES ('Stan Getz', 'Jazz', 1967);
INSERT INTO artists (name, genre, year) VALUES ('Dave Brubeck', 'Jazz', 1960);
INSERT INTO artists (name, genre, year) VALUES ('Cannonball Adderley', 'Jazz', 1968);
INSERT INTO artists (name, genre, year) VALUES ('Billie Holiday', 'Jazz', 1964);
INSERT INTO artists (name, genre, year) VALUES ('Thelonious Monk', 'Jazz', 1966);
INSERT INTO artists (name, genre, year) VALUES ('Duke Ellington', 'Jazz', 1969);