CREATE TABLE IF NOT EXISTS habit_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
target INT(6) NOT NULL,
unit VARCHAR(50) NOT NULL,
date DATE NOT NULL,
progress INT(6) DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Drink 2 liters of water daily', 2, 'liters', '2022-01-01');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('30 minutes of exercise', 30, 'minutes', '2022-01-02');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Read for 1 hour', 1, 'hour', '2022-01-03');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Eat 5 servings of vegetables', 5, 'servings', '2022-01-04');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Practice mindfulness for 15 minutes', 15, 'minutes', '2022-01-05');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Limit screen time to 2 hours', 2, 'hours', '2022-01-06');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Write in journal', 1, 'entry', '2022-01-07');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Get 8 hours of sleep', 8, 'hours', '2022-01-08');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Meditate for 20 minutes', 20, 'minutes', '2022-01-09');
INSERT INTO habit_tracker (habit_name, target, unit, date) VALUES ('Walk 10,000 steps', 10000, 'steps', '2022-01-10');
