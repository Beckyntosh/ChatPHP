CREATE TABLE IF NOT EXISTS habits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habitName VARCHAR(255) NOT NULL,
    goal INT NOT NULL,
    progress INT DEFAULT 0,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habits (habitName, goal) VALUES ('Drink 2 liters of water daily', 2000),
('Exercise for 30 minutes daily', 1),
('Read 20 pages of a book daily', 20),
('Meditate for 10 minutes daily', 10),
('Walk 10000 steps daily', 10000),
('Get 8 hours of sleep daily', 8),
('Eat 5 servings of fruits and vegetables daily', 5),
('Practice gratitude journaling daily', 1),
('Limit screen time to 2 hours daily', 2),
('Write a journal entry daily', 1);
