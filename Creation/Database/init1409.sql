CREATE TABLE IF NOT EXISTS habit_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(50) NOT NULL,
goal INT(10),
progress INT(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Drink 2 liters of water daily', 2, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Exercise for 30 minutes daily', 1, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Read for 30 minutes daily', 1, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Meditate for 10 minutes daily', 1, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Eat 5 servings of fruits and vegetables daily', 5, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Journal for 15 minutes daily', 1, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Get 8 hours of sleep daily', 8, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Practice gratitude daily', 1, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Limit screen time to 2 hours daily', 2, 0);
INSERT INTO habit_tracker (habit, goal, progress) VALUES ('Take a walk for 20 minutes daily', 1, 0);