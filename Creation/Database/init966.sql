CREATE TABLE IF NOT EXISTS movies (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    release_year YEAR NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_id INT(6) UNSIGNED NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    rating INT(1) NOT NULL,
    review TEXT,
    review_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);

INSERT INTO movies (title, release_year) VALUES ('Movie 1', 2023);
INSERT INTO movies (title, release_year) VALUES ('Movie 2', 2025);
INSERT INTO movies (title, release_year) VALUES ('Movie 3', 2022);
INSERT INTO movies (title, release_year) VALUES ('Movie 4', 2024);
INSERT INTO movies (title, release_year) VALUES ('Movie 5', 2026);
INSERT INTO movies (title, release_year) VALUES ('Movie 6', 2020);
INSERT INTO movies (title, release_year) VALUES ('Movie 7', 2021);
INSERT INTO movies (title, release_year) VALUES ('Movie 8', 2023);
INSERT INTO movies (title, release_year) VALUES ('Movie 9', 2022);
INSERT INTO movies (title, release_year) VALUES ('Movie 10', 2024);