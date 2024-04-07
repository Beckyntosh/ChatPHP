CREATE TABLE IF NOT EXISTS movies (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
release_year YEAR NOT NULL,
genre VARCHAR(50),
UNIQUE KEY unique_title_year (title, release_year)
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
movie_id INT(6) UNSIGNED,
rating INT(1) NOT NULL CHECK (rating >= 1 AND rating <= 5),
review TEXT,
FOREIGN KEY (movie_id) REFERENCES movies(id)
);

INSERT INTO movies (title, release_year, genre) VALUES ('Movie 1', '2020', 'Action');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 2', '2019', 'Drama');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 3', '2018', 'Comedy');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 4', '2017', 'Thriller');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 5', '2016', 'Sci-Fi');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 6', '2015', 'Horror');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 7', '2014', 'Romance');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 8', '2013', 'Animation');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 9', '2012', 'Fantasy');
INSERT INTO movies (title, release_year, genre) VALUES ('Movie 10', '2011', 'Mystery');