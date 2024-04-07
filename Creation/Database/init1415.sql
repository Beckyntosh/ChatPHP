CREATE TABLE IF NOT EXISTS daily_habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
goal INT UNSIGNED,
date_tracked DATE,
achieved BOOLEAN
);

INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Drink 2 liters of water daily', 2, '2022-05-01', 1);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Meditate for 15 minutes daily', 1, '2022-05-02', 0);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Read 20 pages of a book daily', 20, '2022-05-03', 1);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Exercise for 30 minutes daily', 30, '2022-05-04', 1);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Write in journal daily', 1, '2022-05-05', 0);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Practice gratitude daily', 1, '2022-05-06', 1);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Go for a walk daily', 1, '2022-05-07', 0);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Limit screen time to 1 hour daily', 1, '2022-05-08', 1);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Eat 5 servings of fruits and vegetables daily', 5, '2022-05-09', 1);
INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('Practice mindfulness for 10 minutes daily', 1, '2022-05-10', 0);
