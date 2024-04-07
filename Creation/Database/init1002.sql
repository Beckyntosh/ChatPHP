CREATE TABLE IF NOT EXISTS albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    artist VARCHAR(50),
    release_year YEAR,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    user VARCHAR(50),
    rating INT(1),
    comment TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES albums(id)
);

INSERT INTO albums (name, artist, release_year)
VALUES ('Album1', 'Artist1', 2020),
       ('Album2', 'Artist2', 2018),
       ('Album3', 'Artist3', 2015),
       ('Album4', 'Artist4', 2021),
       ('Album5', 'Artist5', 2019),
       ('Album6', 'Artist6', 2017),
       ('Album7', 'Artist7', 2016),
       ('Album8', 'Artist8', 2014),
       ('Album9', 'Artist9', 2013),
       ('Album10', 'Artist10', 2012);

INSERT INTO reviews (album_id, user, rating, comment)
VALUES (1, 'User1', 4, 'Great album!'),
       (2, 'User2', 3, 'Enjoyable songs'),
       (3, 'User3', 5, 'Masterpiece'),
       (4, 'User4', 2, 'Disappointing'),
       (5, 'User5', 4, 'Solid tracks'),
       (6, 'User6', 3, 'Decent album'),
       (7, 'User7', 4, 'Loved it'),
       (8, 'User8', 1, 'Not my taste'),
       (9, 'User9', 5, 'Amazing songs'),
       (10, 'User10', 3, 'Good vibes');
