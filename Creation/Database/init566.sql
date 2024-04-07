CREATE TABLE videos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO videos (title, description) VALUES
('Video 1', 'Description for Video 1'),
('Video 2', 'Description for Video 2'),
('Video 3', 'Description for Video 3'),
('Video 4', 'Description for Video 4'),
('Video 5', 'Description for Video 5'),
('Video 6', 'Description for Video 6'),
('Video 7', 'Description for Video 7'),
('Video 8', 'Description for Video 8'),
('Video 9', 'Description for Video 9'),
('Video 10', 'Description for Video 10');