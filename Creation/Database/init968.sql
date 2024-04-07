CREATE TABLE IF NOT EXISTS movies (
  movie_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year INT(4),
  genre VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  review_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  movie_id INT(6) UNSIGNED,
  user_name VARCHAR(255) NOT NULL,
  rating INT(1) NOT NULL,
  comment TEXT,
  usefulness INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE
);

INSERT INTO movies (title, release_year, genre) VALUES ('The Matrix', 1999, 'Sci-Fi');
INSERT INTO movies (title, release_year, genre) VALUES ('Inception', 2010, 'Thriller');
INSERT INTO movies (title, release_year, genre) VALUES ('The Dark Knight', 2008, 'Action');
INSERT INTO movies (title, release_year, genre) VALUES ('Pulp Fiction', 1994, 'Crime');
INSERT INTO movies (title, release_year, genre) VALUES ('Forrest Gump', 1994, 'Drama');
INSERT INTO movies (title, release_year, genre) VALUES ('The Shawshank Redemption', 1994, 'Drama');
INSERT INTO movies (title, release_year, genre) VALUES ('The Lord of the Rings: The Return of the King', 2003, 'Fantasy');
INSERT INTO movies (title, release_year, genre) VALUES ('The Godfather', 1972, 'Crime');
INSERT INTO movies (title, release_year, genre) VALUES ('Fight Club', 1999, 'Drama');
INSERT INTO movies (title, release_year, genre) VALUES ('Goodfellas', 1990, 'Crime');

INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (1, 'Alice', 5, 'Amazing movie!', 10);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (1, 'Bob', 4, 'Great action scenes.', 6);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (2, 'Charlie', 4, 'Mind-bending plot.', 8);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (3, 'Eve', 5, 'Heath Ledger was brilliant.', 12);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (5, 'David', 5, 'Heartwarming story.', 15);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (6, 'Frank', 5, 'One of the best movies ever.', 18);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (7, 'Grace', 4, 'Epic conclusion to the trilogy.', 9);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (8, 'Hannah', 5, 'Classic masterpiece.', 20);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (9, 'Ivy', 4, 'Mind-blowing twist ending.', 7);
INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (10, 'Jack', 4, 'Fantastic performances.', 11);