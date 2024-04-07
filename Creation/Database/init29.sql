CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade CHAR(4)
);

CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist_id INT(6) UNSIGNED,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960');
INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960');
INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960');
INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960');
INSERT INTO artists (name, genre, decade) VALUES ('Dave Brubeck', 'Jazz', '1960');

INSERT INTO songs (title, artist_id) VALUES ('So What', 1);
INSERT INTO songs (title, artist_id) VALUES ('Giant Steps', 2);
INSERT INTO songs (title, artist_id) VALUES ('Round Midnight', 3);
INSERT INTO songs (title, artist_id) VALUES ('Blue In Green', 4);
INSERT INTO songs (title, artist_id) VALUES ('Take Five', 5);