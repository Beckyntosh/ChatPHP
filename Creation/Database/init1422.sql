CREATE TABLE IF NOT EXISTS daily_habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(50) NOT NULL,
goal INT(10) NOT NULL,
progress INT(10) NOT NULL DEFAULT '0',
log_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Drink 2 liters of water daily', 2, 2, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Exercise for 30 minutes daily', 1, 0.5, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Read for 1 hour daily', 1, 1, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Meditate for 15 minutes daily', 1, 0.25, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Eat 5 servings of vegetables daily', 5, 3, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Get 8 hours of sleep daily', 1, 0.5, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Practice gratitude daily', 1, 1, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Limit screen time to 1 hour daily', 1, 0.75, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Take a walk outside daily', 1, 1, '2021-12-01');
INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES ('Write in journal daily', 1, 1, '2021-12-01');
