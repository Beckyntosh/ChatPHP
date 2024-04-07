CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  genre VARCHAR(50) NOT NULL,
  decade CHAR(4),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS music (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT(6) UNSIGNED,
  title VARCHAR(50) NOT NULL,
  release_year YEAR(4),
  FOREIGN KEY (artist_id) REFERENCES artists(id) ON DELETE CASCADE
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Stan Getz', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Ella Fitzgerald', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Charles Mingus', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Chet Baker', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Sarah Vaughan', 'Jazz', '1960s');

INSERT INTO music (artist_id, title, release_year) VALUES (1, 'A Love Supreme', 1965);
INSERT INTO music (artist_id, title, release_year) VALUES (2, 'Kind of Blue', 1959);
INSERT INTO music (artist_id, title, release_year) VALUES (3, 'The Girl from Ipanema', 1964);
INSERT INTO music (artist_id, title, release_year) VALUES (4, 'Summertime', 1968);
INSERT INTO music (artist_id, title, release_year) VALUES (5, 'Round Midnight', 1944);
INSERT INTO music (artist_id, title, release_year) VALUES (6, 'Waltz for Debby', 1961);
INSERT INTO music (artist_id, title, release_year) VALUES (7, 'Take the A Train', 1941);
INSERT INTO music (artist_id, title, release_year) VALUES (8, 'Goodbye Pork Pie Hat', 1959);
INSERT INTO music (artist_id, title, release_year) VALUES (9, 'My Funny Valentine', 1953);
INSERT INTO music (artist_id, title, release_year) VALUES (10, 'Lullaby of Birdland', 1954);
