CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    debut_year INT
);
CREATE TABLE IF NOT EXISTS songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    release_year INT,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, debut_year) VALUES ('John Coltrane', 'Jazz', 1960);
INSERT INTO artists (name, genre, debut_year) VALUES ('Miles Davis', 'Jazz', 1950);
INSERT INTO artists (name, genre, debut_year) VALUES ('Bill Evans', 'Jazz', 1955);
INSERT INTO artists (name, genre, debut_year) VALUES ('Herbie Hancock', 'Jazz', 1962);
INSERT INTO artists (name, genre, debut_year) VALUES ('Duke Ellington', 'Jazz', 1940);
INSERT INTO artists (name, genre, debut_year) VALUES ('Charles Mingus', 'Jazz', 1952);
INSERT INTO artists (name, genre, debut_year) VALUES ('Thelonious Monk', 'Jazz', 1945);
INSERT INTO artists (name, genre, debut_year) VALUES ('Art Tatum', 'Jazz', 1935);
INSERT INTO artists (name, genre, debut_year) VALUES ('Count Basie', 'Jazz', 1932);
INSERT INTO artists (name, genre, debut_year) VALUES ('Ella Fitzgerald', 'Jazz', 1939);

INSERT INTO songs (artist_id, title, release_year) VALUES (1, 'Giant Steps', 1959);
INSERT INTO songs (artist_id, title, release_year) VALUES (2, 'So What', 1959);
INSERT INTO songs (artist_id, title, release_year) VALUES (3, 'Waltz for Debby', 1961);
INSERT INTO songs (artist_id, title, release_year) VALUES (4, 'Watermelon Man', 1962);
INSERT INTO songs (artist_id, title, release_year) VALUES (5, 'Take the "A" Train', 1941);
INSERT INTO songs (artist_id, title, release_year) VALUES (6, 'Goodbye Pork Pie Hat', 1959);
INSERT INTO songs (artist_id, title, release_year) VALUES (7, 'Round Midnight', 1944);
INSERT INTO songs (artist_id, title, release_year) VALUES (8, 'Yesterdays', 1939);
INSERT INTO songs (artist_id, title, release_year) VALUES (9, 'April in Paris', 1937);
INSERT INTO songs (artist_id, title, release_year) VALUES (10, 'A-Tisket, A-Tasket', 1938);