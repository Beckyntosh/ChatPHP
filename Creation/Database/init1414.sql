CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(30) NOT NULL,
goal INT(6) NOT NULL,
user_id INT(6) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO habits (habit_name, goal, user_id) VALUES ('Drink water', 2, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Exercise', 30, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Read a book', 1, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Meditate', 15, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Eat fruits', 5, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Write journal', 1, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Stretch', 10, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Sleep early', 7, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Practice gratitude', 1, 1);
INSERT INTO habits (habit_name, goal, user_id) VALUES ('Limit screen time', 3, 1);
