CREATE TABLE IF NOT EXISTS genres (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre_id INT(6) UNSIGNED,
    year_active_start INT(4),
    FOREIGN KEY (genre_id) REFERENCES genres(id)
);

INSERT INTO genres (name) VALUES ('Jazz');
INSERT INTO genres (name) VALUES ('Rock');
INSERT INTO genres (name) VALUES ('Pop');
INSERT INTO genres (name) VALUES ('Classical');
INSERT INTO genres (name) VALUES ('Hip Hop');

INSERT INTO artists (name, genre_id, year_active_start) VALUES ('John Coltrane', 1, 1960);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('The Beatles', 2, 1960);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Michael Jackson', 3, 1970);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Mozart', 4, 1760);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Tupac Shakur', 5, 1990);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Miles Davis', 1, 1950);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Led Zeppelin', 2, 1968);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Madonna', 3, 1982);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Beethoven', 4, 1792);
INSERT INTO artists (name, genre_id, year_active_start) VALUES ('Eminem', 5, 1999);