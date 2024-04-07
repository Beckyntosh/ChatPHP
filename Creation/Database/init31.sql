CREATE TABLE IF NOT EXISTS Artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES Artists(id)
);

INSERT INTO Artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');

INSERT INTO Songs (artist_id, title) VALUES (1, 'Giant Steps');
INSERT INTO Songs (artist_id, title) VALUES (2, 'So What');
INSERT INTO Songs (artist_id, title) VALUES (3, 'Waltz for Debby');
INSERT INTO Songs (artist_id, title) VALUES (4, 'Cantaloupe Island');
INSERT INTO Songs (artist_id, title) VALUES (5, 'Round Midnight');
INSERT INTO Songs (artist_id, title) VALUES (6, 'Take the A Train');
