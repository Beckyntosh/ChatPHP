CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(50),
    decade VARCHAR(20),
    reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Sonny Rollins', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Charles Mingus', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Dave Brubeck', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Cannonball Adderley', 'Jazz', '1960s');
