CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(255) NOT NULL,
goal INT(10),
current INT(10) DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO HabitTracker (habit, goal) VALUES ('Exercise 30 minutes daily', 30);
INSERT INTO HabitTracker (habit, goal) VALUES ('Read 1 chapter of a book daily', 1);
INSERT INTO HabitTracker (habit, goal) VALUES ('Meditate for 10 minutes daily', 10);
INSERT INTO HabitTracker (habit, goal) VALUES ('Eat 5 servings of fruits and vegetables daily', 5);
INSERT INTO HabitTracker (habit, goal) VALUES ('Write in journal for 15 minutes daily', 15);
INSERT INTO HabitTracker (habit, goal) VALUES ('Walk 10,000 steps daily', 10000);
INSERT INTO HabitTracker (habit, goal) VALUES ('Spend quality time with family daily', 1);
INSERT INTO HabitTracker (habit, goal) VALUES ('Practice gratitude daily', 1);
INSERT INTO HabitTracker (habit, goal) VALUES ('Limit screen time to 2 hours daily', 2);
INSERT INTO HabitTracker (habit, goal) VALUES ('Get 8 hours of sleep daily', 8);
