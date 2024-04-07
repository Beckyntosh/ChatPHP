CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(50) NOT NULL,
goal INT(10) NOT NULL,
logDate DATE NOT NULL,
quantity INT(10) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-01', 2000);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-02', 1800);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-03', 2100);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-04', 2200);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-05', 1900);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-06', 2300);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-07', 2100);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-08', 2000);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-09', 1800);
INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES ('Drink water', 2000, '2022-10-10', 2200);
