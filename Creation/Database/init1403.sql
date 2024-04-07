CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
goal_quantity INT(10) NOT NULL,
current_quantity INT(10) NOT NULL,
date DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO HabitTracker (habit_name, goal_quantity, current_quantity, date) VALUES 
('Drink 2 liters of water daily', 2, 0, '2023-10-01'),
('Take 10,000 Steps Daily', 10000, 5000, '2023-10-01'),
('Read 30 minutes daily', 30, 15, '2023-10-01'),
('Practice Meditation', 1, 0, '2023-10-01'),
('Exercise for 1 hour daily', 60, 40, '2023-10-01'),
('Sleep for 8 hours daily', 8, 7, '2023-10-01'),
('Eat 5 servings of fruits and vegetables daily', 5, 3, '2023-10-01'),
('Journal for 10 minutes daily', 10, 5, '2023-10-01'),
('Limit screen time to 2 hours daily', 2, 1, '2023-10-01'),
('Practice Gratitude', 1, 0, '2023-10-01');
