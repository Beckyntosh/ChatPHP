CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    url VARCHAR(255)
);

INSERT INTO videos (title, description, category, url) VALUES ('Video 1', 'Description 1', 'Category 1', 'https://www.example.com/video1');
INSERT INTO videos (title, description, category, url) VALUES ('Video 2', 'Description 2', 'Category 2', 'https://www.example.com/video2');
INSERT INTO videos (title, description, category, url) VALUES ('Video 3', 'Description 3', 'Category 3', 'https://www.example.com/video3');
INSERT INTO videos (title, description, category, url) VALUES ('Video 4', 'Description 4', 'Category 4', 'https://www.example.com/video4');
INSERT INTO videos (title, description, category, url) VALUES ('Video 5', 'Description 5', 'Category 5', 'https://www.example.com/video5');
INSERT INTO videos (title, description, category, url) VALUES ('Video 6', 'Description 6', 'Category 6', 'https://www.example.com/video6');
INSERT INTO videos (title, description, category, url) VALUES ('Video 7', 'Description 7', 'Category 7', 'https://www.example.com/video7');
INSERT INTO videos (title, description, category, url) VALUES ('Video 8', 'Description 8', 'Category 8', 'https://www.example.com/video8');
INSERT INTO videos (title, description, category, url) VALUES ('Video 9', 'Description 9', 'Category 9', 'https://www.example.com/video9');
INSERT INTO videos (title, description, category, url) VALUES ('Video 10', 'Description 10', 'Category 10', 'https://www.example.com/video10');
