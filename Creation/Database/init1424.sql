CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(50) NOT NULL,
goal INT NOT NULL,
dateLogged DATE NOT NULL,
progress INT DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Drink 2 liters of water daily', 2000, '2022-01-01');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Exercise for 30 minutes daily', 1, '2022-01-02');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Read 20 pages daily', 20, '2022-01-03');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Meditate for 10 minutes daily', 10, '2022-01-04');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Take 10000 steps daily', 10000, '2022-01-05');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Write a journal entry daily', 1, '2022-01-06');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Eat 5 servings of fruits and vegetables daily', 5, '2022-01-07');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Practice gratitude daily', 1, '2022-01-08');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Limit screen time to 1 hour daily', 60, '2022-01-09');
INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES ('Get 8 hours of sleep daily', 8, '2022-01-10');