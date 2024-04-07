CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  genre VARCHAR(50) NOT NULL,
  decade VARCHAR(20) NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS songs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT(6) UNSIGNED,
  title VARCHAR(100) NOT NULL,
  release_year YEAR NOT NULL,
  FOREIGN KEY (artist_id) REFERENCES artists(id),
  reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (1, 'Giant Steps', 1960);

INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (2, 'Kind of Blue', 1959);

INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (3, 'Waltz for Debby', 1961);

INSERT INTO artists (name, genre, decade) VALUES ('Charlie Parker', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (4, 'Bird: The Savoy Recordings', 1944);

INSERT INTO artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (5, 'Maiden Voyage', 1965);

INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (6, 'Money Jungle', 1962);

INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (7, 'Brilliant Corners', 1957);

INSERT INTO artists (name, genre, decade) VALUES ('Oscar Peterson', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (8, 'Night Train', 1962);

INSERT INTO artists (name, genre, decade) VALUES ('Cannonball Adderley', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (9, 'Somethin Else', 1958);

INSERT INTO artists (name, genre, decade) VALUES ('Sonny Rollins', 'Jazz', '1960s');
INSERT INTO songs (artist_id, title, release_year) VALUES (10, 'The Bridge', 1962);