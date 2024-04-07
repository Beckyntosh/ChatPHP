CREATE TABLE IF NOT EXISTS Artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    year INT(4),
    UNIQUE KEY unique_artist (name,year)
);

INSERT INTO Artists (name, genre, year) VALUES ('John Coltrane', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Miles Davis', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Herbie Hancock', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Bill Evans', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Wayne Shorter', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Duke Ellington', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Thelonious Monk', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Stan Getz', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Charles Mingus', 'Jazz', 1960);
INSERT INTO Artists (name, genre, year) VALUES ('Ella Fitzgerald', 'Jazz', 1960);
