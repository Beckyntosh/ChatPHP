CREATE TABLE IF NOT EXISTS movies (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year YEAR NOT NULL,
  genre VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  movie_id INT(6) UNSIGNED,
  user VARCHAR(100),
  rating INT(1),
  review TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);

INSERT INTO movies (title, release_year, genre) VALUES
('The Shawshank Redemption', 1994, 'Drama'),
('The Godfather', 1972, 'Crime'),
('The Dark Knight', 2008, 'Action'),
('Pulp Fiction', 1994, 'Crime'),
('Fight Club', 1999, 'Drama'),
('Forrest Gump', 1994, 'Drama'),
('Inception', 2010, 'Sci-Fi'),
('The Matrix', 1999, 'Action'),
('Goodfellas', 1990, 'Crime'),
('The Silence of the Lambs', 1991, 'Thriller');

INSERT INTO reviews (movie_id, user, rating, review) VALUES
(1, 'John Doe', 5, 'Fantastic movie. A must-watch!'),
(1, 'Jane Smith', 4, 'Great storyline and characters.'),
(3, 'Alice Johnson', 4, 'Heath Ledgers performance was amazing.'),
(5, 'Bob Brown', 3, 'Confusing plot but great twists.'),
(7, 'Emma Wilson', 5, 'Mind-bending experience.'),
(10, 'Mike Davis', 4, 'Suspenseful and thrilling.'),
(4, 'Sophia Martinez', 5, 'Classic masterpiece.'),
(8, 'David Lee', 4, 'Revolutionary action scenes.'),
(6, 'Olivia Taylor', 4, 'Heartwarming and touching.'),
(2, 'William Clark', 5, 'Timeless classic.');
