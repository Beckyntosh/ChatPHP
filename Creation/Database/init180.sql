CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    UNIQUE(title)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO custom_exercises (title, instructions, video_url) VALUES 
('Exercise 1', 'Instructions for exercise 1', 'https://www.youtube.com/exercise1'),
('Exercise 2', 'Instructions for exercise 2', 'https://www.youtube.com/exercise2'),
('Exercise 3', 'Instructions for exercise 3', 'https://www.youtube.com/exercise3'),
('Exercise 4', 'Instructions for exercise 4', 'https://www.youtube.com/exercise4'),
('Exercise 5', 'Instructions for exercise 5', 'https://www.youtube.com/exercise5'),
('Exercise 6', 'Instructions for exercise 6', 'https://www.youtube.com/exercise6'),
('Exercise 7', 'Instructions for exercise 7', 'https://www.youtube.com/exercise7'),
('Exercise 8', 'Instructions for exercise 8', 'https://www.youtube.com/exercise8'),
('Exercise 9', 'Instructions for exercise 9', 'https://www.youtube.com/exercise9'),
('Exercise 10', 'Instructions for exercise 10', 'https://www.youtube.com/exercise10');
