CREATE TABLE IF NOT EXISTS artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
period VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, period) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Count Basie', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Dave Brubeck', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Ella Fitzgerald', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Louis Armstrong', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Charlie Parker', 'Jazz', '1960s');
INSERT INTO artists (name, genre, period) VALUES ('Thelonious Monk', 'Jazz', '1960s');