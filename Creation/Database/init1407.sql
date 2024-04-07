CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(50) NOT NULL,
goal VARCHAR(50) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habits (habit_name, goal) VALUES
('Drink 2 liters of water daily', 'Stay hydrated'),
('Read for 30 minutes daily', 'Improve knowledge'),
('Exercise for 1 hour daily', 'Stay healthy'),
('Meditate for 15 minutes daily', 'Reduce stress'),
('Write in journal daily', 'Reflect on thoughts'),
('Walk 10,000 steps daily', 'Stay active'),
('Eat 5 servings of fruits and vegetables daily', 'Maintain a balanced diet'),
('Practice gratitude daily', 'Cultivate positivity'),
('Limit screen time before bed', 'Improve sleep quality'),
('Practice deep breathing daily', 'Relax and unwind');