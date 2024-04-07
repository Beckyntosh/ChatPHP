CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL
);

INSERT INTO custom_exercises (name, description, video_url) VALUES 
("Exercise 1", "Description 1", "https://www.youtube.com/exercise1"),
("Exercise 2", "Description 2", "https://www.youtube.com/exercise2"),
("Exercise 3", "Description 3", "https://www.youtube.com/exercise3"),
("Exercise 4", "Description 4", "https://www.youtube.com/exercise4"),
("Exercise 5", "Description 5", "https://www.youtube.com/exercise5"),
("Exercise 6", "Description 6", "https://www.youtube.com/exercise6"),
("Exercise 7", "Description 7", "https://www.youtube.com/exercise7"),
("Exercise 8", "Description 8", "https://www.youtube.com/exercise8"),
("Exercise 9", "Description 9", "https://www.youtube.com/exercise9"),
("Exercise 10", "Description 10", "https://www.youtube.com/exercise10");
