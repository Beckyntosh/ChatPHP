CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  genre VARCHAR(50),
  era VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS songs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT(6) UNSIGNED,
  title VARCHAR(100) NOT NULL,
  year INT(4),
  FOREIGN KEY (artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, era) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, era) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, era) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO artists (name, genre, era) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, era) VALUES ('Wes Montgomery', 'Jazz', '1960s');

INSERT INTO songs (artist_id, title, year) VALUES (1, 'A Love Supreme', 1965);
INSERT INTO songs (artist_id, title, year) VALUES (2, 'So What', 1959);
INSERT INTO songs (artist_id, title, year) VALUES (3, 'Cantaloupe Island', 1964);
INSERT INTO songs (artist_id, title, year) VALUES (4, 'Waltz for Debby', 1961);
INSERT INTO songs (artist_id, title, year) VALUES (5, 'Round Midnight', 1966);