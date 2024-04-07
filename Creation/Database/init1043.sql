CREATE TABLE IF NOT EXISTS movies (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
release_year YEAR NOT NULL,
genre VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
movie_id INT(6) UNSIGNED NOT NULL,
user VARCHAR(30) NOT NULL,
rating FLOAT NOT NULL,
review TEXT,
reg_date TIMESTAMP,
FOREIGN KEY (movie_id) REFERENCES movies(id)
);

INSERT INTO movies (title, release_year, genre) VALUES ('Movie1', '2020', 'Action');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie2', '2019', 'Comedy');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie3', '2018', 'Drama');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie4', '2017', 'Horror');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie5', '2016', 'Sci-Fi');

INSERT INTO reviews (movie_id, user, rating, review) VALUES (1, 'User1', 4, 'Great movie!');
INSERT INTO reviews (movie_id, user, rating, review) VALUES (2, 'User2', 3.5, 'Enjoyed it');
INSERT INTO reviews (movie_id, user, rating, review) VALUES (3, 'User3', 5, 'Best movie ever');
INSERT INTO reviews (movie_id, user, rating, review) VALUES (4, 'User4', 2, 'Not impressed');
INSERT INTO reviews (movie_id, user, rating, review) VALUES (5, 'User5', 4.5, 'Must watch');

