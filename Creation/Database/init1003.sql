CREATE TABLE IF NOT EXISTS albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    rating DECIMAL(2,1) NOT NULL,
    review TEXT,
    reviewer_name VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES albums(id)
);

INSERT INTO albums (title, artist) VALUES ('Album1', 'Artist1');
INSERT INTO albums (title, artist) VALUES ('Album2', 'Artist2');
INSERT INTO albums (title, artist) VALUES ('Album3', 'Artist3');
INSERT INTO albums (title, artist) VALUES ('Album4', 'Artist4');
INSERT INTO albums (title, artist) VALUES ('Album5', 'Artist5');
INSERT INTO albums (title, artist) VALUES ('Album6', 'Artist6');
INSERT INTO albums (title, artist) VALUES ('Album7', 'Artist7');
INSERT INTO albums (title, artist) VALUES ('Album8', 'Artist8');
INSERT INTO albums (title, artist) VALUES ('Album9', 'Artist9');
INSERT INTO albums (title, artist) VALUES ('Album10', 'Artist10');
