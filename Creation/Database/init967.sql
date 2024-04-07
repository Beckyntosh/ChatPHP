CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    release_year YEAR NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    rating INT NOT NULL,
    review TEXT NOT NULL,
    helpful_count INT DEFAULT 0,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);

INSERT INTO movies (name, release_year) VALUES ('The Shawshank Redemption', 1994);
INSERT INTO movies (name, release_year) VALUES ('The Godfather', 1972);
INSERT INTO movies (name, release_year) VALUES ('The Dark Knight', 2008);
INSERT INTO movies (name, release_year) VALUES ('Pulp Fiction', 1994);
INSERT INTO movies (name, release_year) VALUES ('The Lord of the Rings: The Return of the King', 2003);
INSERT INTO movies (name, release_year) VALUES ('Forrest Gump', 1994);
INSERT INTO movies (name, release_year) VALUES ('Inception', 2010);
INSERT INTO movies (name, release_year) VALUES ('The Matrix', 1999);
INSERT INTO movies (name, release_year) VALUES ('Interstellar', 2014);
INSERT INTO movies (name, release_year) VALUES ('The Silence of the Lambs', 1991);
