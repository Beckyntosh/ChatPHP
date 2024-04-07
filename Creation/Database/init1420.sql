CREATE TABLE daily_habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    habit VARCHAR(255) NOT NULL,
    goal INT(6) NOT NULL,
    progress INT(6) DEFAULT 0,
    date DATE NOT NULL,
    UNIQUE KEY unique_habit (habit, date)
);

INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Exercise', 30, 0, '2022-01-01');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Read', 10, 0, '2022-01-02');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Meditate', 20, 0, '2022-01-03');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Yoga', 15, 0, '2022-01-04');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Cook', 10, 0, '2022-01-05');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Learn', 5, 0, '2022-01-06');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Write', 25, 0, '2022-01-07');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Sleep', 8, 0, '2022-01-08');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Connect', 12, 0, '2022-01-09');
INSERT INTO daily_habits (habit, goal, progress, date) VALUES ('Reflect', 18, 0, '2022-01-10');