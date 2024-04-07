CREATE TABLE IF NOT EXISTS habit_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(255) NOT NULL,
goal INT NOT NULL,
date DATE NOT NULL,
entries INT DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Drink 2 liters of water daily', 2, '2022-01-01', 2);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Exercise for 30 minutes daily', 1, '2022-01-01', 1);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Read 20 pages daily', 1, '2022-01-01', 3);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Meditate for 10 minutes daily', 1, '2022-01-01', 4);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Write a journal entry daily', 1, '2022-01-01', 1);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Eat 5 servings of fruits and vegetables daily', 5, '2022-01-01', 2);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Practice a new language for 20 minutes daily', 1, '2022-01-01', 1);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Limit screen time to 1 hour daily', 1, '2022-01-01', 2);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Go for a walk for 10 minutes daily', 1, '2022-01-01', 1);
INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('Take vitamins daily', 1, '2022-01-01', 1);