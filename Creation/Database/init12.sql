CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    year INT NOT NULL
);

INSERT INTO artists (artist_name, genre, year) VALUES ('John Coltrane', 'Jazz', 1963);
INSERT INTO artists (artist_name, genre, year) VALUES ('Miles Davis', 'Jazz', 1960);
INSERT INTO artists (artist_name, genre, year) VALUES ('Nina Simone', 'Jazz', 1965);
INSERT INTO artists (artist_name, genre, year) VALUES ('Ella Fitzgerald', 'Jazz', 1959);
INSERT INTO artists (artist_name, genre, year) VALUES ('Thelonious Monk', 'Jazz', 1962);
INSERT INTO artists (artist_name, genre, year) VALUES ('Louis Armstrong', 'Jazz', 1968);
INSERT INTO artists (artist_name, genre, year) VALUES ('Billie Holiday', 'Jazz', 1961);
INSERT INTO artists (artist_name, genre, year) VALUES ('Duke Ellington', 'Jazz', 1964);
INSERT INTO artists (artist_name, genre, year) VALUES ('Charlie Parker', 'Jazz', 1967);
INSERT INTO artists (artist_name, genre, year) VALUES ('Sarah Vaughan', 'Jazz', 1966);
