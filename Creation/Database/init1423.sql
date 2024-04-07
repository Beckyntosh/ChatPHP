CREATE TABLE IF NOT EXISTS habits_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(255) NOT NULL,
goal INT NOT NULL,
date DATE NOT NULL,
progress INT DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO habits_tracker (habit, goal, date) VALUES ('Drink water', 2, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Exercise', 30, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Read', 1, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Meditate', 15, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Journal', 1, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Eat healthy', 3, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Sleep 8 hours', 1, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Walk 10,000 steps', 1, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Practice gratitude', 1, '2022-05-01');
INSERT INTO habits_tracker (habit, goal, date) VALUES ('Learn something new', 1, '2022-05-01');
