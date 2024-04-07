CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    release_year YEAR(4),
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Nina Simone', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Charles Mingus', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Oscar Peterson', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Cannonball Adderley', 'Jazz', '1960s');

INSERT INTO songs (artist_id, title, release_year) VALUES (1, 'Giant Steps', 1960);
INSERT INTO songs (artist_id, title, release_year) VALUES (2, 'Kind of Blue', 1959);
INSERT INTO songs (artist_id, title, release_year) VALUES (3, 'Cantaloupe Island', 1964);
INSERT INTO songs (artist_id, title, release_year) VALUES (4, 'Ruby, My Dear', 1949);
INSERT INTO songs (artist_id, title, release_year) VALUES (5, 'Waltz for Debby', 1961);
INSERT INTO songs (artist_id, title, release_year) VALUES (6, 'Feeling Good', 1965);
INSERT INTO songs (artist_id, title, release_year) VALUES (7, 'Take the "A" Train', 1941);
INSERT INTO songs (artist_id, title, release_year) VALUES (8, 'Goodbye Pork Pie Hat', 1959);
INSERT INTO songs (artist_id, title, release_year) VALUES (9, 'Hymn to Freedom', 1962);
INSERT INTO songs (artist_id, title, release_year) VALUES (10, 'Mercy, Mercy, Mercy', 1966);