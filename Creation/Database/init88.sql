CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE albums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    artist_id INT,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    album_id INT,
    FOREIGN KEY (album_id) REFERENCES albums(id)
);

INSERT INTO artists (name) VALUES ('Artist1'), ('Artist2'), ('Artist3'), ('Artist4'), ('Artist5'), 
                                ('Artist6'), ('Artist7'), ('Artist8'), ('Artist9'), ('Artist10');
INSERT INTO albums (name, artist_id) VALUES ('Album1', 1), ('Album2', 2), ('Album3', 3), ('Album4', 4), ('Album5', 5),
                                ('Album6', 6), ('Album7', 7), ('Album8', 8), ('Album9', 9), ('Album10', 10);
INSERT INTO songs (name, album_id) VALUES ('Song1', 1), ('Song2', 2), ('Song3', 3), ('Song4', 4), ('Song5', 5),
                                ('Song6', 6), ('Song7', 7), ('Song8', 8), ('Song9', 9), ('Song10', 10);
