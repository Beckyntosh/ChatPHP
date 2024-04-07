CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    decade VARCHAR(20),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist_id INT(6) UNSIGNED,
    release_date DATE,
    FOREIGN KEY (artist_id) REFERENCES artists(id) ON DELETE CASCADE
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('The Beatles', 'Pop', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Led Zeppelin', 'Rock', '1970s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1950s');
INSERT INTO artists (name, genre, decade) VALUES ('David Bowie', 'Rock', '1980s');
INSERT INTO artists (name, genre, decade) VALUES ('Ella Fitzgerald', 'Jazz', '1940s');
INSERT INTO artists (name, genre, decade) VALUES ('Elvis Presley', 'Rock', '1950s');
INSERT INTO artists (name, genre, decade) VALUES ('Billie Holiday', 'Jazz', '1930s');
INSERT INTO artists (name, genre, decade) VALUES ('Queen', 'Rock', '1970s');
INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1920s');
