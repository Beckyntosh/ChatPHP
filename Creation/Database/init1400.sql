CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
target_goal INT(6) NOT NULL,
daily_progress INT(6) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Exercise', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Read for 30 minutes', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Meditate', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Journaling', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Eat 3 servings of fruits', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Attend yoga class', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Avoid junk food', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Daily walk', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Practice gratitude', 30, 0);
INSERT INTO habits (habit_name, target_goal, daily_progress) VALUES ('Create a to-do list', 30, 0);