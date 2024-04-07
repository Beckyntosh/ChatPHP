CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit VARCHAR(255) NOT NULL,
    goal INT(10),
    date_logged DATE NOT NULL,
    progress INT(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO habit_tracker (habit, goal, date_logged, progress) VALUES 
('Drink 2 liters of water daily', 2, '2022-05-01', 0),
('Exercise for 30 minutes daily', 30, '2022-05-01', 0),
('Read 20 pages of a book daily', 20, '2022-05-01', 0),
('Meditate for 10 minutes daily', 10, '2022-05-01', 0),
('Write in a journal daily', 1, '2022-05-01', 0),
('Learn a new word daily', 1, '2022-05-01', 0),
('Eat 5 servings of fruits and vegetables daily', 5, '2022-05-01', 0),
('Practice gratitude daily', 1, '2022-05-01', 0),
('Get 8 hours of sleep daily', 8, '2022-05-01', 0),
('No social media after 8 PM', 0, '2022-05-01', 0);
