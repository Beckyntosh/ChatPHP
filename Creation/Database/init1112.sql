CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    decade VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist_id INT,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Aretha Franklin', 'Soul', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('The Beatles', 'Rock', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Bob Dylan', 'Folk', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Jimi Hendrix', 'Rock', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('The Supremes', 'R&B', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Elvis Presley', 'Rock', '1950s');
INSERT INTO artists (name, genre, decade) VALUES ('Frank Sinatra', 'Jazz', '1950s');
INSERT INTO artists (name, genre, decade) VALUES ('Ella Fitzgerald', 'Jazz', '1950s');

INSERT INTO songs (title, artist_id) VALUES ('Giant Steps', 1);
INSERT INTO songs (title, artist_id) VALUES ('Kind of Blue', 2);
INSERT INTO songs (title, artist_id) VALUES ('Respect', 3);
INSERT INTO songs (title, artist_id) VALUES ('Let It Be', 4);
INSERT INTO songs (title, artist_id) VALUES ('Blowin’ in the Wind', 5);
INSERT INTO songs (title, artist_id) VALUES ('Purple Haze', 6);
INSERT INTO songs (title, artist_id) VALUES ('Baby Love', 7);
INSERT INTO songs (title, artist_id) VALUES ('Hound Dog', 8);
INSERT INTO songs (title, artist_id) VALUES ('My Way', 9);
INSERT INTO songs (title, artist_id) VALUES ('Summertime', 10);