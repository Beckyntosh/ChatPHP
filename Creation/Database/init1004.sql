CREATE TABLE IF NOT EXISTS Albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    release_year YEAR,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    user VARCHAR(255) NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    review TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES Albums(id) ON DELETE CASCADE
);

INSERT INTO Albums (title, artist, release_year) VALUES ('Thriller', 'Michael Jackson', 1982);
INSERT INTO Albums (title, artist, release_year) VALUES ('Back in Black', 'AC/DC', 1980);
INSERT INTO Albums (title, artist, release_year) VALUES ('Dark Side of the Moon', 'Pink Floyd', 1973);
INSERT INTO Albums (title, artist, release_year) VALUES ('The Beatles (White Album)', 'The Beatles', 1968);
INSERT INTO Albums (title, artist, release_year) VALUES ('Abbey Road', 'The Beatles', 1969);
INSERT INTO Albums (title, artist, release_year) VALUES ('Rumours', 'Fleetwood Mac', 1977);
INSERT INTO Albums (title, artist, release_year) VALUES ('Led Zeppelin IV', 'Led Zeppelin', 1971);
INSERT INTO Albums (title, artist, release_year) VALUES ('Hotel California', 'Eagles', 1976);
INSERT INTO Albums (title, artist, release_year) VALUES ('Nevermind', 'Nirvana', 1991);
INSERT INTO Albums (title, artist, release_year) VALUES ('Thriller', 'Michael Jackson', 1982);
