CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    goal INT(11) NOT NULL,
    progress INT(11) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habit_tracker (habit_name, goal) VALUES ('Drink 2 liters of water daily', 2),
('Exercise for 30 minutes daily', 30), ('Read 10 pages of a book daily', 10),
('Meditate for 15 minutes daily', 15), ('Sleep for 8 hours daily', 8),
('Eat 5 servings of fruits and vegetables daily', 5), ('Practice gratitude daily', 1),
('Write in a journal daily', 1), ('Take a walk for 20 minutes daily', 20),
('Limit screen time to 1 hour daily', 1);
